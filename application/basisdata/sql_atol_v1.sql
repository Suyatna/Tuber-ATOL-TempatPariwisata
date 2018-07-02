/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_atol_tubes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_atol_tubes` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_atol_tubes`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` char(18) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses_wilayah` enum('KOTA BANDUNG','KABUPATEN BANDUNG','KABUPATEN BANDUNG BARAT','KOTA CIMAHI','SEMUA') NOT NULL,
  `level` enum('SuperAdmin','AdminDinas','PemilikWisata') DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`username`,`password`,`akses_wilayah`,`level`) values 
('ad001','Admin','54321','SEMUA','SuperAdmin');

/*Table structure for table `tb_detail_wisata` */

DROP TABLE IF EXISTS `tb_detail_wisata`;

CREATE TABLE `tb_detail_wisata` (
  `id_wisata` int(11) NOT NULL,
  `fasilitas_wisata` varchar(100) NOT NULL,
  `hrg_tkt_fasilitas` int(11) NOT NULL,
  KEY `id_wisata` (`id_wisata`),
  CONSTRAINT `tb_detail_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_wisata` (`id_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_wisata` */

/*Table structure for table `tb_gambar_wisata` */

DROP TABLE IF EXISTS `tb_gambar_wisata`;

CREATE TABLE `tb_gambar_wisata` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_wisata` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gambar`),
  KEY `id_wisata` (`id_wisata`),
  CONSTRAINT `tb_gambar_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_wisata` (`id_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gambar_wisata` */

/*Table structure for table `tb_kabupaten` */

DROP TABLE IF EXISTS `tb_kabupaten`;

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` char(4) NOT NULL,
  `nama_kabupaten` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kabupaten` */

insert  into `tb_kabupaten`(`id_kabupaten`,`nama_kabupaten`) values 
('3204','KABUPATEN BANDUNG'),
('3217','KABUPATEN BANDUNG BARAT'),
('3273','KOTA BANDUNG'),
('3277','KOTA CIMAHI');

/*Table structure for table `tb_kecamatan` */

DROP TABLE IF EXISTS `tb_kecamatan`;

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` char(7) NOT NULL,
  `id_kabupaten` char(4) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kecamatan`),
  KEY `id_kabupaten` (`id_kabupaten`),
  CONSTRAINT `tb_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id_kabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kecamatan` */

insert  into `tb_kecamatan`(`id_kecamatan`,`id_kabupaten`,`nama_kecamatan`) values 
('3204010','3204','CIWIDEY'),
('3204011','3204','RANCABALI'),
('3204020','3204','PASIRJAMBU'),
('3204030','3204','CIMAUNG'),
('3204040','3204','PANGALENGAN'),
('3204050','3204','KERTASARI'),
('3204060','3204','PACET'),
('3204070','3204','IBUN'),
('3204080','3204','PASEH'),
('3204090','3204','CIKANCUNG'),
('3204100','3204','CICALENGKA'),
('3204101','3204','NAGREG'),
('3204110','3204','RANCAEKEK'),
('3204120','3204','MAJALAYA'),
('3204121','3204','SOLOKAN JERUK'),
('3204130','3204','CIPARAY'),
('3204140','3204','BALEENDAH'),
('3204150','3204','ARJASARI'),
('3204160','3204','BANJARAN'),
('3204161','3204','CANGKUANG'),
('3204170','3204','PAMEUNGPEUK'),
('3204180','3204','KATAPANG'),
('3204190','3204','SOREANG'),
('3204191','3204','KUTAWARINGIN'),
('3204250','3204','MARGAASIH'),
('3204260','3204','MARGAHAYU'),
('3204270','3204','DAYEUHKOLOT'),
('3204280','3204','BOJONGSOANG'),
('3204290','3204','CILEUNYI'),
('3204300','3204','CILENGKRANG'),
('3204310','3204','CIMENYAN'),
('3217010','3217','RONGGA'),
('3217020','3217','GUNUNGHALU'),
('3217030','3217','SINDANGKERTA'),
('3217040','3217','CILILIN'),
('3217050','3217','CIHAMPELAS'),
('3217060','3217','CIPONGKOR'),
('3217070','3217','BATUJAJAR'),
('3217071','3217','SAGULING'),
('3217080','3217','CIPATAT'),
('3217090','3217','PADALARANG'),
('3217100','3217','NGAMPRAH'),
('3217110','3217','PARONGPONG'),
('3217120','3217','LEMBANG'),
('3217130','3217','CISARUA'),
('3217140','3217','CIKALONG WETAN'),
('3217150','3217','CIPEUNDEUY'),
('3273010','3273','BANDUNG KULON'),
('3273020','3273','BABAKAN CIPARAY'),
('3273030','3273','BOJONGLOA KALER'),
('3273040','3273','BOJONGLOA KIDUL'),
('3273050','3273','ASTANAANYAR'),
('3273060','3273','REGOL'),
('3273070','3273','LENGKONG'),
('3273080','3273','BANDUNG KIDUL'),
('3273090','3273','BUAHBATU'),
('3273100','3273','RANCASARI'),
('3273101','3273','GEDEBAGE'),
('3273110','3273','CIBIRU'),
('3273111','3273','PANYILEUKAN'),
('3273120','3273','UJUNG BERUNG'),
('3273121','3273','CINAMBO'),
('3273130','3273','ARCAMANIK'),
('3273141','3273','ANTAPANI'),
('3273142','3273','MANDALAJATI'),
('3273150','3273','KIARACONDONG'),
('3273160','3273','BATUNUNGGAL'),
('3273170','3273','SUMUR BANDUNG'),
('3273180','3273','ANDIR'),
('3273190','3273','CICENDO'),
('3273200','3273','BANDUNG WETAN'),
('3273210','3273','CIBEUNYING KIDUL'),
('3273220','3273','CIBEUNYING KALER'),
('3273230','3273','COBLONG'),
('3273240','3273','SUKAJADI'),
('3273250','3273','SUKASARI'),
('3273260','3273','CIDADAP'),
('3277010','3277','CIMAHI SELATAN'),
('3277020','3277','CIMAHI TENGAH'),
('3277030','3277','CIMAHI UTARA');

/*Table structure for table `tb_kelurahan` */

DROP TABLE IF EXISTS `tb_kelurahan`;

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` char(10) NOT NULL,
  `id_kecamatan` char(7) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`),
  CONSTRAINT `tb_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelurahan` */

