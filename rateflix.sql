/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.25-MariaDB : Database - rateflix
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rateflix` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `rateflix`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `CatCod` int(4) NOT NULL AUTO_INCREMENT,
  `CatDescricao` varchar(50) NOT NULL,
  PRIMARY KEY (`CatCod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `categoria` */

insert  into `categoria`(`CatCod`,`CatDescricao`) values 
(1,'Ação'),
(2,'Drama'),
(3,'Romance'),
(4,'Marvel'),
(5,''),
(6,'John Wick'),
(7,'Matrix'),
(8,'Senhor dos aneis'),
(9,'Star Wars'),
(10,'Harry Potter'),
(13,'DiCaprio'),
(14,'2022');

/*Table structure for table `criticas` */

DROP TABLE IF EXISTS `criticas`;

CREATE TABLE `criticas` (
  `CriCod` int(4) NOT NULL AUTO_INCREMENT,
  `CriTitulo` varchar(255) NOT NULL,
  `CriTexto` varchar(5000) NOT NULL,
  `CriUsuCod` int(4) NOT NULL,
  `CriIdFilme` varchar(15) NOT NULL,
  `CriNota` decimal(5,1) NOT NULL,
  `CriPosterCaminho` varchar(100) NOT NULL,
  PRIMARY KEY (`CriCod`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `criticas` */

insert  into `criticas`(`CriCod`,`CriTitulo`,`CriTexto`,`CriUsuCod`,`CriIdFilme`,`CriNota`,`CriPosterCaminho`) values 
(12,'Um conto de fadas pelo teste','Amy Adams tem 6 indicações ao Oscar (deveria ter 7 considerando que ela foi esnobada por A Chegada), porém é inegável que um de seus trabalhos mais populares é Encantada. O filme de 2007 é divertido, charmoso e brinca com o universo da Disney, revelando a força da atriz para ser a protagonista de uma grande história. Durante anos, muitos questionaram se Encantada ganharia uma sequência, até que esse momento finalmente chegou.Aposta exclusiva para o Disney+, Desencantada segue a jornada de Giselle numa nova aventura. Mas será que conseguiu manter o encanto? E olhe que não estamos falando do Encanto da Família Madrigal… Desculpe, não resisti à piada. Vamos seguir com a crítica:Qual é a história de Desencantada?Também conhecido em nossos corações como \"Encantada 2\", Disenchanted (no original) acompanha Giselle (Amy Adams) ainda casada com Robert (Patrick Dempsey), 10 anos após os acontecime...\"\"\"',14,'338958',3.0,'/8tuvxhScKT6qs8Js7ghLCLG5gxD.jpg'),
(13,'Aftersun faz crônica de um amor essencial, mas essencialmente fragmentado','O desafio posto diante de Paul Mescal em Aftersun não é pequeno: na pele de Calum, o pai da pré-adolescente Sophie (Frankie Corio), ele precisa fazer com que o espectador se sinta conectado a um homem que ele não realmente conhece - ou, na mais generosa das definições, que ele conhece apenas em pedacinhos, pelos olhos da filha, que Calum mantém proposital e dolorosamente afastada de certos aspectos de sua vida. O que o ator exercita aqui, portanto, é a arte de expressar sem dizer, de se fazer entender sem o artifício dramatúrgico da exposição.\r\n\r\nA nossa sorte é que Mescal é brilhante em seu trabalho. O segredo é a naturalidade do seu carisma, que vai na contramão dos astros de cinema mega-ensaiados de Hollywood, e que o torna compulsivamente “assistível”. A forma como Mescal se move pelas cenas, as marcas do estresse parental no corpo, as direções para as quais seus olhares quietamente angustiados fogem quando um ponto sensível é pressionado sem querer pela filha… nada disso escapa ao espectador, tanto porque a diretora Charlotte Wells é dedicada a registrar essas nuances quanto porque Mescal torna impossível perdê-las. De olhos grudados nele, nós o entendemos mesmo sem conhecê-lo.\r\n\r\nEssa é a crúcis de Aftersun como um todo, a bem dizer. Ao recortar e colar as lembranças de Sophie (na fase adulta, Celia Rowlson-Hall) sobre as férias que passou com o pai quando tinha 11 anos de idade, o filme aos poucos vai se materializando, diante do espectador, como um poema elegíaco à inescrutabilidade essencial dos nossos pais. Semi-protegidos por definição de suas partes mais feias, mas incapazes de manter a visão super-heróica que tínhamos deles na infância, aos poucos os convertemos, na mente senão no coração, em estranhos - ainda que sejam estranhos com os quais temos muita intimidade.\r\n\r\nEssa contradição dilacerante não diminui o amor da filha pelo pai, ou do pai pela filha. Aftersun cintila, na fotografia dourada de Gregory Oke e na montagem impressionista de Blair McClendon, com a mais pura afeição e empatia. As partes que vemos da angústia de Calum, sejam elas testemunhadas ou extrapoladas por Sophie, só fazem nos enternecer mais ao personagem, prantear mais a ausência mal-definida dele que pauta a vida adulta da filha, ao menos nos breves flashes que vemos dela. Calum, o homem, nos surge trágico apenas pelas partes de si que poda.\r\n\r\nDaí o uso esperto de enquadramentos que fragmentam o corpo do personagem, escondem-no nas sombras, nos espelhos, nas telas de TV ou nos limites da área registrada pela câmera. Como acontece, por exemplo, com as protagonistas de Sweetie (1989), clássico de Jane Campion, essa técnica não serve para despersonalizar Calum, mas para que entendamos a sua necessidade de se colocar no mundo em pedacinhos, eternamente incompleto, até (talvez especialmente) diante de quem mais ama. Sem estragar as revelações de Aftersun, vale dizer que esta é uma condição com a qual muitas pessoas na plateia vão se identificar intrinsecamente.\r\n\r\nDaí também a forma como Wells estrutura o seu filme, trocando o bom e velho esquema de três atos por uma espécie de crescente febril de conflitos sufocados e segredos espiados pela fresta da porta. O trabalho do texto e da edição aqui, na verdade, é amortecer o choque entre a intimidade quase sufocante dos trechos gravados como se fossem filmes caseiros e as passagens ambientadas em cenários de delírio, que se permitem um passeio fantasioso entre passado e presente. Tecer, enfim, a ponte entre uma tentativa emocional de simular a realidade e o afastamento teatral que permite desvelar verdades sobre ela. \r\n\r\nSe há algo para se dizer contra Aftersun, é que nem sempre esse trabalho árduo de conexão ocorre sem interferências. Às vezes, o filme de Wells parece complicar demais o que não precisa ser tão difícil, incluir camadas de estetização que, ao invés de auxiliar na comunicação com o espectador, atrapalham. No entanto, mesmo que definido pela própria diretora como autobiográfico, Aftersun escapa do egocentrismo e tem como ambição o universal. É um filme generoso e, acima de tudo, profundamente verdadeiro sobre o que há de insondável e particular na experiência humana daqueles cujas vidas se entrelaçam com as nossas.\"\"\"',14,'965150',6.0,'/jeXmhP2zbUkREMRqFOYIwQOk49T.jpg'),
(14,'Pantera Negra','Pantera Negra: Wakanda Para Sempre é a continuação do longa Pantera Negra, da Marvel, dirigido por Ryan Coogler e produzido por Kevin Feige. No filme, o mundo de Wakanda se expande. Após a morte do ator de T\'Challa (Chadwick Boseman) o foco de Wakanda Para Sempre são os personagens em volta do Pantera Negra. Rainha Ramonda (Angela Bassett), Shuri (Letitia Wright), M\'Baku (Winston Duke), Okoye (Danai Gurira) e as Dora Milage lutam para proteger a nação fragilizada de outros países após a morte de T\'Challa. Enquanto o povo de Wakanda se esforça para continuar em frente neste novo capítulo, a família e amigos do falecido rei precisam se unir com a ajuda de Nakia (Lupita Nyong\'o), integrante dos Cães de Guerra, e Everett Ross (Martin Freeman). Em meio a isso tudo, Wakanda ainda terá que aprender a conviver com a nação debaixo d\'água, Talokan, e seu rei Namor (Tenoch Huerta).',14,'505642',9.0,'/6tb0qiqLN9szHPA4i0kY38oaWew.jpg'),
(15,'PANTERA NEGRA: WAKANDA PARA SEMPRE','Pantera Negra: Wakanda Para Sempre é a continuação do longa Pantera Negra, da Marvel, dirigido por Ryan Coogler e produzido por Kevin Feige. No filme, o mundo de Wakanda se expande. Após a morte do ator de T\'Challa (Chadwick Boseman) o foco de Wakanda Para Sempre são os personagens em volta do Pantera Negra. Rainha Ramonda (Angela Bassett), Shuri (Letitia Wright), M\'Baku (Winston Duke), Okoye (Danai Gurira) e as Dora Milage lutam para proteger a nação fragilizada de outros países após a morte de T\'Challa. Enquanto o povo de Wakanda se esforça para continuar em frente neste novo capítulo, a família e amigos do falecido rei precisam se unir com a ajuda de Nakia (Lupita Nyong\'o), integrante dos Cães de Guerra, e Everett Ross (Martin Freeman). Em meio a isso tudo, Wakanda ainda terá que aprender a conviver com a nação debaixo d\'água, Talokan, e seu rei Namor (Tenoch Huerta).',14,'505642',8.0,'/6tb0qiqLN9szHPA4i0kY38oaWew.jpg');

/*Table structure for table `imagens` */

DROP TABLE IF EXISTS `imagens`;

CREATE TABLE `imagens` (
  `ImgCod` int(4) NOT NULL AUTO_INCREMENT,
  `ImgNome` varchar(255) NOT NULL,
  `ImgTipo` varchar(255) NOT NULL,
  `ImgData` longblob NOT NULL,
  PRIMARY KEY (`ImgCod`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `imagens` */

insert  into `imagens`(`ImgCod`,`ImgNome`,`ImgTipo`,`ImgData`) values 
(1,'IMG-637eea9d021580.62081800.png','',''),
(2,'IMG-637ef1664bad88.86895260.png','',''),
(3,'IMG-6380ba1284c199.92018871.jpg','',''),
(4,'IMG-6380ba144275b9.95127481.jpg','',''),
(5,'IMG-6380bc1cab99f6.80585503.jpg','',''),
(6,'IMG-6380bca92d87a3.24181719.jpg','',''),
(7,'IMG-6380bd503312c4.60537111.jpg','',''),
(8,'IMG-6380bdb0091ab8.65631938.jpg','',''),
(9,'IMG-6380be1e369570.78813342.png','',''),
(10,'IMG-6380fa10f1aa55.50888970.jpg','',''),
(11,'IMG-6380fa3e8d0e85.44118220.png','',''),
(12,'IMG-6380fa6f5f6738.49960223.jpg','',''),
(13,'IMG-6380fa805132e8.51289479.png','',''),
(15,'IMG-63853eb74fd5a5.11437104.jpeg','',''),
(31,'IMG-6387dfde753e52.88442616.jpeg','',''),
(32,'IMG-6387dfedcb3df5.04551178.jpeg','',''),
(33,'IMG-638b6ed48b5e94.67503032.jpg','',''),
(34,'IMG-638b6ee1d71c99.62404895.jpg','','');

/*Table structure for table `lista` */

DROP TABLE IF EXISTS `lista`;

CREATE TABLE `lista` (
  `LisCod` int(4) NOT NULL AUTO_INCREMENT,
  `LisTitulo` varchar(255) NOT NULL,
  `LisDescricao` varchar(255) NOT NULL,
  `LisCatCod` int(4) NOT NULL,
  `LisUsuCod` int(4) NOT NULL,
  PRIMARY KEY (`LisCod`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lista` */

insert  into `lista`(`LisCod`,`LisTitulo`,`LisDescricao`,`LisCatCod`,`LisUsuCod`) values 
(31,'Avengers','Filmes Avengers',4,14),
(32,'Star Wars','Filmes da franquia Star Wars',9,14),
(33,'Expelliarmus','Filmes do Harry Potter',10,14),
(37,'Filmes para assistir nesse ano','Filmes para assistir nesse ano',14,14);

/*Table structure for table `listaitens` */

DROP TABLE IF EXISTS `listaitens`;

CREATE TABLE `listaitens` (
  `LisItCod` int(4) NOT NULL AUTO_INCREMENT,
  `LisCod` int(4) NOT NULL,
  `LisIdFilme` varchar(10) NOT NULL,
  `LisCaminhoPoster` varchar(100) NOT NULL,
  PRIMARY KEY (`LisItCod`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4;

/*Data for the table `listaitens` */

insert  into `listaitens`(`LisItCod`,`LisCod`,`LisIdFilme`,`LisCaminhoPoster`) values 
(90,31,'299536','/rkHe0BfOo1f5N2q6rxgdYac7Zf6.jpg'),
(91,31,'299534','/q6725aR8Zs4IwGMXzZT8aC8lh41.jpg'),
(92,31,'24428','/u49fzmIJHkb1H4oGFTXtBGgaUS1.jpg'),
(93,31,'99861','/vGIIl89vglo66yUfbuTxzNAs4y5.jpg'),
(94,31,'1003598','/8chwENebfUEJzZ7sMUA0nOgiCKk.jpg'),
(95,32,'1893','/gNk8UNAumXlfCdtaxDqsQe7ZGlt.jpg'),
(96,32,'11','/dw7X9YPjjAfIxKHW04V64Bb9TB0.jpg'),
(97,32,'140607','/lqMDbo4rXnakFgc4C6LzPv6pG7F.jpg'),
(98,32,'181808','/5dGufuaIG5vNcxPm8QPij5MSPeQ.jpg'),
(99,32,'181812','/uLlrDUtFG2tKtDcJN6kBznlqqsp.jpg'),
(100,32,'1894','/9m1nJ2MfTG5QEmjOCg0b4YCo4W8.jpg'),
(101,32,'1895','/nuF5yWtTJEEAd4Qa6cVkYz1XCST.jpg'),
(141,33,'671','/l1FfRmKRNXRSqXT5GlMo16MX2LX.jpg'),
(142,33,'767','/hTQQ5l9mxA3Rob8PTyvrNNGuj6y.jpg'),
(143,33,'672','/811j0Jf2D0mK1U6RxXJoZgOB29n.jpg'),
(144,33,'674','/5oWB3hjzyECRBAjgWkmZinxl9qA.jpg'),
(145,33,'12444','/67FVFOTaeBUQnimhCWpUkDawDct.jpg'),
(146,33,'673','/1HdMUghqlgOIvbsU9ZtO40IPRzl.jpg'),
(147,33,'12445','/yD3VosOVW8WxPUzBDpEdzfv5pGx.jpg'),
(151,37,'505642','/6tb0qiqLN9szHPA4i0kY38oaWew.jpg'),
(152,37,'980017','/tgZNcpf7IdX1Tjv3DhGL8z8Juae.jpg'),
(153,37,'453395','/boIgXXUhw5O3oVkhXsE6SJZkmYo.jpg');

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `NotCod` int(4) NOT NULL AUTO_INCREMENT,
  `NotTitulo` varchar(150) NOT NULL,
  `NotNoticia` varchar(5000) NOT NULL,
  `NotUsuCod` int(4) NOT NULL,
  `NotCatCod` int(4) NOT NULL,
  `NotCaminho` varchar(255) NOT NULL,
  PRIMARY KEY (`NotCod`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `noticias` */

insert  into `noticias`(`NotCod`,`NotTitulo`,`NotNoticia`,`NotUsuCod`,`NotCatCod`,`NotCaminho`) values 
(20,'Keanu Reeves retorna em primeira imagem oficial de John Wick 4','A Lionsgate divulgou a primeira imagem do ator Keanu Reeves de volta ao seu papel em John Wick: Capítulo 4. A foto mostra o personagem cercado por luzes de velas em uma igreja. Talvez seja a calmaria antes da tempestade que está chegando? De acordo com o site Variety, as filmagens reveladas no CinemaCon, ocorrido em abril, confirmaram que o protagonista terá muitas cenas de ação, lutas e muitos esmagamentos de crânios. Aliás, a filmagem exibida no CinemaCon mostra John Wick perfurando um poste de madeira a ponto de seus dedos sangrarem, enquanto o personagem interpretado por Laurence Fishburne estava ao seu lado. Na cena, Wick também luta contra dois bandidos no saguão de uma galeria de arte – brutalizando-os com o uso de nunchucks. Por enquanto, o trailer do quarto filme ainda não foi divulgado.',14,1,'IMG-6380bdb0091ab8.65631938.jpg'),
(21,'Shazam! 2 será mais inspirado na mitologia grega do nas HQs, diz diretor','David F. Sandberg, diretor de Shazam! Fúria dos Deuses, revelou que o novo filme terá mais inspiração da mitologia grega do que dos quadrinhos. Em entrevista ao Empire (via CBR), Sandberg explicou o simples motivo. \"Porque os poderes de Shazam vêm de deuses gregos\", disse ele.  Na nova trama, o herói irá enfrentar Héspera e Kalypso, filhas do deus grego Atlas. \"E daí se esses poderes foram roubados dos deuses e agora eles querem vingança?\" Sandberg concluiu provocando quais outros personagens aparecerão no filme.  O cineasta também menciona que a continuação contará com uma criatura parecida com um dragão que ele descreveu como \"uma espécie de madeira e [tendo a capacidade de emanar] um efeito de medo\". E acrescentou: \"Foi muito legal mergulhar na mitologia, ao invés de histórias em quadrinhos.\"  Shazam! conta com o retorno de quase todo o elenco original, como Zachary Levy, Asher Angel, Jack Dylan Grazer, Faithe Herman, Grace Fulton, Ian Chen, Jovan Armand e Adam Brody, com a exceção sendo Mark Strong. Rachel Zegler, Helen Mirren e Lucy Liu são as grandes novidades da sequência.',14,1,'IMG-6380be1e369570.78813342.png');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `UsuCod` int(4) NOT NULL AUTO_INCREMENT,
  `UsuLogin` varchar(40) NOT NULL,
  `UsuSenha` varchar(40) NOT NULL,
  `UsuNome` varchar(40) NOT NULL,
  `UsuSobNome` varchar(80) NOT NULL,
  `UsuEmail` varchar(100) NOT NULL,
  `UsuNivel` char(1) NOT NULL,
  PRIMARY KEY (`UsuCod`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`UsuCod`,`UsuLogin`,`UsuSenha`,`UsuNome`,`UsuSobNome`,`UsuEmail`,`UsuNivel`) values 
(14,'admin','0192023a7bbd73250516f069df18b500','Vinicius','Pires','vinicius7balthazar@gmail.com','A'),
(15,'Usuario','401cec94d3ed586d8cb895c10c0f7db6','usuario','usuario','usuario@email.com',''),
(16,'viniciusp','c39d0e1f432c51ab7b6554ef93627ea9','Vinicius','Pires','vinicius7balthazar@gmail.com','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
