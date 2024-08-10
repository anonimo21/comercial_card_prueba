CREATE TABLE IF NOT EXISTS `producto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stock`) VALUES
	(1, 'Macbook air m1', 'Macbook air m1', 200000.00, 34),
	(2, 'Macbook pro m3', 'Macbook pro m3', 600.00, 25),
	(6, 'iphone 15', 'iphone 15', 400000.00, 63),
	(7, 'Audifonos xiaomi', 'Audifonos xiaomi', 2000.00, 45),
	(8, 'Celular Samsung A54', 'Celular Samsung A54', 20.00, 12);