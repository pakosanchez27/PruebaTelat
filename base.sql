CREATE TABLE `tipoUsuarios`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tipo` VARCHAR(255) NOT NULL
);
CREATE TABLE `usuarios`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `apellidoP` VARCHAR(255) NOT NULL,
    `apellidoM` VARCHAR(255) NOT NULL,
    `sexo` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `telefono` VARCHAR(255) NOT NULL,
    `id_tipoUsuario` BIGINT NOT NULL,
    `id_direccion` BIGINT NOT NULL
);
CREATE TABLE `direccion`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `calle` VARCHAR(255) NOT NULL,
    `numero` INT NOT NULL,
    `colonia` VARCHAR(255) NOT NULL,
    `delegacion` VARCHAR(255) NOT NULL,
    `estado` VARCHAR(255) NOT NULL,
    `codigo_postal` INT NOT NULL
);
ALTER TABLE
    `Usuarios` ADD CONSTRAINT `usuarios_id_direccion_foreign` FOREIGN KEY(`id_direccion`) REFERENCES `Direccion`(`id`);
ALTER TABLE
    `Usuarios` ADD CONSTRAINT `usuarios_id_tipousuario_foreign` FOREIGN KEY(`id_tipoUsuario`) REFERENCES `Tipo usuario`(`id`);