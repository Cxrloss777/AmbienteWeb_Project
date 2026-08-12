<?php
require_once '../app/config/database.php';

class Pago {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getConfiguracion() {
        $query = "SELECT * FROM configuracion_cuotas WHERE id = 1";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function actualizarConfiguracion($monto, $diaVencimiento) {
        $query = "UPDATE configuracion_cuotas
                  SET monto_mensual = ?, dia_vencimiento = ?
                  WHERE id = 1";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("di", $monto, $diaVencimiento);
        return $stmt->execute();
    }

    public function generarCuotas($periodo, $monto, $fechaVencimiento) {
        $query = "INSERT IGNORE INTO cuotas
                  (residente_id, periodo, monto, fecha_vencimiento, estado)
                  SELECT id, ?, ?, ?, 'Pendiente'
                  FROM residentes
                  WHERE estado = 'Activo'";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sds", $periodo, $monto, $fechaVencimiento);
        $stmt->execute();

        return $stmt->affected_rows;
    }

    public function getCuotas() {
        $query = "SELECT cuotas.*,
                         residentes.nombre AS residente_nombre,
                         viviendas.identificador AS vivienda_identificador,
                         CASE
                             WHEN EXISTS (
                                 SELECT 1
                                 FROM cuotas c2
                                 WHERE c2.residente_id = cuotas.residente_id
                                   AND c2.estado = 'Pendiente'
                                   AND c2.fecha_vencimiento < CURDATE()
                             )
                             THEN 'Moroso'
                             ELSE 'Al día'
                         END AS estado_residente
                  FROM cuotas
                  JOIN residentes ON cuotas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  ORDER BY cuotas.periodo DESC, residentes.nombre ASC";

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCuotaById($id) {
        $query = "SELECT cuotas.*,
                         residentes.nombre AS residente_nombre,
                         residentes.correo AS residente_correo,
                         viviendas.identificador AS vivienda_identificador
                  FROM cuotas
                  JOIN residentes ON cuotas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  WHERE cuotas.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function getResumen() {
        $queryIngresos = "SELECT COALESCE(SUM(monto), 0) AS total
                          FROM pagos
                          WHERE estado = 'Completado'
                            AND YEAR(fecha_pago) = YEAR(CURDATE())
                            AND MONTH(fecha_pago) = MONTH(CURDATE())";

        $queryPendiente = "SELECT COALESCE(SUM(monto), 0) AS total
                           FROM cuotas
                           WHERE estado = 'Pendiente'";

        $queryMorosos = "SELECT COUNT(DISTINCT residente_id) AS total
                         FROM cuotas
                         WHERE estado = 'Pendiente'
                           AND fecha_vencimiento < CURDATE()";

        $ingresos = $this->db->query($queryIngresos)->fetch_assoc()['total'];
        $pendiente = $this->db->query($queryPendiente)->fetch_assoc()['total'];
        $morosos = $this->db->query($queryMorosos)->fetch_assoc()['total'];

        return [
            'ingresos_mes' => $ingresos,
            'monto_pendiente' => $pendiente,
            'morosos' => $morosos
        ];
    }

    public function registrarPago($cuotaId) {
        $this->db->begin_transaction();

        try {
            $queryCuota = "SELECT *
                           FROM cuotas
                           WHERE id = ?
                           FOR UPDATE";

            $stmtCuota = $this->db->prepare($queryCuota);
            $stmtCuota->bind_param("i", $cuotaId);
            $stmtCuota->execute();
            $cuota = $stmtCuota->get_result()->fetch_assoc();

            if (!$cuota || $cuota['estado'] === 'Pagada') {
                $this->db->rollback();
                return false;
            }

            $metodo = 'Tarjeta (simulación)';
            $estado = 'Completado';

            $queryPago = "INSERT INTO pagos
                          (cuota_id, monto, fecha_pago, metodo_pago, estado)
                          VALUES (?, ?, NOW(), ?, ?)";

            $stmtPago = $this->db->prepare($queryPago);
            $stmtPago->bind_param(
                "idss",
                $cuotaId,
                $cuota['monto'],
                $metodo,
                $estado
            );
            $stmtPago->execute();

            $pagoId = $this->db->insert_id;
            $numeroRecibo = 'REC-' . str_pad($pagoId, 5, '0', STR_PAD_LEFT);

            $queryRecibo = "UPDATE pagos
                            SET numero_recibo = ?
                            WHERE id = ?";

            $stmtRecibo = $this->db->prepare($queryRecibo);
            $stmtRecibo->bind_param("si", $numeroRecibo, $pagoId);
            $stmtRecibo->execute();

            $queryActualizar = "UPDATE cuotas
                                SET estado = 'Pagada'
                                WHERE id = ?";

            $stmtActualizar = $this->db->prepare($queryActualizar);
            $stmtActualizar->bind_param("i", $cuotaId);
            $stmtActualizar->execute();

            $this->db->commit();
            return $pagoId;

        } catch (mysqli_sql_exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    public function getPagos() {
        $query = "SELECT pagos.*,
                         cuotas.periodo,
                         residentes.nombre AS residente_nombre,
                         viviendas.identificador AS vivienda_identificador
                  FROM pagos
                  JOIN cuotas ON pagos.cuota_id = cuotas.id
                  JOIN residentes ON cuotas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  ORDER BY pagos.fecha_pago DESC";

        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPagoById($id) {
        $query = "SELECT pagos.*,
                         cuotas.periodo,
                         cuotas.fecha_vencimiento,
                         residentes.nombre AS residente_nombre,
                         residentes.cedula AS residente_cedula,
                         viviendas.identificador AS vivienda_identificador
                  FROM pagos
                  JOIN cuotas ON pagos.cuota_id = cuotas.id
                  JOIN residentes ON cuotas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  WHERE pagos.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function getReporte($periodo) {
        $queryIngresos = "SELECT COALESCE(SUM(monto), 0) AS ingresos,
                                 COUNT(*) AS cantidad_pagos
                          FROM pagos
                          WHERE estado = 'Completado'
                            AND DATE_FORMAT(fecha_pago, '%Y-%m') = ?";

        $stmtIngresos = $this->db->prepare($queryIngresos);
        $stmtIngresos->bind_param("s", $periodo);
        $stmtIngresos->execute();
        $ingresos = $stmtIngresos->get_result()->fetch_assoc();

        $queryCuotas = "SELECT COUNT(*) AS total,
                               SUM(CASE WHEN estado = 'Pagada' THEN 1 ELSE 0 END) AS pagadas,
                               SUM(CASE WHEN estado = 'Pendiente' THEN 1 ELSE 0 END) AS pendientes
                        FROM cuotas
                        WHERE DATE_FORMAT(periodo, '%Y-%m') = ?";

        $stmtCuotas = $this->db->prepare($queryCuotas);
        $stmtCuotas->bind_param("s", $periodo);
        $stmtCuotas->execute();
        $cuotas = $stmtCuotas->get_result()->fetch_assoc();

        return [
            'ingresos' => $ingresos['ingresos'] ?? 0,
            'cantidad_pagos' => $ingresos['cantidad_pagos'] ?? 0,
            'total_cuotas' => $cuotas['total'] ?? 0,
            'pagadas' => $cuotas['pagadas'] ?? 0,
            'pendientes' => $cuotas['pendientes'] ?? 0
        ];
    }

    public function getResumenDashboard() {
        $data = [];

        $data['pagos_hoy'] = $this->db->query(
            "SELECT COALESCE(SUM(monto), 0) AS total FROM pagos
             WHERE estado = 'Completado' AND DATE(fecha_pago) = CURDATE()"
        )->fetch_assoc()['total'];

        $data['pagos_mes'] = $this->db->query(
            "SELECT COALESCE(SUM(monto), 0) AS total FROM pagos
             WHERE estado = 'Completado' AND YEAR(fecha_pago) = YEAR(CURDATE()) AND MONTH(fecha_pago) = MONTH(CURDATE())"
        )->fetch_assoc()['total'];

        $data['pagos_anio'] = $this->db->query(
            "SELECT COALESCE(SUM(monto), 0) AS total FROM pagos
             WHERE estado = 'Completado' AND YEAR(fecha_pago) = YEAR(CURDATE())"
        )->fetch_assoc()['total'];

        $data['cuotas_pagadas_mes'] = $this->db->query(
            "SELECT COUNT(*) AS total FROM cuotas
             WHERE estado = 'Pagada' AND YEAR(periodo) = YEAR(CURDATE()) AND MONTH(periodo) = MONTH(CURDATE())"
        )->fetch_assoc()['total'];

        $pendienteMes = $this->db->query(
            "SELECT COUNT(*) AS total, COALESCE(SUM(monto), 0) AS monto FROM cuotas
             WHERE estado = 'Pendiente' AND YEAR(periodo) = YEAR(CURDATE()) AND MONTH(periodo) = MONTH(CURDATE())"
        )->fetch_assoc();
        $data['cuotas_pendientes_mes'] = $pendienteMes['total'];
        $data['monto_pendiente_mes'] = $pendienteMes['monto'];

        $data['cuotas_al_dia'] = $this->db->query(
            "SELECT COUNT(DISTINCT residentes.id) AS total FROM residentes
             WHERE residentes.estado = 'Activo' AND residentes.id NOT IN (
                 SELECT residente_id FROM cuotas WHERE estado = 'Pendiente' AND fecha_vencimiento < CURDATE()
             )"
        )->fetch_assoc()['total'];

        $data['cuotas_vencidas'] = $this->db->query(
            "SELECT COUNT(*) AS total FROM cuotas WHERE estado = 'Pendiente' AND fecha_vencimiento < CURDATE()"
        )->fetch_assoc()['total'];

        $pagosRecientes = $this->db->query(
            "SELECT pagos.numero_recibo, pagos.fecha_pago, pagos.estado,
                    residentes.nombre AS residente_nombre,
                    viviendas.identificador AS vivienda_identificador
             FROM pagos
             JOIN cuotas ON pagos.cuota_id = cuotas.id
             JOIN residentes ON cuotas.residente_id = residentes.id
             JOIN viviendas ON residentes.vivienda_id = viviendas.id
             ORDER BY pagos.fecha_pago DESC
             LIMIT 5"
        );
        $data['pagos_recientes'] = $pagosRecientes->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function getMorososPorPeriodo($periodo) {
        $query = "SELECT cuotas.*,
                         residentes.nombre AS residente_nombre,
                         viviendas.identificador AS vivienda_identificador
                  FROM cuotas
                  JOIN residentes ON cuotas.residente_id = residentes.id
                  JOIN viviendas ON residentes.vivienda_id = viviendas.id
                  WHERE DATE_FORMAT(cuotas.periodo, '%Y-%m') = ?
                    AND cuotas.estado = 'Pendiente'
                    AND cuotas.fecha_vencimiento < CURDATE()
                  ORDER BY cuotas.fecha_vencimiento ASC, residentes.nombre ASC";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $periodo);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}