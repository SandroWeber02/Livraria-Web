CREATE database UpLivriaria

CREATE TABLE `acervo` (
  `id` int(15) AUTO_INCREMENT PRIMARY KEY,
  `idEditora` int(15),
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(60) DEFAULT NULL,
  `ano` int(15) NOT NULL,
  `preco` double NOT NULL,
  `quantidade` int(15) NOT NULL,
  `editora` varchar(60),
  FOREIGN KEY (`idEditora`) REFERENCES `editora`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

