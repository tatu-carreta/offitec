-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.20 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla offitec_tc.persona_telefono
DROP TABLE IF EXISTS `persona_telefono`;
CREATE TABLE IF NOT EXISTS `persona_telefono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `telefono_id` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla offitec_tc.telefono
DROP TABLE IF EXISTS `telefono`;
CREATE TABLE IF NOT EXISTS `telefono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_telefono_id` int(11) NOT NULL,
  `caracteristica` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `usuario_id_carga` int(11) DEFAULT NULL,
  `usuario_id_baja` int(11) DEFAULT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_telefono_tipo_telefono` (`tipo_telefono_id`),
  CONSTRAINT `FK_telefono_tipo_telefono` FOREIGN KEY (`tipo_telefono_id`) REFERENCES `tipo_telefono` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla offitec_tc.telefono_modificacion
DROP TABLE IF EXISTS `telefono_modificacion`;
CREATE TABLE IF NOT EXISTS `telefono_modificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefono_id` int(11) NOT NULL,
  `tipo_telefono_id` int(11) NOT NULL,
  `caracteristica` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_id_modificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_telefono_modificacion_telefono` (`telefono_id`),
  CONSTRAINT `FK_telefono_modificacion_telefono` FOREIGN KEY (`telefono_id`) REFERENCES `telefono` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
