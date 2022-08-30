CREATE DATABASE wpuphpdasar;

USE wpuphpdasar;

CREATE TABLE mahasiswa (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nama VARCHAR(100),
	nrp CHAR(9),
	jurusan VARCHAR(100),
	gambar VARCHAR(100)
);

INSERT INTO mahasiswa VALUES (
	'',
	'Sandhika Galih',
	'123456789',
	'Teknik Informatika'
	'dummy0.png'
);




CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(50),
	password VARCHAR(255)
);
