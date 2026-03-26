CREATE TABLE alumnos(
    puesto char(2) PRIMARY KEY,
    nombre varchar(40) NOT NULL,
    contrasena varchar(255) NOT NULL,
    nick_jesuita varchar(40) NOT NULL,
    frase varchar(150) NOT NULL,
    imagen varchar(20) NOT NULL UNIQUE,
    webAlumno varchar(40) NOT NULL UNIQUE,
    usuario varchar(30) NOT NULL
);

USE alumnos;
INSERT INTO alumnos (puesto, nombre, contrasena, nick_jesuita, frase, imagen, webAlumno, usuario) VALUES
    ('00','Manuel','pass00','nick00','Frase 00','00.jpg','00.php','user00'),
    ('01','Samuel','pass01','nick01','Frase 01','01.jpg','01.php','user01'),
    ('02','Yehú','pass02','nick02','Frase 02','02.jpg','02.php','user02'),
    ('03','José Antonio','pass03','nick03','Frase 03','03.jpg','03.php','user03'),
    ('04','hugo','pass04','nick04','Frase 04','04.jpg','04.php','user04'),
    ('05','Francisco Javier','pass05','nick05','Frase 05','05.jpg','05.php','user05'),
    ('06','Javier Cumplido','pass06','nick06','Frase 06','06.jpg','06.php','user06'),
    ('07','rubi','pass07','nick07','Frase 07','07.jpg','07.php','user07'),
    ('08','Sergio Fuente','pass08','nick08','Frase 08','08.jpg','08.php','user08'),
    ('09','Javier Garcia','pass09','nick09','Frase 09','09.jpg','09.php','user09'),
    ('10','Antonio','pass10','nick10','Frase 10','10.jpg','10.php','user10'),
    ('11','Angelo','pass11','nick11','Frase 11','11.jpg','11.php','user11'),
    ('12','Nicolas','pass12','nick12','Frase 12','12.jpg','12.php','user12'),
    ('13','Aitor','pass13','nick13','Frase 13','13.jpg','13.php','user13'),
    ('14','Iván','pass14','nick14','Frase 14','14.jpg','14.php','user14'),
    ('15','Teresa','pass15','nick15','Frase 15','15.jpg','15.php','user15'),
    ('16','Diego','pass16','nick16','Frase 16','16.jpg','16.php','user16'),
    ('17','Francisco Medina','pass17','nick17','Frase 17','17.jpg','17.php','user17'),
    ('18','Laura','pass18','nick18','Frase 18','18.jpg','18.php','user18'),
    ('19','Sergio Poves','pass19','nick19','Frase 19','19.jpg','19.php','user19'),
    ('20','Sara','pass20','nick20','Frase 20','20.jpg','20.php','user20'),
    ('21','Carlos','pass21','nick21','Frase 21','21.jpg','21.php','user21'),
    ('22','Abraham','pass22','nick22','Frase 22','22.jpg','22.php','user22'),
    ('23','Daniel','pass23','nick23','Frase 23','23.jpg','23.php','user23'),
    ('24','Lucas','pass24','nick24','Frase 24','24.jpg','24.php','user24');

CREATE TABLE agradecimientos(
    idAgradecimiento smallint unsigned PRIMARY KEY AUTO_INCREMENT,
    mensaje varchar(255) NOT NULL,
    idEmisor varchar(2) NOT NULL,
    idReceptor varchar(2) NOT NULL,
    
    CONSTRAINT fk_emisor FOREIGN KEY (idEmisor) REFERENCES alumnos(puesto),
    CONSTRAINT fk_receptor FOREIGN KEY (idReceptor) REFERENCES alumnos(puesto),
    CONSTRAINT csu_agradecimiento UNIQUE(idEmisor,idReceptor)
);