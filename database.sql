CREATE DATABASE IF NOT EXISTS residencianet;
USE residencianet;

-- Usuarios del sistema (login del panel administrativo)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    reset_token VARCHAR(64) NULL,
    reset_token_expira DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuario administrador por defecto (contraseña: admin123)
INSERT INTO usuarios (nombre, correo, contrasena) VALUES
(
    'Administrador',
    'admin@residencianet.com',
    '$2y$10$e.AaBH/Kbokn4aHfA6ryjORT5QPdUcuFIQ0OBbX76FPtPoQpyNfPS'
);

-- Viviendas
CREATE TABLE IF NOT EXISTS viviendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identificador VARCHAR(50) NOT NULL,
    tipo ENUM('Apartamento', 'Casa', 'Local Comercial') NOT NULL,
    propietario VARCHAR(100),
    area DECIMAL(10,2) NOT NULL,
    num_habitantes INT DEFAULT 0,
    estado ENUM('Disponible', 'Ocupada', 'En mantenimiento') DEFAULT 'Disponible',
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Residentes
CREATE TABLE IF NOT EXISTS residentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(30) NOT NULL UNIQUE,
    vivienda_id INT NOT NULL,
    tipo_residente ENUM('Propietario', 'Inquilino', 'Familiar') NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vivienda_id) REFERENCES viviendas(id)
);

-- Visitantes
CREATE TABLE IF NOT EXISTS visitantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(30) NOT NULL,
    visitado VARCHAR(100) NOT NULL,
    vivienda_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    hora_salida TIME NULL,
    placa VARCHAR(20),
    cantidad INT DEFAULT 1,
    motivo TEXT,
    observaciones TEXT,
    estado ENUM('Dentro', 'Finalizada') DEFAULT 'Dentro',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vivienda_id) REFERENCES viviendas(id)
);

-- Comunicados
CREATE TABLE IF NOT EXISTS comunicados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    contenido TEXT NOT NULL,
    prioridad ENUM('Baja', 'Media', 'Alta') DEFAULT 'Media',
    fecha DATE NOT NULL,
    autor VARCHAR(100) DEFAULT 'Administrador',
    estado ENUM('Publicado', 'Borrador') DEFAULT 'Publicado',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Mantenimiento
CREATE TABLE IF NOT EXISTS mantenimiento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residente VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    prioridad ENUM('Baja', 'Media', 'Alta') DEFAULT 'Media',
    descripcion TEXT NOT NULL,
    ubicacion VARCHAR(100),
    fecha DATE NOT NULL,
    estado ENUM('Pendiente', 'En proceso', 'Resuelto') DEFAULT 'Pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Áreas comunes
CREATE TABLE IF NOT EXISTS areas_comunes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion VARCHAR(255),
    capacidad INT NOT NULL,
    estado ENUM('Disponible', 'No disponible') DEFAULT 'Disponible',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT IGNORE INTO areas_comunes
(nombre, descripcion, capacidad, estado)
VALUES
(
    'Rancho BBQ',
    'Espacio para reuniones y actividades con parrilla.',
    25,
    'Disponible'
),
(
    'Salón Comunal',
    'Salón para reuniones, celebraciones y actividades del condominio.',
    50,
    'Disponible'
),
(
    'Cancha Multiuso',
    'Cancha para actividades deportivas y recreativas.',
    20,
    'Disponible'
),
(
    'Piscina',
    'Área de piscina para residentes y sus invitados.',
    30,
    'Disponible'
),
(
    'Gimnasio',
    'Área equipada para ejercicio de los residentes.',
    15,
    'Disponible'
);

-- Reservas
CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residente_id INT NOT NULL,
    area_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    personas INT NOT NULL,
    comentarios TEXT,
    estado ENUM('Confirmada', 'Cancelada') DEFAULT 'Confirmada',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (residente_id) REFERENCES residentes(id),
    FOREIGN KEY (area_id) REFERENCES areas_comunes(id)
);

-- Configuración de cuotas
CREATE TABLE IF NOT EXISTS configuracion_cuotas (
    id INT PRIMARY KEY,
    monto_mensual DECIMAL(10,2) NOT NULL DEFAULT 45000,
    dia_vencimiento INT NOT NULL DEFAULT 15,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

INSERT IGNORE INTO configuracion_cuotas
(id, monto_mensual, dia_vencimiento)
VALUES
(
    1,
    45000,
    15
);

-- Cuotas
CREATE TABLE IF NOT EXISTS cuotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    residente_id INT NOT NULL,
    periodo DATE NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    estado ENUM('Pendiente', 'Pagada') DEFAULT 'Pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (residente_id)
        REFERENCES residentes(id)
        ON DELETE CASCADE,

    UNIQUE (residente_id, periodo)
);

-- Pagos
CREATE TABLE IF NOT EXISTS pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cuota_id INT NOT NULL UNIQUE,
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago DATETIME NOT NULL,
    metodo_pago VARCHAR(50) NOT NULL,
    numero_recibo VARCHAR(20) UNIQUE,
    estado ENUM('Completado') DEFAULT 'Completado',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (cuota_id)
        REFERENCES cuotas(id)
        ON DELETE CASCADE
);

USE residencianet;


-- INSERTS

