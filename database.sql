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
('Administrador', 'admin@residencianet.com', '$2y$10$e.AaBH/Kbokn4aHfA6ryjORT5QPdUcuFIQ0OBbX76FPtPoQpyNfPS');

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
    apartamento VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    hora_salida TIME NULL,
    placa VARCHAR(20),
    cantidad INT DEFAULT 1,
    motivo TEXT,
    observaciones TEXT,
    estado ENUM('Dentro', 'Finalizada') DEFAULT 'Dentro',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
