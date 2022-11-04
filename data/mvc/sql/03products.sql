USE `mvc`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) DEFAULT NULL,
  `type_id` int,
  `price` double not null,
  `fecha_compra` DEFAULT null,
  INDEX (type_id),
 FOREIGN KEY (type_id) REFERENCES product_types(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` VALUES
(1, 'ambar', 1, 0.8, 2013-5-9),
(2, 'Coca Cola', 2, 1, 2016-4-15),
(3, 'Fanta Lim�n', 2, 1, 2020-6-2),
(4, 'Fanta Naranja', 2, 1, 2009-12-15),
(5, 'Gin Tonic', 5, 3, 2017-11-9)
;


