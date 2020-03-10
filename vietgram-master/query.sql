SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `user` (`username`, `password`, `email`) VALUES
('mfaishaldp', '1234', 'faishaldarmaputra@gmail.com'),
('joni', '4321', 'joni@gmail.com');


CREATE TABLE `photo` (
  `username` varchar(20) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `caption` varchar(300) NOT NULL,
  `jml_like` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `photo` (`username`, `url`, `caption`, `jml_like`) VALUES
('mfaishaldp', 'https://labenviro.co.id/wp-content/uploads/2018/10/alam.jpg', 'alam', 100),
('mfaishaldp', 'https://www.sinarharian.com.my/uploads/images/2019/09/20/466122.jpg', 'hijau', 200),
('mfaishaldp', 'https://i0.wp.com/www.maxmanroe.com/vid/wp-content/uploads/2019/04/Sumber-Daya-Alam.jpg?w=700&ssl=1', 'sun', 142),
('joni', 'https://www.indonesia.go.id/assets/img/content_image/1557109988_3_Destinasi_Alam_Indonesia_Ini_Cocok_Untuk_Rute_Bersepeda.jpg', 'sepeda', 124);


CREATE TABLE `profile` (
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `bio` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `profile` (`name`, `username`, `website`, `bio`, `email`, `hp`, `gender`) VALUES
('Muhammad Faishal Darma Putra', 'mfaishaldp', 'https://github.com/mfaishaldp', 'Bismillah', 'faishaldarmaputra@gmail.com', '082218727232', 'Male');

ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `photo`
  ADD KEY `FK_un` (`username`);

ALTER TABLE `profile`
  ADD KEY `FK_username` (`username`);

ALTER TABLE `photo`
  ADD CONSTRAINT `FK_un` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

ALTER TABLE `profile`
  ADD CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