-- Viviendas
INSERT INTO viviendas
(identificador, tipo, propietario, area, num_habitantes, estado, observaciones)
VALUES
(
    'A-101',
    'Apartamento',
    'María Rodríguez',
    85.50,
    3,
    'Ocupada',
    'Vivienda de prueba'
),
(
    'B-202',
    'Apartamento',
    'Carlos Vargas',
    92.00,
    2,
    'Ocupada',
    'Vivienda de prueba'
);

-- Residentes
INSERT INTO residentes
(nombre, cedula, vivienda_id, tipo_residente, telefono, correo,
 fecha_ingreso, estado, observaciones)
VALUES
(
    'María Rodríguez',
    '1-1111-1111',
    (SELECT id FROM viviendas WHERE identificador = 'A-101' LIMIT 1),
    'Propietario',
    '8888-1111',
    'maria@correo.com',
    '2025-01-15',
    'Activo',
    'Residente utilizado para pruebas'
),
(
    'Carlos Vargas',
    '2-2222-2222',
    (SELECT id FROM viviendas WHERE identificador = 'B-202' LIMIT 1),
    'Inquilino',
    '8888-2222',
    'carlos@correo.com',
    '2025-03-10',
    'Activo',
    'Residente utilizado para pruebas'
);

-- Visitantes
INSERT INTO visitantes
(nombre, cedula, visitado, apartamento, fecha, hora, placa,
 cantidad, motivo, observaciones)
VALUES
(
    'Andrea Jiménez',
    '3-3333-3333',
    'María Rodríguez',
    'A-101',
    '2026-08-15',
    '14:00:00',
    'ABC123',
    1,
    'Visita familiar',
    'Ingreso autorizado'
),
(
    'Daniel Mora',
    '4-4444-4444',
    'Carlos Vargas',
    'B-202',
    '2026-08-16',
    '10:30:00',
    'XYZ789',
    2,
    'Visita personal',
    'Ingreso autorizado'
);

-- Comunicados
INSERT INTO comunicados
(titulo, contenido, prioridad, fecha, autor, estado)
VALUES
(
    'Mantenimiento de la piscina',
    'La piscina permanecerá cerrada durante la mañana por trabajos de mantenimiento.',
    'Media',
    '2026-08-14',
    'Administrador',
    'Publicado'
),
(
    'Reunión de residentes',
    'Se realizará una reunión general de residentes en el salón comunal.',
    'Alta',
    '2026-08-20',
    'Administrador',
    'Publicado'
);

-- Mantenimiento
INSERT INTO mantenimiento
(residente, categoria, prioridad, descripcion, ubicacion, fecha, estado)
VALUES
(
    'María Rodríguez',
    'Electricidad',
    'Media',
    'Una lámpara del pasillo no enciende.',
    'Edificio A - Piso 1',
    '2026-08-12',
    'Pendiente'
),
(
    'Carlos Vargas',
    'Plomería',
    'Alta',
    'Se reporta una fuga de agua.',
    'Edificio B - Piso 2',
    '2026-08-11',
    'En proceso'
);

-- Reservas
INSERT INTO reservas
(residente_id, area_id, fecha, hora_inicio, hora_fin,
 personas, comentarios, estado)
VALUES
(
    (SELECT id FROM residentes WHERE cedula = '1-1111-1111'),
    (SELECT id FROM areas_comunes WHERE nombre = 'Rancho BBQ'),
    '2026-08-20',
    '14:00:00',
    '18:00:00',
    10,
    'Celebración familiar',
    'Confirmada'
),
(
    (SELECT id FROM residentes WHERE cedula = '2-2222-2222'),
    (SELECT id FROM areas_comunes WHERE nombre = 'Salón Comunal'),
    '2026-08-22',
    '10:00:00',
    '13:00:00',
    20,
    'Actividad familiar',
    'Confirmada'
);

-- Cuotas
INSERT IGNORE INTO cuotas
(residente_id, periodo, monto, fecha_vencimiento, estado)
VALUES
(
    (SELECT id FROM residentes WHERE cedula = '1-1111-1111'),
    '2026-07-01',
    45000,
    '2026-07-15',
    'Pendiente'
),
(
    (SELECT id FROM residentes WHERE cedula = '1-1111-1111'),
    '2026-08-01',
    45000,
    '2026-08-15',
    'Pendiente'
),
(
    (SELECT id FROM residentes WHERE cedula = '2-2222-2222'),
    '2026-07-01',
    45000,
    '2026-07-15',
    'Pagada'
),
(
    (SELECT id FROM residentes WHERE cedula = '2-2222-2222'),
    '2026-08-01',
    45000,
    '2026-08-15',
    'Pagada'
);

-- Pagos
INSERT IGNORE INTO pagos
(cuota_id, monto, fecha_pago, metodo_pago, numero_recibo, estado)
VALUES
(
    (
        SELECT id
        FROM cuotas
        WHERE residente_id =
            (SELECT id FROM residentes WHERE cedula = '2-2222-2222')
        AND periodo = '2026-07-01'
        LIMIT 1
    ),
    45000,
    '2026-07-10 10:30:00',
    'Tarjeta (simulación)',
    'REC-00001',
    'Completado'
),
(
    (
        SELECT id
        FROM cuotas
        WHERE residente_id =
            (SELECT id FROM residentes WHERE cedula = '2-2222-2222')
        AND periodo = '2026-08-01'
        LIMIT 1
    ),
    45000,
    '2026-08-10 14:15:00',
    'Tarjeta (simulación)',
    'REC-00002',
    'Completado'
);