insert  into `tb_kelurahan`(`id_kelurahan`,`id_kecamatan`,`nama_kelurahan`) values 
('3204010001','3204010','PANUNDAAN'),
('3204010002','3204010','CIWIDEY'),
('3204010003','3204010','PANYOCOKAN'),
('3204010004','3204010','LEBAKMUNCANG'),
('3204010005','3204010','RAWABOGO'),
('3204010006','3204010','NENGKELAN'),
('3204010007','3204010','SUKAWENING'),
('3204011001','3204011','CIPELAH'),
('3204011002','3204011','SUKARESMI'),
('3204011003','3204011','INDRAGIRI'),
('3204011004','3204011','PATENGAN'),
('3204011005','3204011','ALAMENDAH'),
('3204020001','3204020','SUGIHMUKTI'),
('3204020002','3204020','MARGAMULYA'),
('3204020003','3204020','TENJOLAYA'),
('3204020004','3204020','CISONDARI'),
('3204020005','3204020','MEKARSARI'),
('3204020006','3204020','CIBODAS'),
('3204020007','3204020','CUKANGGENTENG'),
('3204020008','3204020','PASIRJAMBU'),
('3204020009','3204020','MEKARMAJU'),
('3204020010','3204020','CIKONENG'),
('3204030001','3204030','CIKALONG'),
('3204030002','3204030','MEKARSARI'),
('3204030003','3204030','CIPINANG'),
('3204030004','3204030','CIMAUNG'),
('3204030005','3204030','CAMPAKAMULYA'),
('3204030006','3204030','PASIRHUNI'),
('3204030007','3204030','JAGABAYA'),
('3204030008','3204030','MALASARI'),
('3204030009','3204030','SUKAMAJU'),
('3204030010','3204030','WARJABAKTI'),
('3204040001','3204040','WANASUKA'),
('3204040002','3204040','BANJARSARI'),
('3204040003','3204040','MARGALUYU'),
('3204040004','3204040','SUKALUYU'),
('3204040005','3204040','WARNASARI'),
('3204040006','3204040','PULOSARI'),
('3204040007','3204040','MARGAMEKAR'),
('3204040008','3204040','SUKAMANAH'),
('3204040009','3204040','MARGAMUKTI'),
('3204040010','3204040','PANGALENGAN'),
('3204040011','3204040','MARGAMULYA'),
('3204040012','3204040','TRIBAKTIMULYA'),
('3204040013','3204040','LAMAJANG'),
('3204050001','3204050','NEGLAWANGI'),
('3204050002','3204050','SANTOSA'),
('3204050003','3204050','TARUMAJAYA'),
('3204050004','3204050','CIKEMBANG'),
('3204050005','3204050','CIBEUREUM'),
('3204050006','3204050','CIHAWUK'),
('3204050007','3204050','SUKAPURA'),
('3204050008','3204050','RESMI TINGGAL'),
('3204060001','3204060','CIKITU'),
('3204060002','3204060','GIRIMULYA'),
('3204060003','3204060','SUKARAME'),
('3204060004','3204060','CIKAWAO'),
('3204060005','3204060','NAGRAK'),
('3204060006','3204060','MANDALAHAJI'),
('3204060007','3204060','MARUYUNG'),
('3204060008','3204060','PANGAUBAN'),
('3204060009','3204060','CINANGGELA'),
('3204060010','3204060','MEKARJAYA'),
('3204060011','3204060','MEKARSARI'),
('3204060012','3204060','CIPEUJEUH'),
('3204060013','3204060','TANJUNGWANGI'),
('3204070001','3204070','NEGLASARI'),
('3204070003','3204070','IBUN'),
('3204070004','3204070','LAKSANA'),
('3204070005','3204070','MEKARWANGI'),
('3204070006','3204070','SUDI'),
('3204070007','3204070','CIBEET'),
('3204070008','3204070','PANGGUH'),
('3204070009','3204070','KARYALAKSANA'),
('3204070010','3204070','LAMPEGAN'),
('3204070011','3204070','TALUN'),
('3204070012','3204070','TANGGULUN'),
('3204080001','3204080','LOA'),
('3204080002','3204080','DRAWATI'),
('3204080003','3204080','CIPAKU'),
('3204080004','3204080','SINDANGSARI'),
('3204080005','3204080','SUKAMANTRI'),
('3204080006','3204080','SUKAMANAH'),
('3204080007','3204080','MEKARPAWITAN'),
('3204080008','3204080','CIJAGRA'),
('3204080009','3204080','TANGSIMEKAR'),
('3204080010','3204080','CIPEDES'),
('3204080011','3204080','KARANGTUNGGAL'),
('3204080012','3204080','CIGENTUR'),
('3204090001','3204090','SRIRAHAYU'),
('3204090002','3204090','CILULUK'),
('3204090003','3204090','MEKARLAKSANA'),
('3204090004','3204090','CIHANYIR'),
('3204090005','3204090','CIKANCUNG'),
('3204090006','3204090','MANDALASARI'),
('3204090007','3204090','HEGARMANAH'),
('3204090008','3204090','CIKASUNGKA'),
('3204090009','3204090','TANJUNGLAYA'),
('3204100001','3204100','NAGROG'),
('3204100002','3204100','NARAWITA'),
('3204100003','3204100','MARGAASIH'),
('3204100004','3204100','CICALENGKA WETAN'),
('3204100005','3204100','CIKUYA'),
('3204100006','3204100','WALUYA'),
('3204100007','3204100','PANENJOAN'),
('3204100008','3204100','TENJOLAYA'),
('3204100009','3204100','CICALENGKA KULON'),
('3204100010','3204100','BABAKANPEUTEUY'),
('3204100011','3204100','DAMPIT'),
('3204100012','3204100','TANJUNGWANGI'),
('3204101001','3204101','MANDALAWANGI'),
('3204101002','3204101','BOJONG'),
('3204101003','3204101','CIHERANG'),
('3204101004','3204101','CIARO'),
('3204101005','3204101','NAGREG'),
('3204101006','3204101','CITAMAN'),
('3204101007','3204101','NAGREG KENDAN'),
('3204101008','3204101','GANJAR SABAR'),
('3204110001','3204110','SUKAMANAH'),
('3204110002','3204110','TEGALSUMEDANG'),
('3204110003','3204110','RANCAEKEK KULON'),
('3204110004','3204110','RANCAEKEK WETAN'),
('3204110005','3204110','BOJONGLOA'),
('3204110006','3204110','JELEGONG'),
('3204110007','3204110','LINGGAR'),
('3204110008','3204110','SUKAMULYA'),
('3204110009','3204110','HAURPUGUR'),
('3204110010','3204110','SANGIANG'),
('3204110011','3204110','BOJONGSALAM'),
('3204110012','3204110','CANGKUANG'),
('3204110013','3204110','NANJUNGMEKAR'),
('3204110014','3204110','RANCAEKEK KENCANA'),
('3204120001','3204120','NEGLASARI'),
('3204120002','3204120','WANGISAGARA'),
('3204120003','3204120','PADAMULYA'),
('3204120004','3204120','SUKAMUKTI'),
('3204120005','3204120','PADAULUN'),
('3204120006','3204120','BIRU'),
('3204120007','3204120','SUKAMAJU'),
('3204120008','3204120','MAJASETRA'),
('3204120009','3204120','MAJALAYA'),
('3204120010','3204120','MAJAKERTA'),
('3204120011','3204120','BOJONG'),
('3204121001','3204121','PANYADAP'),
('3204121002','3204121','PADAMUKTI'),
('3204121003','3204121','CIBODAS'),
('3204121004','3204121','LANGENSARI'),
('3204121005','3204121','SOLOKANJERUK'),
('3204121006','3204121','RANCAKASUMBA'),
('3204121007','3204121','BOJONGEMAS'),
('3204130001','3204130','BABAKAN'),
('3204130002','3204130','CIKONENG'),
('3204130003','3204130','SIGARACIPTA'),
('3204130004','3204130','PAKUTANDANG'),
('3204130005','3204130','MANGGUNGHARJA'),
('3204130006','3204130','MEKARSARI'),
('3204130007','3204130','CIPARAY'),
('3204130008','3204130','SUMBERSARI'),
('3204130009','3204130','SARIMAHI'),
('3204130010','3204130','SERANGMEKAR'),
('3204130011','3204130','GUNUNGLEUTIK'),
('3204130012','3204130','CIHEULANG'),
('3204130013','3204130','MEKARLAKSANA'),
('3204130014','3204130','BUMIWANGI'),
('3204140001','3204140','JELEKONG'),
('3204140002','3204140','MANGGAHANG'),
('3204140003','3204140','BALEENDAH'),
('3204140004','3204140','ANDIR'),
('3204140005','3204140','MALAKASARI'),
('3204140006','3204140','BOJONGMALAKA'),
('3204140007','3204140','RANCAMANYAR'),
('3204140008','3204140','WARGAMEKAR'),
('3204150001','3204150','BATUKARUT'),
('3204150002','3204150','MANGUNJAYA'),
('3204150003','3204150','MEKARJAYA'),
('3204150004','3204150','BAROS'),
('3204150005','3204150','LEBAKWANGI'),
('3204150006','3204150','WARGALUYU'),
('3204150007','3204150','ARJASARI'),
('3204150008','3204150','PINGGIRSARI'),
('3204150009','3204150','PATROLSARI'),
('3204150010','3204150','RANCAKOLE'),
('3204150011','3204150','ANCOLMEKAR'),
('3204160001','3204160','MEKARJAYA'),
('3204160002','3204160','BANJARAN WETAN'),
('3204160003','3204160','CIAPUS'),
('3204160004','3204160','SINDANGPANON'),
('3204160005','3204160','NEGLASARI'),
('3204160006','3204160','MARGAHURIP'),
('3204160007','3204160','KIANGROKE'),
('3204160008','3204160','KAMASAN'),
('3204160009','3204160','BANJARAN'),
('3204160010','3204160','TARAJUSARI'),
('3204160011','3204160','PASIRMULYA'),
('3204161001','3204161','JATISARI'),
('3204161002','3204161','NAGRAK'),
('3204161003','3204161','BANDASARI'),
('3204161004','3204161','PANANJUNG'),
('3204161005','3204161','CILUNCAT'),
('3204161006','3204161','CANGKUANG'),
('3204161007','3204161','TANJUNGSARI'),
('3204170001','3204170','BOJONGMANGGU'),
('3204170002','3204170','LANGONSARI'),
('3204170003','3204170','SUKASARI'),
('3204170004','3204170','RANCAMULYA'),
('3204170005','3204170','RANCATUNGKU'),
('3204170006','3204170','BOJONGKUNCI'),
('3204180004','3204180','GANDASARI'),
('3204180005','3204180','KATAPANG'),
('3204180006','3204180','CILAMPENI'),
('3204180007','3204180','PANGAUBAN'),
('3204180008','3204180','BANYUSARI'),
('3204180009','3204180','SANGKANHURIP'),
('3204180010','3204180','SUKAMUKTI'),
('3204190002','3204190','SADU'),
('3204190003','3204190','SUKAJADI'),
('3204190004','3204190','SUKANAGARA'),
('3204190005','3204190','PANYIRAPAN'),
('3204190006','3204190','KARAMATMULYA'),
('3204190007','3204190','SOREANG'),
('3204190008','3204190','PAMEKARAN'),
('3204190019','3204190','PARUNGSERAB'),
('3204190020','3204190','SEKARWANGI'),
('3204190021','3204190','CINGCIN'),
('3204191001','3204191','CILAME'),
('3204191002','3204191','BUNINAGARA'),
('3204191003','3204191','PADASUKA'),
('3204191004','3204191','SUKAMULYA'),
('3204191005','3204191','KUTAWARINGIN'),
('3204191006','3204191','KOPO'),
('3204191007','3204191','CIBODAS'),
('3204191008','3204191','JATISARI'),
('3204191009','3204191','JELEGONG'),
('3204191010','3204191','GAJAHMEKAR'),
('3204191011','3204191','PAMEUNTASAN'),
('3204250001','3204250','NANJUNG'),
('3204250002','3204250','MEKAR RAHAYU'),
('3204250003','3204250','RAHAYU'),
('3204250004','3204250','CIGONDEWAH HILIR'),
('3204250005','3204250','MARGAASIH'),
('3204250006','3204250','LAGADAR'),
('3204260001','3204260','SULAEMAN'),
('3204260002','3204260','SUKAMENAK'),
('3204260003','3204260','SAYATI'),
('3204260004','3204260','MARGAHAYU SELATAN'),
('3204260005','3204260','MARGAHAYU TENGAH'),
('3204270001','3204270','CANGKUANG KULON'),
('3204270002','3204270','CANGKUANG WETAN'),
('3204270003','3204270','PASAWAHAN'),
('3204270004','3204270','DAYEUHKOLOT'),
('3204270005','3204270','CITEUREUP'),
('3204270006','3204270','SUKAPURA'),
('3204280001','3204280','BOJONGSARI'),
('3204280002','3204280','BOJONGSOANG'),
('3204280003','3204280','LENGKONG'),
('3204280004','3204280','CIPAGALO'),
('3204280005','3204280','BUAHBATU'),
('3204280006','3204280','TEGALLUAR'),
('3204290001','3204290','CIBIRU HILIR'),
('3204290002','3204290','CINUNUK'),
('3204290003','3204290','CIMEKAR'),
('3204290004','3204290','CILEUNYI KULON'),
('3204290005','3204290','CILEUNYI WETAN'),
('3204290006','3204290','CIBIRU WETAN'),
('3204300001','3204300','GIRIMEKAR'),
('3204300002','3204300','JATIENDAH'),
('3204300003','3204300','MELATIWANGI'),
('3204300004','3204300','CIPANJALU'),
('3204300005','3204300','CIPOREAT'),
('3204300006','3204300','CILENGKRANG'),
('3204310001','3204310','CIBEUNYING'),
('3204310002','3204310','PADASUKA'),
('3204310003','3204310','MANDALAMEKAR'),
('3204310004','3204310','CIKADUT'),
('3204310005','3204310','SINDANGLAYA'),
('3204310006','3204310','MEKARMANIK'),
('3204310007','3204310','CIMENYAN'),
('3204310008','3204310','MEKARSALUYU'),
('3204310009','3204310','CIBURIAL'),
('3217010001','3217010','CICADAS'),
('3217010002','3217010','CIBEDUG'),
('3217010003','3217010','SUKAMANAH'),
('3217010004','3217010','BOJONG'),
('3217010005','3217010','BOJONGSALAM'),
('3217010006','3217010','CINENGAH'),
('3217010007','3217010','SUKARESMI'),
('3217010008','3217010','CIBITUNG'),
('3217020001','3217020','CILANGARI'),
('3217020002','3217020','SINDANGJAYA'),
('3217020003','3217020','BUNIJAYA'),
('3217020004','3217020','SIRNAJAYA'),
('3217020005','3217020','GUNUNGHALU'),
('3217020006','3217020','CELAK'),
('3217020007','3217020','WARGASALUYU'),
('3217020008','3217020','SUKASARI'),
('3217020009','3217020','TAMANJAYA'),
('3217030001','3217030','MEKARWANGI'),
('3217030002','3217030','WENINGGALIH'),
('3217030003','3217030','WANGUNSARI'),
('3217030004','3217030','BUNINAGARA'),
('3217030005','3217030','CIKADU'),
('3217030006','3217030','RANCA SENGGANG'),
('3217030007','3217030','CINTAKARYA'),
('3217030008','3217030','CICANGKANG GIRANG'),
('3217030009','3217030','PUNCAKSARI'),
('3217030010','3217030','PASIRPOGOR'),
('3217030011','3217030','SINDANGKERTA'),
('3217040001','3217040','KARYAMUKTI'),
('3217040002','3217040','NANGGERANG'),
('3217040003','3217040','MUKAPAYUNG'),
('3217040004','3217040','RANCAPANGGUNG'),
('3217040005','3217040','BONGAS'),
('3217040006','3217040','BATULAYANG'),
('3217040007','3217040','CILILIN'),
('3217040008','3217040','KARANGTANJUNG'),
('3217040010','3217040','KIDANGPANANJUNG'),
('3217040018','3217040','BUDIHARJA'),
('3217040019','3217040','KARANGANYAR'),
('3217050009','3217050','SINGAJAYA'),
('3217050011','3217050','TANJUNGWANGI'),
('3217050012','3217050','SITUWANGI'),
('3217050013','3217050','PATARUMAN'),
('3217050014','3217050','CIPATIK'),
('3217050015','3217050','CITAPEN'),
('3217050016','3217050','CIHAMPELAS'),
('3217050017','3217050','MEKARMUKTI'),
('3217050020','3217050','TANJUNGJAYA'),
('3217050021','3217050','MEKARJAYA'),
('3217060001','3217060','CINTAASIH'),
('3217060002','3217060','KARANGSARI'),
('3217060003','3217060','NEGLASARI'),
('3217060004','3217060','GIRIMUKTI'),
('3217060005','3217060','CIJENUK'),
('3217060006','3217060','CICANGKANG HILIR'),
('3217060007','3217060','SUKAMULYA'),
('3217060008','3217060','CITALEM'),
('3217060009','3217060','MEKARSARI'),
('3217060010','3217060','SARINAGEN'),
('3217060011','3217060','CIBENDA'),
('3217060012','3217060','CIJAMBU'),
('3217060013','3217060','SIRNAGALIH'),
('3217060014','3217060','BARANANGSIANG'),
('3217070001','3217070','SELACAU'),
('3217070002','3217070','BATUJAJAR BARAT'),
('3217070003','3217070','BATUJAJAR TIMUR'),
('3217070004','3217070','GIRIASIH'),
('3217070005','3217070','GALANGGANG'),
('3217070006','3217070','PANGAUBAN'),
('3217070007','3217070','CANGKORAH'),
('3217071001','3217071','BOJONGHALEUANG'),
('3217071002','3217071','CIKANDE'),
('3217071003','3217071','GIRIMUKTI'),
('3217071004','3217071','CIPANGERAN'),
('3217071005','3217071','JATI'),
('3217071006','3217071','SAGULING'),
('3217080001','3217080','RAJAMANDALA KULON'),
('3217080002','3217080','CIPTAHARJA'),
('3217080003','3217080','CIPATAT'),
('3217080004','3217080','CITATAH'),
('3217080005','3217080','GUNUNGMASIGIT'),
('3217080006','3217080','CIRAWAMEKAR'),
('3217080007','3217080','NYALINDUNG'),
('3217080008','3217080','SUMURBANDUNG'),
('3217080009','3217080','KERTAMUKTI'),
('3217080010','3217080','SARIMUKTI'),
('3217080011','3217080','MANDALASARI'),
('3217080012','3217080','MANDALAWANGI'),
('3217090001','3217090','LAKSANAMEKAR'),
('3217090002','3217090','CIMERANG'),
('3217090003','3217090','CIPEUNDEUY'),
('3217090004','3217090','KERTAJAYA'),
('3217090005','3217090','JAYAMEKAR'),
('3217090006','3217090','PADALARANG'),
('3217090007','3217090','KERTAMULYA'),
('3217090008','3217090','CIBURUY'),
('3217090009','3217090','TAGOGAPU'),
('3217090010','3217090','CEMPAKAMEKAR'),
('3217100001','3217100','CIMAREME'),
('3217100002','3217100','GADOBANGKONG'),
('3217100003','3217100','TANIMULYA'),
('3217100004','3217100','PAKUHAJI'),
('3217100005','3217100','CILAME'),
('3217100006','3217100','MARGAJAYA'),
('3217100007','3217100','MEKARSARI'),
('3217100008','3217100','NGAMPRAH'),
('3217100009','3217100','SUKATANI'),
('3217100010','3217100','CIMANGGU'),
('3217100011','3217100','BOJONGKONENG'),
('3217110001','3217110','CIWARUGA'),
('3217110002','3217110','CIHIDEUNG'),
('3217110003','3217110','CIGUGUR GIRANG'),
('3217110004','3217110','SARIWANGI'),
('3217110005','3217110','CIHANJUANG'),
('3217110006','3217110','CIHANJUANG RAHAYU'),
('3217110007','3217110','KARYAWANGI'),
('3217120001','3217120','GUDANGKAHURIPAN'),
('3217120002','3217120','WANGUNSARI'),
('3217120003','3217120','PAGERWANGI'),
('3217120004','3217120','MEKARWANGI'),
('3217120005','3217120','LANGENSARI'),
('3217120006','3217120','KAYUAMBON'),
('3217120007','3217120','LEMBANG'),
('3217120008','3217120','CIKAHURIPAN'),
('3217120009','3217120','SUKAJAYA'),
('3217120010','3217120','JAYAGIRI'),
('3217120011','3217120','CIBOGO'),
('3217120012','3217120','CIKOLE'),
('3217120013','3217120','CIKIDANG'),
('3217120014','3217120','WANGUNHARJA'),
('3217120015','3217120','CIBODAS'),
('3217120016','3217120','SUNTENJAYA'),
('3217130001','3217130','PASIRHALANG'),
('3217130002','3217130','JAMBUDIPA'),
('3217130003','3217130','PADAASIH'),
('3217130004','3217130','KERTAWANGI'),
('3217130005','3217130','TUGUMUKTI'),
('3217130006','3217130','PASIRLANGU'),
('3217130007','3217130','CIPADA'),
('3217130008','3217130','SADANGMEKAR'),
('3217140001','3217140','KANANGASARI'),
('3217140002','3217140','MANDALASARI'),
('3217140003','3217140','MEKARJAYA'),
('3217140004','3217140','CIPADA'),
('3217140005','3217140','GANJARSARI'),
('3217140006','3217140','MANDALAMUKTI'),
('3217140007','3217140','CIPTAGUMATI'),
('3217140008','3217140','CIKALONG'),
('3217140010','3217140','PUTERAN'),
('3217140011','3217140','TENJOLAUT'),
('3217140012','3217140','CISOMANG BARAT'),
('3217140013','3217140','WANGUNJAYA'),
('3217150001','3217150','MARGALUYU'),
('3217150002','3217150','NANGGELENG'),
('3217150003','3217150','SIRNARAJA'),
('3217150004','3217150','JATIMEKAR'),
('3217150005','3217150','BOJONGMEKAR'),
('3217150006','3217150','NYENANG'),
('3217150007','3217150','CIPEUNDEUY'),
('3217150008','3217150','MARGALAKSANA'),
('3217150009','3217150','SUKAHAJI'),
('3217150010','3217150','CIHARASHAS'),
('3217150011','3217150','SIRNAGALIH'),
('3217150012','3217150','CIROYOM'),
('3273010001','3273010','GEMPOL SARI'),
('3273010002','3273010','CIGONDEWAH KALER'),
('3273010003','3273010','CIGONDEWAH KIDUL'),
('3273010004','3273010','CIGONDEWAH RAHAYU'),
('3273010005','3273010','CARINGIN'),
('3273010006','3273010','WARUNG MUNCANG'),
('3273010007','3273010','CIBUNTU'),
('3273010008','3273010','CIJERAH'),
('3273020001','3273020','MARGASUKA'),
('3273020002','3273020','CIRANGRANG'),
('3273020003','3273020','MARGAHAYU UTARA'),
('3273020004','3273020','BABAKAN CIPARAY'),
('3273020005','3273020','BABAKAN'),
('3273020006','3273020','SUKAHAJI'),
('3273030001','3273030','KOPO'),
('3273030002','3273030','SUKA ASIH'),
('3273030003','3273030','BABAKAN ASIH'),
('3273030004','3273030','BABAKAN TAROGONG'),
('3273030005','3273030','JAMIKA'),
('3273040001','3273040','CIBADUYUT KIDUL'),
('3273040002','3273040','CIBADUYUT WETAN'),
('3273040003','3273040','MEKAR WANGI'),
('3273040004','3273040','CIBADUYUT'),
('3273040005','3273040','KEBON LEGA'),
('3273040006','3273040','SITUSAEUR'),
('3273050001','3273050','KARASAK'),
('3273050002','3273050','PELINDUNG HEWAN'),
('3273050004','3273050','PANJUNAN'),
('3273050005','3273050','CIBADAK'),
('3273050006','3273050','KARANG ANYAR'),
('3273060001','3273060','CISEUREUH'),
('3273060002','3273060','PASIRLUYU'),
('3273060003','3273060','ANCOL'),
('3273060004','3273060','CIGERELENG'),
('3273060005','3273060','CIATEUL'),
('3273060007','3273060','BALONG GEDE'),
('3273070001','3273070','CIJAGRA'),
('3273070002','3273070','TURANGGA'),
('3273070003','3273070','LINGKAR SELATAN'),
('3273070004','3273070','MALABAR'),
('3273070005','3273070','BURANGRANG'),
('3273070006','3273070','CIKAWAO'),
('3273070007','3273070','PALEDANG'),
('3273080001','3273080','WATES'),
('3273080003','3273080','BATUNUNGGAL'),
('3273080004','3273080','KUJANGSARI'),
('3273090001','3273090','CIJAURA'),
('3273090002','3273090','MARGASARI'),
('3273090003','3273090','SEKEJATI'),
('3273090004','3273090','JATI SARI'),
('3273100001','3273100','DERWATI'),
('3273100002','3273100','CIPAMOKOLAN'),
('3273100005','3273100','MANJAHLEGA'),
('3273100006','3273100','MEKARJAYA'),
('3273101001','3273101','RANCABOLANG'),
('3273101002','3273101','RANCANUMPANG'),
('3273101003','3273101','CISARANTEN KIDUL'),
('3273101004','3273101','CIMINCRANG'),
('3273110003','3273110','PASIR BIRU'),
('3273110004','3273110','CIPADUNG'),
('3273110005','3273110','PALASARI'),
('3273110006','3273110','CISURUPAN'),
('3273111001','3273111','MEKAR MULYA'),
('3273111002','3273111','CIPADUNG KIDUL'),
('3273111003','3273111','CIPADUNG WETAN'),
('3273111004','3273111','CIPADUNG KULON'),
('3273120003','3273120','PASANGGRAHAN'),
('3273120004','3273120','PASIRJATI'),
('3273120005','3273120','PASIR WANGI'),
('3273120006','3273120','CIGENDING'),
('3273120007','3273120','PASIR ENDAH'),
('3273121001','3273121','CISARANTEN WETAN'),
('3273121002','3273121','BABAKAN PENGHULU'),
('3273121003','3273121','PAKEMITAN'),
('3273121004','3273121','SUKAMULYA'),
('3273130001','3273130','CISARANTEN KULON'),
('3273130002','3273130','CISARANTEN BINA HARAPAN'),
('3273130003','3273130','SUKAMISKIN'),
('3273130005','3273130','CISARANTEN ENDAH'),
('3273141001','3273141','ANTAPANI KIDUL'),
('3273141002','3273141','ANTAPANI TENGAH'),
('3273141003','3273141','ANTAPANI WETAN'),
('3273141004','3273141','ANTAPANI KULON'),
('3273142001','3273142','JATIHANDAP'),
('3273142002','3273142','KARANG PAMULANG'),
('3273142003','3273142','SINDANG JAYA'),
('3273142004','3273142','PASIR IMPUN'),
('3273150001','3273150','KEBON KANGKUNG'),
('3273150002','3273150','SUKAPURA'),
('3273150003','3273150','KEBUN JAYANTI'),
('3273150004','3273150','BABAKAN SARI'),
('3273150005','3273150','BABAKAN SURABAYA'),
('3273150006','3273150','CICAHEUM'),
('3273160002','3273160','BINONG'),
('3273160003','3273160','KEBON GEDANG'),
('3273160004','3273160','MALEER'),
('3273160005','3273160','CIBANGKONG'),
('3273160006','3273160','SAMOJA'),
('3273160007','3273160','KACAPIRING'),
('3273160008','3273160','KEBON WARU'),
('3273170001','3273170','BRAGA'),
('3273170002','3273170','KEBON PISANG'),
('3273170003','3273170','MERDEKA'),
('3273170004','3273170','BABAKAN CIAMIS'),
('3273180001','3273180','CAMPAKA'),
('3273180002','3273180','MALEBER'),
('3273180003','3273180','GARUDA'),
('3273180004','3273180','DUNGUS CARIANG'),
('3273180005','3273180','CIROYOM'),
('3273180006','3273180','KEBON JERUK'),
('3273190001','3273190','ARJUNA'),
('3273190002','3273190','PASIRKALIKI'),
('3273190003','3273190','PAMOYANAN'),
('3273190004','3273190','PAJAJARAN'),
('3273190005','3273190','HUSEN SASTRANEGARA'),
('3273190006','3273190','SUKARAJA'),
('3273200001','3273200','TAMAN SARI'),
('3273200002','3273200','CITARUM'),
('3273200003','3273200','CIHAPIT'),
('3273210001','3273210','SUKAMAJU'),
('3273210002','3273210','CICADAS'),
('3273210003','3273210','CIKUTRA'),
('3273210004','3273210','PADASUKA'),
('3273210005','3273210','PASIRLAYUNG'),
('3273210006','3273210','SUKAPADA'),
('3273220001','3273220','CIHAURGEULIS'),
('3273220002','3273220','SUKALUYU'),
('3273220003','3273220','NEGLASARI'),
('3273220004','3273220','CIGADUNG'),
('3273230001','3273230','CIPAGANTI'),
('3273230002','3273230','LEBAK SILIWANGI'),
('3273230003','3273230','LEBAK GEDE'),
('3273230004','3273230','SADANG SERANG'),
('3273230005','3273230','SEKELOA'),
('3273230006','3273230','DAGO'),
('3273240001','3273240','SUKAWARNA'),
('3273240002','3273240','SUKAGALIH'),
('3273240003','3273240','SUKABUNGAH'),
('3273240004','3273240','CIPEDES'),
('3273240005','3273240','PASTEUR'),
('3273250001','3273250','SARIJADI'),
('3273250002','3273250','SUKARASA'),
('3273250003','3273250','GEGERKALONG'),
('3273250004','3273250','ISOLA'),
('3273260001','3273260','HEGARMANAH'),
('3273260002','3273260','CIUMBULEUIT'),
('3277010001','3277010','MELONG'),
('3277010002','3277010','CIBEUREUM'),
('3277010003','3277010','UTAMA'),
('3277010004','3277010','LEUWIGAJAH'),
('3277010005','3277010','CIBEBER'),
('3277020001','3277020','BAROS'),
('3277020002','3277020','CIGUGUR TENGAH'),
('3277020003','3277020','KARANGMEKAR'),
('3277020004','3277020','SETIAMANAH'),
('3277020005','3277020','PADASUKA'),
('3277020006','3277020','CIMAHI'),
('3277030001','3277030','PASIRKALIKI'),
('3277030002','3277030','CIBABAT'),
('3277030003','3277030','CITEUREUP'),
('3277030004','3277030','CIPAGERAN');

/*Table structure for table `tb_pemilik_wisata` */

DROP TABLE IF EXISTS `tb_pemilik_wisata`;

CREATE TABLE `tb_pemilik_wisata` (
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktifasi` enum('Y','T') NOT NULL DEFAULT 'T',
  `aktifasi_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pemilik_wisata` */

/*Table structure for table `tb_wisata` */

DROP TABLE IF EXISTS `tb_wisata`;

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabupaten` char(4) NOT NULL,
  `id_kecamatan` char(7) NOT NULL,
  `id_kelurahan` char(10) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `langitude` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `tiket_dewasa` int(11) NOT NULL,
  `tiket_anak` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `aktifasi` enum('Y','T') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`id_wisata`),
  KEY `id_kabupaten` (`id_kabupaten`),
  KEY `id_kecamatan` (`id_kecamatan`),
  KEY `id_kelurahan` (`id_kelurahan`),
  CONSTRAINT `tb_wisata_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `tb_kabupaten` (`id_kabupaten`),
  CONSTRAINT `tb_wisata_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `tb_kecamatan` (`id_kecamatan`),
  CONSTRAINT `tb_wisata_ibfk_3` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurahan` (`id_kelurahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_wisata` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
