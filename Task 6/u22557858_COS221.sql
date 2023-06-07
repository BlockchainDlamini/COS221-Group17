-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2023 at 10:03 AM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 7.3.31-1~deb10u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u22557858_COS221`
--

-- --------------------------------------------------------

--
-- Table structure for table `Award`
--

CREATE TABLE `Award` (
  `ID` int(11) NOT NULL,
  `Wine_Barrel_ID` int(11) UNSIGNED NOT NULL,
  `Award` varchar(128) NOT NULL,
  `Year` year(4) NOT NULL,
  `Details` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Award`
--

INSERT INTO `Award` (`ID`, `Wine_Barrel_ID`, `Award`, `Year`, `Details`) VALUES
(1, 2, 'Decanter Award', 2022, 'Silver for the Old Vine Steen 2021.'),
(2, 2, 'John Platter', 2023, '4.5 stars for the Old Vine Steen (Reserve Range) 2021.'),
(3, 3, 'Decanter Awards', 2022, 'Silver for the Vintage 2020.'),
(4, 3, 'John Platter', 2022, '4½ star for the Vintage 2018.'),
(5, 3, 'Michelangelo Awards', 2020, 'Grand Prix Trophy for the Vintage 2018'),
(6, 3, 'Michelangelo Awards', 2021, 'Gold for the Vintage 2019.'),
(7, 3, 'Tim Atkins', 2021, '91 Points for the Vintage 2019.'),
(8, 5, 'John Platter', 2022, '4 stars for the vintage 2021.'),
(9, 5, 'Michelangelo Awards', 2021, 'Double gold for the vintage 2021.'),
(10, 8, 'John Platter', 2023, '4.5 stars for the Greywacke Pinotage (Cape Chamonix Range) 2018'),
(11, 8, 'Tim Atkins', 2021, 'Scored 93 points for the vintage 2018'),
(12, 26, 'Michelangelo International Wine & Spirits Awards.', 2022, 'Silver at Michelangelo International Wine & Spirits Awards.'),
(13, 27, 'Michelangelo International Wine & Spirits Awards.', 2022, 'Silver at Michelangelo International Wine & Spirits Awards.'),
(14, 28, 'Michelangelo International Wine & Spirits Awards.', 2022, 'Silver at Michelangelo International Wine & Spirits Awards.');

-- --------------------------------------------------------

--
-- Table structure for table `Bottle`
--

CREATE TABLE `Bottle` (
  `Bottle_ID` int(11) NOT NULL,
  `Wine_Barrel_ID` int(11) UNSIGNED NOT NULL,
  `Bottle_Size` set('500ml','750ml','1000ml','250ml','') NOT NULL DEFAULT '750ml',
  `Price` decimal(10,2) UNSIGNED NOT NULL DEFAULT 199.99,
  `Num_Bottles_Made` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `Num_Bottles_Sold` int(250) NOT NULL,
  `Image_URL` varchar(500) NOT NULL DEFAULT '"https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Bottle`
--

INSERT INTO `Bottle` (`Bottle_ID`, `Wine_Barrel_ID`, `Bottle_Size`, `Price`, `Num_Bottles_Made`, `Num_Bottles_Sold`, `Image_URL`) VALUES
(1, 2, '750ml', '440.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/old-vine-steen-1678709501278.webp'),
(2, 3, '750ml', '240.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/chardonnay-1678709348415.webp'),
(3, 4, '750ml', '285.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/c7-chamonix-reserve-white-nv-1678713873905.webp'),
(4, 5, '750ml', '135.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/sauvignon-blanc-copy-1678709574518.webp'),
(5, 6, '750ml', '270.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/cab-franc-1678709293265.webp'),
(6, 7, '750ml', '225.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/feldspar-pinot-noir-1678709450281.webp'),
(7, 8, '750ml', '225.00', 10, 0, 'https://images.commerce7.com/chamonix-estate/images/x-large/pinotage-greywacke-copy-1678709476575.webp'),
(8, 10, '750ml', '615.01', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/nederburg-private-bin-r163-cabernet-sauvignon-2011-nv-auction-2017-size.png?v=1665931487'),
(9, 11, '750ml', '545.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/Nederburg_PB_R163_2018.png?v=1676893723'),
(10, 12, '750ml', '245.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/manor-house-shiraz_ac134bd1-6fcb-4e6e-a423-73a40e9bdf23.png?v=1628785704'),
(11, 13, '750ml', '90.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/Nederburg_Winemaster_s_Rose_2022.jpg?v=1681398342'),
(12, 14, '750ml', '374.99', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/nederburg-private-bin-edelkeur-2013-nv-auction-2017.png?v=1665931489'),
(13, 15, '750ml', '85.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0428/4815/7845/products/Nederburg-baronne-box_1cd51734-0ac0-432b-b635-5cab6063f1d5.png?v=1650791969'),
(14, 16, '750ml', '169.00', 10, 0, 'https://kwv.co.za/wp-content/uploads/2022/11/LABORIE-BLANC-DE-BLANCS_PACKSHOT_R1.png'),
(15, 17, '750ml', '79.00', 10, 0, 'https://laboriewines.co.za/wp-content/uploads/2022/08/Rose.jpg'),
(16, 18, '250ml', '130.00', 10, 0, 'https://shop.klawerwyn.co.za/image/cache/catalog/product/Villa_Esposto_Muscat_D\'Alexandrie_Straw_Wine_FINAL-630x800h.jpg'),
(17, 19, '750ml', '189.21', 10, 0, 'https://cdn-cejnl.nitrocdn.com/ksGwuQIIKbYWPBtTVvQbWJFQkKgajzBt/assets/images/optimized/rev-0cd86d0/wp-content/uploads/Omstaan-Shiraz-Petite-Verdot-1.png'),
(18, 20, '750ml', '165.47', 10, 0, 'https://cdn-cejnl.nitrocdn.com/ksGwuQIIKbYWPBtTVvQbWJFQkKgajzBt/assets/images/optimized/rev-0cd86d0/wp-content/uploads/Regopstaan-Colombard.png'),
(19, 21, '750ml', '135.15', 10, 0, 'https://cdn-cejnl.nitrocdn.com/ksGwuQIIKbYWPBtTVvQbWJFQkKgajzBt/assets/images/optimized/rev-0cd86d0/wp-content/uploads/Lyra-Vega.png'),
(20, 22, '750ml', '94.34', 10, 0, 'https://orangeriverwines.com/wp-content/uploads/Lyra-Quasar.jpg'),
(21, 23, '750ml', '1400.00', 10, 0, 'https://www.la-motte.com/cdn/shop/products/Hanneli-R-2017_large.jpg?v=1672919108'),
(22, 24, '750ml', '410.00', 10, 0, 'https://www.la-motte.com/cdn/shop/products/La_Motte_MCC_2017-RE_large_562d640a-cf7d-48b9-b829-7b2d9a625550_large.png?v=1649237388'),
(23, 25, '750ml', '110.00', 10, 0, 'https://www.la-motte.com/cdn/shop/products/La-Motte_Rose-2022_large.jpg?v=1665144056'),
(24, 26, '250ml', '25.00', 100, 0, 'https://cdn-biego.nitrocdn.com/MTabYuAZYwdzphMLbmhBGDpXkIDdsxUY/assets/images/optimized/rev-9f93677/wp-content/uploads/Perdeberg-SSR-Rose%CC%81-Can_Shadow.png'),
(25, 27, '250ml', '25.00', 100, 0, 'https://perdeberg.co.za/wp-content/uploads/Perdeberg-SSR-Red-Can_Shadow.png'),
(26, 28, '250ml', '25.00', 100, 0, 'https://perdeberg.co.za/wp-content/uploads/Perdeberg-SSR-White-Can_Shadow.png'),
(27, 29, '750ml', '375.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/Stellenbosch1679SingleVineyardOldVinesPinotage2020.png?v=1674476078&width=713'),
(28, 30, '750ml', '100.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/KoelenhofPinotageRoseVin-Sec2021.png?v=1674474870&width=713'),
(29, 31, '750ml', '95.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/KoelenboschMerlot2020.png?v=1674474272&width=713'),
(30, 32, '750ml', '160.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/KoelenboschPinorto2020.png?v=1674474446&width=713'),
(31, 33, '750ml', '70.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/StellenboschGoldRedBlend2020-2.png?v=1674477130&width=713'),
(32, 34, '750ml', '80.00', 10, 0, 'https://cdn.shopify.com/s/files/1/0708/9425/6437/products/KoelenboschDryPinotageRose2022.png?v=1674474211&width=713'),
(33, 35, '750ml', '1194.00', 6, 0, 'https://images.commerce7.com/cellardirect-kleine-zalze/images/large/kleine-zalze-vineyard-selection-shiraz-mourvdre-viognier-2019-1678353316561.avif'),
(34, 36, '750ml', '888.00', 6, 0, 'https://images.commerce7.com/cellardirect-kleine-zalze/images/large/nv_barrel_fermented_chenin_blanc-1678350695767.avif'),
(35, 37, '750ml', '972.00', 6, 0, 'https://images.commerce7.com/cellardirect-kleine-zalze/images/large/kleine-zalze-methode-cap-classique-brut-rose-nv-1678270073514.avif'),
(36, 38, '750ml', '90.00', 10, 0, 'https://dam.distell.co.za/m/431fbbb13172b42f/original/Durbanville-Hills-Website-cabernet-sauvignon.png'),
(37, 39, '750ml', '105.00', 10, 0, 'https://dam.distell.co.za/m/2fbc2a1d7ee919a9/original/Durbanville-Hills-Website-SparklingWine-Honeysuckle-Demi-Sec-crop.png'),
(38, 40, '750ml', '90.00', 10, 0, 'https://dam.distell.co.za/m/772233f06bfe81f0/original/Durbanville-Hills-Website-Chenin-2018.png'),
(39, 41, '750ml', '90.00', 10, 0, 'https://dam.distell.co.za/m/7b8a98c04947931c/original/Durbanville-Hills-Website-merlot.png'),
(40, 42, '750ml', '90.00', 10, 0, 'https://dam.distell.co.za/m/2cb0c082f3300eab/Small_Phone_Image-Durbanville-Hills-Website-Range-MerlotRose.png'),
(41, 51, '750ml', '875.00', 3000, 0, 'https://cdn.shopify.com/s/files/1/0615/8663/7027/products/StellenzichtAcheuleanRed2018.png?v=1670247273'),
(42, 52, '750ml', '225.00', 6000, 0, 'https://cdn.shopify.com/s/files/1/0615/8663/7027/products/StellenzichtAreniteSyrah2018.png?v=1670247750'),
(43, 53, '750ml', '450.00', 433, 0, 'https://cdn.shopify.com/s/files/1/0615/8663/7027/files/Untitleddesign-2023-05-24T154532.391.png?v=1684936370'),
(44, 54, '750ml', '300.00', 1596, 0, 'https://cdn.shopify.com/s/files/1/0615/8663/7027/products/StellenzichtSilcreteCinsault2020withbackground.png?v=1676382413');

-- --------------------------------------------------------

--
-- Table structure for table `Brand`
--

CREATE TABLE `Brand` (
  `Brand_ID` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Phone_Number` varchar(13) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Street_Address` varchar(128) NOT NULL,
  `Province` set('Eastern Cape','Free State','Gauteng','KwaZulu-Natal','Limpopo','Mpumalanga','Northern Cape','North West','Western Cape') NOT NULL,
  `Postal_Code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Brand`
--

INSERT INTO `Brand` (`Brand_ID`, `Name`, `Phone_Number`, `Email`, `Street_Address`, `Province`, `Postal_Code`) VALUES
(2, 'Durbanville Hills', '021 558 1300', ' info@durbanvillehills.co.za', 'Tygerberg Valley Rd, Cape Farms, Cape Town', 'Western Cape', '7550'),
(3, 'Klawer Cellars', '027 216 1530', 'ontvangs@klawerwyn.co.za', 'Birdfield Farm wine cellars, N7, Klawer', 'Western Cape', '8145'),
(4, 'Kleine Zalze', '021 880 0717', 'quality@kleinezalze.co.za', 'Strand Road (R44), Stellenbosch', 'Western Cape', '7613'),
(5, 'Koelenhof Wine Cellar', '021 865 2020', 'online@koelenhof.co.za', 'Koelenhof Wine Cellar (Pty) Ltd, Koelenhof Wine Cellar, R304, Koelenhof, Stellenbosch', 'Western Cape', '7605'),
(6, 'KWV Emporium', '021 807 3007', 'info@kwvemporium.co.za', 'Kohler Street, Southern Paarl', 'Western Cape', '7646'),
(7, 'La Motte', '021 876 8000', 'info@la-motte.co.za', 'La Motte Wine Estate (PTY) Ltd,\r\nPO Box 685, Franschhoek', 'Western Cape', '7690'),
(8, 'Nederburg', '021 862 3104', 'info@nederburg.com', 'Nederburg Wines, Sonstraal Road, Dal Josafat, Paarl', 'Western Cape', '7646'),
(9, 'Orange River', '054 337 8800', 'madere@owk.co.za', '32 Industria Street, Upington', 'Northern Cape', '8800'),
(10, 'Perdeberg Wines', '021 869 8244', 'info@perdeberg.co.za', 'Vryguns Farm, Windmeul, Paarl', 'Western Cape', '7630'),
(11, 'Stellenzicht Wines', '021 569 0362', 'winepod@stellenzicht.com', 'Upper Blaauwklippen Rd, Stellenbosch', 'Western Cape', '7599'),
(1, 'ThandosWines', '077 456 7681', 'thandodlamini@gmail.com', '0111', 'Gauteng', '0111');

-- --------------------------------------------------------

--
-- Table structure for table `Brand_Rating`
--

CREATE TABLE `Brand_Rating` (
  `Brand_ID` int(11) NOT NULL,
  `Brand_Name` varchar(128) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Rating` int(2) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Brand_Rating`
--

INSERT INTO `Brand_Rating` (`Brand_ID`, `Brand_Name`, `User_ID`, `Rating`) VALUES
(2, 'Durbanville Hills', 2, 5),
(2, 'Durbanville Hills', 10, 5),
(3, 'Klawer Cellars', 12, 5),
(4, 'Kleine Zalze', 1, 5),
(4, 'Kleine Zalze', 12, 5),
(5, 'Koelenhof Wine Cellar', 9, 5),
(6, 'KWV Emporium', 2, 5),
(7, 'La Motte', 4, 5),
(7, 'La Motte', 8, 5),
(10, 'Perdeberg Wines', 5, 5),
(11, 'Stellenzicht Wines', 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Production`
--

CREATE TABLE `Production` (
  `Winery_Name` varchar(128) NOT NULL,
  `Brand_Name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Production`
--

INSERT INTO `Production` (`Winery_Name`, `Brand_Name`) VALUES
('Chamonix Estate', 'ThandosWines'),
('Durbanville Hills Wine', 'Durbanville Hills'),
('Klawer Wine Cellars', 'Klawer Cellars'),
('Kleine Zalze Wines', 'Kleine Zalze'),
('Koelenhof Wine Cellar', 'Koelenhof Wine Cellar'),
('La Motte', 'La Motte'),
('Laborie Wines', 'KWV Emporium'),
('Nederburg Wines', 'Nederburg'),
('Orange River Wines', 'Orange River'),
('Perdeberg Wines', 'Perdeberg Wines'),
('Stellenzicht Vineyards', 'Stellenzicht Wines');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(128) NOT NULL,
  `Last_Name` varchar(128) NOT NULL,
  `Phone_Number` varchar(13) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Street_Address` varchar(128) NOT NULL,
  `Province` set('Eastern Cape','Free State','Gauteng','KwaZulu-Natal','Limpopo','Mpumalanga','Northern Cape','North West','Western Cape') NOT NULL,
  `Postal_Code` varchar(4) NOT NULL,
  `User_Type` set('Customer','Manager') NOT NULL,
  `Department` varchar(128) DEFAULT NULL,
  `Credentials` varchar(128) DEFAULT NULL,
  `Preferences` varchar(128) DEFAULT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_ID`, `First_Name`, `Last_Name`, `Phone_Number`, `Email`, `Street_Address`, `Province`, `Postal_Code`, `User_Type`, `Department`, `Credentials`, `Preferences`, `Password`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'Gauteng', 'test', 'Customer', 'test', 'test', 'test', 'test'),
(2, 'Zilla', 'Leontius', '082 800 8825', 'randomUnicorn@gmail.com', '1847 First Ave', '', '2838', 'Customer', NULL, NULL, NULL, 'HlkVHNVXe9'),
(4, 'Louise', 'Rodolfo', '082 199 8930', 'louRodo@gmail.com', '583 Tait St', '', '0299', 'Customer', NULL, NULL, NULL, '3rXFFs4xZL'),
(5, 'Ebony', 'Chavez', '083 330 5434', 'eboncha@gmail.com', '1431 Stanza Bopape St', '', '0950', 'Customer', NULL, NULL, NULL, '3rXFFs4xZL'),
(7, 'Zachery', 'Cortez', '082 822 0155', 'zacCor@hotmail.co.za', '1923 South St', 'North West', '0240', 'Customer', NULL, NULL, NULL, 'SWnxJzg5FC'),
(8, 'Max', 'Verstappen', '085 224 8957', 'maxxV@hotmail.co.za', '1989 Fox St', 'North West', '2742', 'Customer', NULL, NULL, NULL, 'Ne17pD5Cry'),
(9, 'Lando', 'Norris', '082 241 9858', 'LNorris@hotmail.co.za', '1773 Daffodil Dr', 'Eastern Cape', '5109', 'Customer', NULL, NULL, NULL, '3D3o5VxA6U'),
(10, 'Pierre', 'Gasly', '083 804 5223', 'PGazz@hotmail.co.za', '1542 Thomas St', 'KwaZulu-Natal', '3115', 'Customer', NULL, NULL, NULL, 'WmY3cEzs4P'),
(11, 'Elisa', 'Pecini', '085 811 9238', 'elpec@hotmail.co.za', '618 Hoog St', 'Gauteng', '1549', 'Customer', NULL, NULL, NULL, 'aG0J74CE31'),
(12, 'Courtney', 'King', '083 750 5815', 'CourtKing@hotmail.co.za', '2221 Thutlwa St', 'Limpopo', '0861', 'Customer', NULL, NULL, NULL, 'UcRhvzvmfv'),
(13, 'Kumbirai', 'Shonhiwa', '', '', '1036 Station Place, Hatfield,Pretoia,0083', 'Gauteng', '0083', 'Manager', 'IT', '', '', 'ArisNeiman123#'),
(19, 'bob', 'smith', '0800 555 123', 'bobsmith@gmail.com', '123 NorthPole', 'Gauteng', '1800', 'Customer', 'HR', '', '', 'password'),
(20, 'Kumbirai', 'Shonhiwa', '0723523319', 'kumbishonhiwa@popo.com', '1036 Station Place, Hatfield,Pretoia,0083', 'Gauteng', '0083', 'Customer', NULL, NULL, NULL, '926390f32b1087dda9cb5745ea4cb437962426aebae2ac5f1eb46bff1262ad11'),
(27, 'bob', 'marley', '0811 555 123', 'bobmarley@gmail.com', '123 NorthPole', 'Gauteng', '1800', 'Customer', 'HR', '', '', 'scbi152RrgbUT'),
(42, 'Kumbirai', 'Shonhiwa', '07433523319', 'kumbishonhiwa@jump.com', '1036 Station Place, Hatfield,Pretoia,0083', 'Gauteng', '0083', 'Customer', ' ', ' ', ' ', '926390f32b1087dda9cb5745ea4cb437962426aebae2ac5f1eb46bff1262ad11'),
(48, 'Victor', 'Shonhiwa', '0733523319', 'victor@icloud.com', '1036 Station Place, Hatfield,Pretoia,0083', '', '0083', 'Customer', ' ', ' ', ' ', '123456abc'),
(50, 'Munashe', 'Shonhiwa', '0723524419', 'kua@icloud.com', '1036 Station Place, Hatfield,Pretoia,0083', 'Gauteng', '0083', 'Customer', NULL, NULL, NULL, '926390f32b1087dda9cb5745ea4cb437962426aebae2ac5f1eb46bff1262ad11'),
(51, 'frank', 'ocean', '0723523309', 'j@icloud.com', '1036 Station Place, Hatfield,Pretoia,0083', 'Gauteng', '0083', 'Customer', NULL, NULL, NULL, '8e44338ab662ecf58ece8f6e0f90792c5bb0bc67d393642125f7fd51683072b0'),
(52, 'Thando', 'Dlamini', '0681306576', 'thandodlamini@gmail.com', 'Hatfield', 'Gauteng', '0157', 'Customer', NULL, NULL, NULL, '9dcf5c861c93c9846f2590cb957cf36c03b5704a4412d15bc36255e5519422a6'),
(55, 'Linda', 'James', '0681309901', 'LJames@gmail.com', 'Hatfield', 'Gauteng', '0157', 'Customer', NULL, NULL, NULL, '9dcf5c861c93c9846f2590cb957cf36c03b5704a4412d15bc36255e5519422a6'),
(56, 'Jon', 'Cena', '0681301224', 'JCena@gmail.com', 'Hatfield', 'Gauteng', '0112', 'Customer', NULL, NULL, NULL, '0704521281211dc6c116cb759a918cdffb5cbe9fee31658c131e91868ce38f06'),
(57, 'Rick', 'James', '0681304567', 'RickJames@gmail.com', 'Hatfield', 'Gauteng', '0113', 'Customer', NULL, NULL, NULL, 'RickJames101$'),
(58, 'Anold Tinotenda', 'Gwanynya', '0615467558', 'tinogwanz12@gmail.com', 'Tuksres Hillcrest Residence campus, Lunnon Road, Hillcrest, Pretoria, South Africa', 'Gauteng', '0083', 'Customer', NULL, NULL, NULL, 'f5b997d2aedf81c4ff749362ed79b6427a8b9bfde82dcc3b3dcae9c72124375e');

-- --------------------------------------------------------

--
-- Table structure for table `Varietal`
--

CREATE TABLE `Varietal` (
  `ID` int(11) NOT NULL,
  `Varietal_Name` varchar(128) NOT NULL,
  `Brand_Name` varchar(128) NOT NULL,
  `Residual_Sugar` decimal(10,2) DEFAULT NULL,
  `pH` decimal(10,2) DEFAULT NULL,
  `Alcohol_Percentage` decimal(10,2) DEFAULT NULL,
  `Quality` int(2) NOT NULL DEFAULT 5,
  `Category_Name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Varietal`
--

INSERT INTO `Varietal` (`ID`, `Varietal_Name`, `Brand_Name`, `Residual_Sugar`, `pH`, `Alcohol_Percentage`, `Quality`, `Category_Name`) VALUES
(1, 'Acheulean Chardonnay', 'Stellenzicht Wines', '2.30', '3.51', '12.28', 5, 'White'),
(2, 'Acheulean Red', 'Stellenzicht Wines', '2.46', '3.59', '14.60', 5, 'Red blend of 45% Cabernet Sauvignon 40% Syrah 15% Cinsault.'),
(3, 'Arenite Syrah', 'Stellenzicht Wines', '2.82', '3.60', '14.79', 5, 'Red'),
(4, 'Bin Edelkeur', 'Nederburg', '207.00', '3.69', '10.67', 5, 'White'),
(5, 'Blend', 'ThandosWines', '2.30', '3.24', '13.71', 5, 'White'),
(6, 'Cabernet Franc', 'ThandosWines', '1.60', '3.56', '14.50', 5, 'Red'),
(7, 'Cabernet Sauvignon', 'Durbanville Hills', '1.01', '3.70', '13.88', 5, 'Red'),
(8, 'Cabernet Sauvignon', 'Nederburg', '2.80', '3.50', '14.21', 5, 'Red'),
(9, 'Chardonnay', 'KWV Emporium', '4.20', '3.39', '13.50', 5, 'White'),
(10, 'Chenin Blanc', 'Durbanville Hills', '1.99', '3.60', '13.69', 5, 'White'),
(11, 'Chenin Blanc', 'Kleine Zalze', NULL, NULL, NULL, 5, 'Red'),
(12, 'Chenin Blanc', 'ThandosWines', '2.20', '3.20', '13.40', 5, 'White'),
(13, 'Colombard', 'Orange River', '2.40', '3.37', '12.77', 5, 'White'),
(14, 'Grenache Carignan', 'Nederburg', '3.50', '3.40', '11.10', 5, 'Rosé'),
(15, 'Lyra Vega', 'Orange River', '3.80', '3.81', '14.25', 5, 'Red blend of 66% Shiraz and 34% Petit Verdot'),
(16, 'Merlot', 'Durbanville Hills', '1.38', '3.51', '14.06', 5, 'Red'),
(17, 'Merlot', 'Koelenhof Wine Cellar', '3.60', '3.53', '14.96', 5, 'Red'),
(18, 'Merlot rose', 'Durbanville Hills', '2.27', '3.48', '14.18', 5, 'Rose'),
(19, 'Muscat dAlexandrie', 'Klawer Cellars', NULL, NULL, NULL, 5, 'Red'),
(20, 'Pinorto', 'Koelenhof Wine Cellar', '168.20', '3.29', '20.25', 5, 'Red'),
(21, 'Pinot Noir', 'ThandosWines', '2.40', '3.47', '13.00', 5, 'Red'),
(22, 'Pinotage', 'Koelenhof Wine Cellar', '3.90', '3.67', '15.22', 5, 'Red'),
(23, 'Pinotage', 'ThandosWines', '2.00', '3.60', '14.00', 5, 'Red'),
(24, 'Red Blend', 'Kleine Zalze', NULL, NULL, NULL, 5, 'A red blend of 80% Shiraz, 15% Mourvédre, 5% Viognier.'),
(25, 'Red Blend', 'Koelenhof Wine Cellar', '3.20', '3.61', '13.85', 5, 'A blend of 85% Pinotage and 15% Shiraz.'),
(26, 'Red Blend ', 'Nederburg', NULL, NULL, NULL, 5, 'Red blend of Cabernet Sauvignon (55%), Shiraz (45%)'),
(27, 'Red Blend', 'Perdeberg Wines', NULL, '3.51', '13.42', 5, 'Red Blend of shiraz, Cinsault, cabernet sauvignon and carbernet franc.'),
(28, 'Rosé', 'Koelenhof Wine Cellar', '1.00', '3.67', '13.10', 5, 'Dry Pinotage Rosé'),
(29, 'Rose', 'KWV Emporium', '4.40', '3.24', '13.15', 5, 'Rose'),
(30, 'Rosé Blend', 'Perdeberg Wines', NULL, '3.30', '11.40', 5, 'Rosé blend of Pinotage, Shiraz and Muscat.'),
(31, 'Rosé Chardonnay', 'Kleine Zalze', '11.00', '3.11', '12.02', 5, 'A blend of 60% Pinot Noir and 40% Chardonnay'),
(32, 'Rosé Vin-Sec', 'Koelenhof Wine Cellar', '30.30', '3.66', '11.32', 5, 'Rosé'),
(33, 'Sauvignon Blanc', 'ThandosWines', '1.70', '3.28', '13.52', 5, 'White'),
(34, 'Shiraz', 'Nederburg', '1.60', '3.44', '14.73', 5, 'Red'),
(35, 'Silcrete Cinsault', 'Stellenzicht Wines', '2.72', '3.48', '12.79', 5, 'Red'),
(36, 'Sparkling Demi-Sec', 'Durbanville Hills', '36.66', '3.44', '12.56', 5, 'Sparkling'),
(37, 'Syrah', 'La Motte', '2.70', '3.41', '13.69', 5, 'A blend of Shiraz (58%), Grenache (22%) and Petite Sirah (20%).'),
(38, 'test', 'ThandosWines', '10.00', '7.00', '5.00', 5, 'test'),
(39, 'White Blend', 'Perdeberg Wines', '10.50', '3.56', '12.90', 5, 'White blend of Chenin Blanc and Muscat.'),
(44, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(45, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(46, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(47, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(48, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(49, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(50, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(51, 'Pinotage', 'ThandosWines', '4.70', '5.80', '13.30', 5, 'Red'),
(52, 'Rosé', 'Kleine Zalze', '42.20', '3.04', '11.50', 5, 'Blend of 60% Pinot Noir and 40% Chardonnay'),
(53, 'Brut', 'Kleine Zalze', '43.60', '3.01', '11.50', 5, 'Blend of 60% Chardonnay and 40% Pinot Noir'),
(54, 'Cinsault Rosé', 'Kleine Zalze', NULL, NULL, NULL, 5, 'Rose'),
(55, 'Chenin Blanc', 'Kleine Zalze', NULL, NULL, NULL, 5, 'White'),
(56, 'Sauvignon Blanc', 'Kleine Zalze', NULL, NULL, NULL, 5, 'White'),
(57, 'Sauvignon Blanc Sur Lie', 'Kleine Zalze', NULL, NULL, NULL, 5, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `WineBarrels`
--

CREATE TABLE `WineBarrels` (
  `ID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Year` year(4) NOT NULL,
  `Description` varchar(288) NOT NULL,
  `Cellaring_Potential` year(4) DEFAULT NULL,
  `Varietal_ID` int(11) NOT NULL,
  `Winery_Name` varchar(128) NOT NULL,
  `Production_Date` year(4) NOT NULL,
  `Production_Method` varchar(500) NOT NULL,
  `Wineyard_Name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WineBarrels`
--

INSERT INTO `WineBarrels` (`ID`, `Name`, `Year`, `Description`, `Cellaring_Potential`, `Varietal_ID`, `Winery_Name`, `Production_Date`, `Production_Method`, `Wineyard_Name`) VALUES
(2, 'Chamonix Old Vine Steen', 2022, 'The old vine wine has a lemon-green colour and exquisite aroma, with scents reminiscent of stone fruit and hints of saline aromas. Well-structured, complex and minerally with flavours of citrus on the palate.', NULL, 12, 'Chamonix Estate', 1965, 'White wine made by Neil Bruwer.', 'Chamonix Estate'),
(4, 'Chamonix Estate White ', 2021, 'The Estate White in the first year after harvest shows a pale straw colour, fresh aromas with scents of exotic spice, figs, and grapefruit. On the palate it is full and round with rich fruit sensation and minerality. The wine reaches its prime in about 3 years after release.', NULL, 5, 'Chamonix Estate', 1965, 'Semillon 58% and Sauvignon Blanc 42% blend made by Neil Bruwer.', 'Chamonix Estate'),
(5, 'Chamonix Sauvignon Blanc', 2022, 'The Sauvignon Blanc has a pale lemon colour with greenish highlights, with scents reminiscent of tropical fruits and hints ripe figs. Lightly bodied, with flavours of citrus on the palate with a bright acidity.', NULL, 33, 'Chamonix Estate', 1965, 'White wine made by Neil Bruwer.', 'Chamonix Estate'),
(6, 'Chamonix Cabernet Franc Reserve', 2021, 'Intense bouquet with scents reminiscent of Dark fruit, red berries, spice, and cigar box. A wine of ample structure fills the mouth with concentrated fruit and berry sensations.', NULL, 6, 'Chamonix Estate', 1965, 'Red wine made by Neil Bruwer', 'Chamonix Estate'),
(7, 'Chamonix Feldspar Pinot Noir', 2021, 'The bouquet is complex with scents recalling wild berries, spice, sour cherries, and violets. On the palate the wine shows a medium body with fruit flavours and elegant tannins, leading to a long finish.', NULL, 21, 'Chamonix Estate', 1965, 'Red wine made by Neil Bruwer.', 'Chamonix Estate'),
(8, 'Chamonix Greywacke Pinotage', 2018, 'The Greywacke Pinotage has a deep garnet red colour. On the palate the wine shows full body and rich dark chocolate with fruit flavours, balanced elegantly by tannins, with a long and lingering finish that reveals a sweetness reminiscent of liquorice.', NULL, 23, 'Chamonix Estate', 1965, 'Red wine made by Neil Bruwer.', 'Chamonix Estate'),
(10, 'Private Bin R163 Cabernet Sauvignon', 2011, 'Packed with lush dark fruit and wrapped in mouth-watering tannins, this is still energised yet generous and harmonious. Deep layers of plum and blackberry with alluring graphite, cigar box and rich vanilla notes too. ', NULL, 8, 'Nederburg Wines', 1977, 'The grapes were harvested at 25º Balling and each block was individually vinified.\r\nRed wine made by Wilhelm Pienaar.', 'Nederburg Wines'),
(11, 'Private Bin R163 Cabernet Sauvignon', 2018, 'Velvety soft, supple and understated but complex and refined. Beautiful concentration and succulence with balanced oak support. ﻿', NULL, 8, 'Nederburg Wines', 1984, 'Red wine made by Elunda Basson.', 'Nederburg Wines'),
(12, 'The Manor House Shiraz', 2018, 'Dense ripe black fruit, vanilla nuances and sweet wood spice with a firm structure, velvety tannins and a long finish.', NULL, 34, 'Nederburg Wines', 1965, 'Red wine made by Samuel Viljoen.', 'Nederburg Wines'),
(13, 'The Winemasters Grenache Carignan Rosé', 2022, 'Strawberry and pomegranate flavours with a revitalising fresh juiciness. Rounded and ripe with pleasantly refreshing acidity throughout.', NULL, 14, 'Nederburg Wines', 2022, 'Grenache (91%) and Carignan (9%) made by Pieter Badenhorst and Jamie Williams.', 'Nederburg Wines'),
(14, 'Private Bin Edelkeur', 2013, 'Opulent, mouthfilling and complex with an intense honey flavour, it has an excellent sugar/acid balance and a lively, fresh finish.', NULL, 4, 'Nederburg Wines', 2013, 'White wine made by Natasha Boks.', 'Nederburg Wines'),
(15, 'Baronne', 2020, 'A rich, medium-bodied wine with ripe plum, prune, dark chocolate and oak spice flavours.', NULL, 26, 'Nederburg Wines', 2020, 'Cabernet Sauvignon (55%) and Shiraz (45%) blend made by Samuel Viljoen.', 'Nederburg Wines'),
(16, 'BLANC DE BLANCS', 2016, 'This complex and indulgent MCC shows aromas of green apple and citrus. Hints of lime are accompanied by aromas of toasted bread and hazelnut. The palate is creamy, round and textured with an explosive acidity and lasting, elegant finish.', NULL, 9, 'Laborie Wines', 2013, 'This MCC was matured on lees, in a bottle, for approximately\r\n60 months.', 'Laborie Wines'),
(17, 'Laborie Rose', 2022, 'This salmon pink wine shows prominent aromas of strawberries, Turkish delight and sweet melon. Hints of grapefruit, minerality and a touch of lime are carried through on the palate along with a seductively fresh and persistent finish.', 2020, 29, 'Laborie Wines', 2020, 'Made in Western Cape', 'Laborie Wines'),
(18, 'Villa Esposto Straw', 2020, 'This range is made from bush vine vineyards, on the farm Arbeideind (Basie van Lill) . Part of the Old Vine Project, as these vineyards-age ranges from 35+ years.', NULL, 19, 'Klawer Wine Cellars', 2020, 'Grapes were handpicked and dried in the sun for 2 weeks. During this process the sugar content increases with up to 20 balling.', 'Klawer Wine'),
(20, 'Regopstaan Colombard', 2021, 'A zesty and fresh Colombard with swirls of tropical fruit, lemon zest and vanilla coming through on the nose. Concentrated tropical and citrus flavours followed by a fresh and lingering finish on the pallet.', 2026, 13, 'Orange River Wines', 2021, 'Fermentation temperatures ranged between 16 - 18°C and lasted approximately 10 days.', 'Orange River Wines'),
(21, 'Lyra Vega', 2022, '', 2027, 15, 'Orange River Wines', 2020, 'Grapes are hand picked in the early morning hours at 24 -26 balling.', 'Orange River Wines'),
(23, 'Hanneli R', 2017, 'This complex Syrah-based blend is the ideal partner to red meat in most of its forms. With its well-structured tannins, this wine beautifully complements the intensity of hard cheese.', 2012, 37, 'La Motte', 2005, 'Grape varieties for the blend were sorted and fermented separately.', 'La Motte'),
(26, 'SSR Rosé ', 2022, 'An inviting, bright pink rosé with hints of fresh berries, cherries and candy floss on the nose. The palate is refreshingly sweet with a smooth finish that complements all social occasions.', NULL, 30, 'Perdeberg Wines', 2020, ' ', 'Perdeberg Wines'),
(27, 'SSR Red', 2021, 'A blend that offers soft tannins and fragrantly fresh notes of ripe, dark fruit. A touch of oak adds complexity and substance to a wine that bursts with fruity flavours and complements all social occasions.', NULL, 27, 'Perdeberg Wines', 2019, ' ', 'Perdeberg Wines.'),
(28, 'SSR White', 2022, 'A blend that offers a perfect harmony of flavours with fragrantly fresh notes of ripe tropical fruit. Refreshing tastes of white pear, peach and guava followed with a smooth palate that complements all social occasions.', NULL, 39, 'Perdeberg Wines', 2021, ' ', 'Perdeberg Wines'),
(29, 'Stellenbosch Single Vineyard Old Vines Pinotage', 2020, 'The wine boasts a bouquet of fresh cherries, red fruit and hints of spice, with an appealing mocha on the finish.\r\nBottled in December 2021 and released in February 2022.', NULL, 22, 'Koelenhof Wine Cellar', 1975, 'Phenolic ripe grapes were harvested and fermented for 7 days in open fermenters on the skins. After fermentation transferred to French oak barrels, where it finished its primary fermentation. Secondary fermentation and ageing for 16 months in 300-litre French oak barrels.', 'Koelenhof Wine Cellar (Stellenbosch)'),
(30, 'Koelenhof Pinotage Rosé Vin-Sec', 2021, 'A Vin-Sec style sparkling wine with a delightful pink colour. Boasting with strawberry and raspberry on the nose, these flavours follow through on the palate with slight candy-floss undertones.', NULL, 32, 'Koelenhof Wine Cellar', 2021, ' ', 'Koelenhof Wine Cellar (Koelenhof)'),
(31, 'Koelenbosch Merlot', 2020, 'The wine has a vibrant red colour with aromas of red berries followed by slight notes of smokiness. Flavours of raspberry and mocha on the palate add to the structure of this full-bodied Merlot.', NULL, 17, 'Koelenhof Wine Cellar', 2020, ' ', 'Koelenhof Wine Cellar (Koelenbosch)'),
(32, 'Koelenbosch Pinorto', 2020, 'Old bush vines from prime vineyards in Stellenbosch. Fermented in stainless steel tanks and matured in third-fill French oak barrels. Well-balanced with nutty-caramel nuances which end with a silky finish. Serve at room temperature.', NULL, 20, 'Koelenhof Wine Cellar', 2020, ' ', 'Koelenhof Wine Cellar (Koelenbosch)'),
(33, 'Stellenbosch Gold Red Blend', 2020, 'The wine has a deep red colour with a strong aroma of dark fruit and ripe berries on the nose. These flavours follow through on the palate with white pepper and a well-balanced structure on the finish.', NULL, 25, 'Koelenhof Wine Cellar', 2020, ' ', 'Koelenhof Wine Cellar (Stellenbosch)'),
(34, 'Koelenbosch Dry Pinotage Rosé', 2022, 'The nose has a concentrated red fruit, and floral intensity, with a textural mid-palate, tending towards boiled sweets and candy floss, complimented by a refreshing citrus finish.', NULL, 28, 'Koelenhof Wine Cellar', 2022, ' ', 'Koelenhof Wine Cellar (Koelenbosch)'),
(35, 'Kleine Zalze Vineyard Selection Shiraz Mourvèdre Viognier', 2019, 'This wine shows a lush bouquet of wild red fruit and hints of dried black olives and lavender which leads to an elegant, fresh mid-palate and ends with medium bodied, fine, and well-balanced tannins.', 2024, 24, 'Kleine Zalze Wines', 2019, '', 'Kleine Zalze'),
(36, 'Kleine Zalze Vineyard Selection Barrel Fermented Chenin Blanc', 2022, 'Tight with flavours of melon, peach, guava and a hint of minerality. Masterly oaked with a lively crisp finish.', NULL, 11, 'Kleine Zalze Wines', 2022, '', 'Kleine Zalze'),
(37, 'Kleine Zalze Methode Cap Classique Brut Rosé NV', 2015, 'A traditional, yet fun and flirtatious MCC with flair that delights the palate as much as the eye. A delicate silver pink hue with a lively cascading sparkle, aromas of cherries and red berries with elegant layers of finesse and decadence on the palate.', NULL, 31, 'Kleine Zalze Wines', 2015, ' ', 'Kleine Zalze'),
(38, 'Cabernet Sauvignon', 2021, 'An elegant full-bodied wine with prominent cinnamon, red-fleshed plums, blackberries, and red cherries accompanied by lingering sweet baking spices.', NULL, 7, 'Durbanville Hills Wine', 2020, 'Cabernet Sauvignon was oak matured for 12 months using predominantly French oak, utilising a small percentage of new oak together with older wood as well as wood alternatives. This is done to prevent over wooding thus preserving the elegance of our cool climate fruit.', ' Durbanville Hills'),
(39, 'Sparkling Honeysuckle Demi Sec', 2021, 'Enjoy on its own slightly chilled or served with mixed berries and cream, fresh oysters, smoked salmon and sushi. ', NULL, 36, 'Durbanville Hills Wine', 2020, 'The wine is crafted from 100% Sauvignon Blanc grapes, harvested at optimum ripeness when the balance between fruit, sugar and acid was perfectly in balance at 22.5 – 23.5˚B. In the cellar the grapes were destemmed into 15-ton separators and the free-run juice separated from the skins.', 'Durbanville Hills'),
(40, 'Chenin Blanc', 2022, '', NULL, 10, 'Durbanville Hills Wine', 2021, 'The grapes where gently crushed with minimal skin contact before the juice was separated from the skins. The juice was cold settled for 24 hours before it was racked from its primary lees and a percentage of the light lees was added again for further complexity. The juice was inoculated with a selected yeast strain to capture the fruity aromas, and fermentation took place at 13 - 15°C for 16 days.', 'Durbanville Hills'),
(41, 'Merlot', 2021, 'This wine holds a delightful aroma of sweet ripe plums and prunes with dark chocolate, cigar box and hints of cinnamon.', NULL, 7, 'Durbanville Hills Wine', 2020, ' ', 'Durbanville Hills'),
(42, 'Merlot Rose', 2022, 'Elegant wine displaying flavours of ripe red berries and a subtle Turkish delight sweetness with a fresh, crisp acidity.', NULL, 18, 'Durbanville Hills Wine', 2021, 'The Merlot grapes were harvested by hand at 22°C - 23°C Balling during March. No skin contact was allowed and only the free-run juice was drained to the settling tank. Over a two-day period, the juice was allowed to settle until clear. After racking, fermentation took place in temperature-controlled stainless-steel tanks over a three-week period. ', 'Durbanville Hills'),
(51, 'Acheulean Red', 2018, 'This is an exquisite balance of 45% Cabernet Sauvignon, 40% Shiraz and 15% Cinsault. Powerful on entry, with integrated oak, a sumptuous red and black fruit, in a mesh of fine coated tannins, demands the palate’s attention. It is an intriguing complex of savoury aromas.', NULL, 2, 'Stellenzicht Vineyards', 2016, 'The grapes are hand harvested in the morning. Whole bunches are pressed while the cold juice go to tank to settle. After 24 hours of settling, the juice is racked to Amphora pots and 500L barrels for fermentation. After fermentation is complete, the barrels/vessels are topped and all wine is left on the lees for up to 12 months. The tanks and barrels are racked off the lees just before bottling to make up the final blend.', 'Stellenzicht Wines'),
(52, 'Arenite Syrah', 2018, 'Our Syrah is happily rooted in these rocky soils as it is rooted in our history. Made from the same original Syrah clone as its acclaimed predecessor, this Stellenzicht stalwart exudes its origin with rich layers of dark berry fruit, spice and finely textured tannins.', NULL, 3, 'Stellenzicht Vineyards', 2016, 'The grapes are hand harvested in the morning. Whole bunches are pressed while the cold juice go to tank to settle. After 24 hours of settling, the juice is racked to Amphora pots and 500L barrels for fermentation. After fermentation is complete, the barrels/vessels are topped and all wine is left on the lees for up to 12 months. The tanks and barrels are racked off the lees just before bottling to make up the final blend.', 'Stellenzicht Wines'),
(53, 'Acheulean Chardonnay', 2022, 'All the senses come to life with this finely curated Chardonnay. The nose is driven by fresh stone fruit and citrus. The zesty minerality and acidity is imparted by amphora clay vessels. A delicate oak embraces a playful aromatics.', NULL, 1, 'Stellenzicht Vineyards', 2021, 'The grapes are hand harvested in the morning. Whole bunches are pressed while the cold juice go to tank to settle. After 24 hours of settling, the juice is racked to Amphora pots and 500L barrels for fermentation. After fermentation is complete, the barrels/vessels are topped and all wine is left on the lees for up to 12 months. The tanks and barrels are racked off the lees just before bottling to make up the final blend.', 'Stellenzicht Wines'),
(54, 'Silcrete Cinsault', 2020, 'Silcrete is a lithological term for a strongly hardened rock composed mainly of inherited quartz grains. These rocky soils are ideal for growing Cinsault. Our fruit come from 28-year-old dryland bush vines, yielding a fragrant wine with intense fruit aromas and lacy tannins.', NULL, 35, 'Stellenzicht Vineyards', 2018, 'The grapes are hand harvested in the morning. Whole bunches are pressed while the cold juice go to tank to settle. After 24 hours of settling, the juice is racked to Amphora pots and 500L barrels for fermentation. After fermentation is complete, the barrels/vessels are topped and all wine is left on the lees for up to 12 months. The tanks and barrels are racked off the lees just before bottling to make up the final blend.', 'Stellenzicht Wines'),
(81, 'Cape Nectar Cap Classique Rosé NV', 2023, 'A spontaneous, yet fun and flirtatious Cap Classique with aromas of strawberries and red berries followed by layers of tropical fruit. A delicate pink salmon hue with a lively fine lasting mousse, with elegant layers of finesse and decadence on the palate.', NULL, 52, 'Kleine Zalze Wines', 2022, ' ', 'Kleine Zalze Wines'),
(82, 'Cape Nectar Cap Classique Brut NV', 2022, 'A luscious yet still traditional Cap Classique, showing elegance and complexity with biscotti deliciousness. Delicate unique flavours of white peach, honeysuckle and pineapple are complimented by a touch of sweetness. ', NULL, 53, 'Kleine Zalze Wines', 2021, ' ', 'Kleine Zalze Wines'),
(83, 'Cellar Selection Cinsault Rosé', 2022, 'A beautiful bouquet of peach blossoms and fresh cherries follow on the palate supported by a citrus freshness and refreshing finish. This is a delicious wine that screams long lazy summer days in the sun with friends and good food.', NULL, 54, 'Kleine Zalze Wines', 2021, ' ', 'Kleine Zalze Wines'),
(84, 'Cellar Selection Chenin Blanc Bush Vines', 2022, 'Tropical stonefruit flavours supported by a burst of citrus on the palate. Well integrated with amazing texture.', 2025, 55, 'Kleine Zalze Wines', 2022, '', 'Kleine Zalze Wines'),
(85, 'Cellar Selection Sauvignon Blanc', 2023, 'Intense aromas of tropical fruit with prominent granadilla and pineapple. Zesty and flinty on the palate with the ever-present herbaceous character from Sauvignon Blanc.', 2026, 56, 'Kleine Zalze Wines', 2022, ' ', 'Kleine Zalze Wines'),
(86, 'Family Reserve Sauvignon Blanc Sur Lie', 2020, 'Lively and herbaceous with crisp layers of fruit. Intense palate with tropical and green elements.', 2025, 57, 'Kleine Zalze Wines', 2020, '', 'Kleine Zalze Wines');

-- --------------------------------------------------------

--
-- Table structure for table `WineRating`
--

CREATE TABLE `WineRating` (
  `User_ID` int(11) NOT NULL,
  `Bottle_ID` int(11) NOT NULL,
  `Rating` int(2) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WineRating`
--

INSERT INTO `WineRating` (`User_ID`, `Bottle_ID`, `Rating`) VALUES
(1, 5, 5),
(1, 12, 7),
(1, 19, 5),
(1, 21, 8),
(1, 33, 5),
(2, 1, 7),
(2, 3, 9),
(2, 18, 5),
(2, 28, 5),
(2, 40, 5),
(4, 25, 5),
(4, 35, 5),
(4, 44, 5),
(5, 19, 58),
(8, 3, 7),
(8, 36, 5),
(9, 11, 5),
(9, 14, 5),
(9, 22, 6),
(10, 4, 8),
(10, 8, 7),
(10, 10, 5),
(10, 12, 5),
(10, 31, 5),
(10, 34, 5),
(11, 9, 5),
(11, 12, 8),
(12, 8, 5),
(12, 20, 3),
(12, 21, 10),
(12, 30, 5),
(12, 42, 5),
(13, 5, 9),
(13, 7, 5),
(13, 24, 5),
(19, 2, 5),
(19, 20, 5),
(19, 38, 5),
(20, 1, 5),
(20, 41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Winery`
--

CREATE TABLE `Winery` (
  `Winery_ID` int(11) UNSIGNED NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Province` set('Eastern Cape','Western Cape','Free State','Gauteng','KwaZulu-Natal','Limpopo','Mpumalanga','Northern Cape','North West') NOT NULL,
  `Postal_Code` varchar(4) NOT NULL,
  `Street_Address` varchar(288) NOT NULL,
  `Phone_Number` varchar(13) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Brand_Name` varchar(128) NOT NULL,
  `Winery_URL` varchar(288) DEFAULT 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Winery`
--

INSERT INTO `Winery` (`Winery_ID`, `Name`, `Province`, `Postal_Code`, `Street_Address`, `Phone_Number`, `Email`, `Brand_Name`, `Winery_URL`) VALUES
(1, 'Chamonix Estate', 'Western Cape', '7690', 'Uitkyk Street, Franschhoek', '021 876 8400', 'staff@chamonix.co.za', 'ThandosWines', 'https://www.chamonix.co.za/images/marcopolo_lodge/marcopolo_lodge_gallery/marcopolo_lodge_image16.jpg'),
(2, 'Durbanville Hills Wine', 'Western Cape', '7550', 'Tygerberg Valley Rd, Cape Farms, Cape Town', '021 558 1300', 'info@durbanvillehills.co.za', 'Durbanville Hills', 'https://whichwinefarm.co.za/wp-content/uploads/2021/09/Durbanville-Hills-Aerial-View.jpeg'),
(3, 'Klawer Wine Cellars', 'Western Cape', '8145', 'Birdfield Farm wine cellars, N7, Klawer', '027 216 1530', 'KlawerWineCellars@gmail.com', 'Klawer Cellars', 'http://www.klawerwine.co.za/client/1106/images/header/image6.jpg'),
(4, 'Kleine Zalze Wines', 'Western Cape', '7600', 'Strand Rd, De Zalze Golf Estate, Stellenbosch', '021 880 0717', 'KleineZalzeWiness@gmail.com', 'Kleine Zalze', 'https://www.kleinezalze.co.za/wp-content/uploads/2023/03/FrontpageVineyards.jpg'),
(5, 'Koelenhof Wine Cellar', 'Western Cape', '7605', 'Koelenhof Wine Cellar (Pty) Ltd, Koelenhof Wine Cellar, R304, Koelenhof, Stellenbosch', '021 865 2020', 'ionline@koelenhof.co.za', 'Koelenhof Wine Cellar', 'https://images.wine.co.za/GetImage.ashx?ImageType=client_image&mode=social&IMAGEID=115193'),
(6, 'La Motte', 'Western Cape', '7690', 'La Motte Wine Estate (PTY) Ltd, Franschhoek', '021 876 8000', 'info@la-motte.co.za', 'La Motte', 'https://velvetescape.com/wp-content/uploads/2018/07/IMG_2169-1280x920.jpg'),
(7, 'Nederburg Wines', 'Western Cape', '7646', 'Sonstraal Rd, Paarl', '021 862 3104', 'NederburgWines@gmail.com', 'Nederburg', 'https://insideguide.co.za/cape-town/app/uploads/2019/07/nederburg-wine-farm.jpg'),
(8, 'Orange River Wines', 'Northern Cape', '8800', '32 Industria Street, Upington', '054 337 8800', 'tastingroom@owk.co.za', 'Orange River', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/a3/71/ec/tasting-centre-front.jpg?w=1200&h=-1&s=1'),
(9, 'Perdeberg Wines', 'Western Cape', '7630', 'Vryguns Farm, Windmeul, Paarl', '021 869 8244', 'info@perdeberg.co.za', 'Perdeberg Wines', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/07/3c/bb/perdeberg-cellar.jpg?w=1200&h=-1&s=1'),
(10, 'Stellenzicht Vineyards', 'Western Cape', '7599', 'Upper Blaauwklippen Rd, Stellenbosch', '021 569 0362', 'info@stellenzicht.com', 'Stellenzicht Wines', 'https://www.wineries.co.za/assets/wineries/w_415_stellenzicht_landscape.jpg'),
(11, 'Laborie Wines', 'Free State', '7646', 'Laborie Wine Estate Paarl', '021 807 3390', 'LaborieWines@gmail.com', 'KWV Emporium', 'https://laboriewines.co.za/wp-content/uploads/2022/07/AN00289-Laborie-Website-Refresh-FA-01-2048x1078.png'),
(15, 'ABC Winery', 'Free State', '1234', '123 Main St', '1234567890', 'abcwinery@example.com', 'ThandosWines', 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `WineryRating`
--

CREATE TABLE `WineryRating` (
  `User_ID` int(11) NOT NULL,
  `Winery_ID` int(11) UNSIGNED NOT NULL,
  `Rating` int(2) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WineryRating`
--

INSERT INTO `WineryRating` (`User_ID`, `Winery_ID`, `Rating`) VALUES
(1, 1, 5),
(1, 3, 5),
(2, 2, 5),
(4, 4, 5),
(5, 5, 5),
(7, 7, 5),
(8, 8, 5),
(9, 9, 5),
(11, 11, 5),
(12, 2, 5),
(12, 11, 5),
(19, 5, 5),
(20, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `WineyardRating`
--

CREATE TABLE `WineyardRating` (
  `User_ID` int(11) NOT NULL,
  `Wineyard_ID` int(11) NOT NULL,
  `Rating` int(2) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `WineyardRating`
--

INSERT INTO `WineyardRating` (`User_ID`, `Wineyard_ID`, `Rating`) VALUES
(1, 1, 10),
(1, 2, 5),
(1, 3, 9),
(1, 5, 5),
(2, 1, 5),
(2, 3, 7),
(2, 4, 5),
(4, 6, 5),
(4, 8, 5),
(4, 11, 5),
(5, 1, 9),
(5, 6, 5),
(7, 2, 5),
(7, 3, 5),
(7, 11, 5),
(8, 7, 5),
(8, 12, 5),
(9, 5, 5),
(9, 9, 5),
(9, 10, 5),
(10, 5, 5),
(10, 9, 5),
(11, 7, 5),
(12, 4, 5),
(12, 7, 5),
(13, 1, 5),
(13, 6, 5),
(13, 8, 5),
(19, 12, 5),
(20, 4, 5),
(20, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Wineyards`
--

CREATE TABLE `Wineyards` (
  `Wineyard_ID` int(11) NOT NULL,
  `Winery_ID` int(11) UNSIGNED NOT NULL,
  `Wineyard_Name` varchar(128) NOT NULL,
  `Winery_Name` varchar(250) NOT NULL,
  `Street_Address` varchar(128) NOT NULL,
  `Province` set('Eastern Cape','Free State','Gauteng','KwaZulu-Natal','Limpopo','Mpumalanga','Northern Cape','North West','Western Cape') NOT NULL,
  `Postal_Code` varchar(4) NOT NULL,
  `Area` varchar(128) NOT NULL,
  `Grape_Variety` varchar(128) NOT NULL,
  `Wineyard_URL` varchar(288) DEFAULT 'https://static.vecteezy.com/system/resources/previews/005/337/799/original/icon-image-not-found-free-vector.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Wineyards`
--

INSERT INTO `Wineyards` (`Wineyard_ID`, `Winery_ID`, `Wineyard_Name`, `Winery_Name`, `Street_Address`, `Province`, `Postal_Code`, `Area`, `Grape_Variety`, `Wineyard_URL`) VALUES
(1, 1, 'Chamonix Estate', 'Chamonix Estate', 'Uitkyk Street', 'Western Cape', '7690', 'Franschhoek', 'Red and White', 'https://www.chamonix.co.za/images/home/home_rotator_image06.jpg'),
(2, 2, 'Durbanville Hills Winery', 'Durbanville Hills Wine', 'Tygerberg Valley Rd, Cape Farms, Cape Town', 'Western Cape', '7550', 'Cape Town', 'Red and White', 'https://whichwinefarm.co.za/wp-content/uploads/2021/09/Durbanville-Hills-Aerial-View.jpeg'),
(3, 3, 'Klawer Wine', 'Klawer Wine Cellars', 'Birdfield Farm wine cellars, N7', 'Western Cape', '8145', 'Klawer', 'Red and White', 'https://images.wine.co.za/GetImage.ashx?IMAGEID=115305&ImageType=client_image&mode=GoogleCard'),
(4, 4, 'Kleine Zalze Wines', 'Kleine Zalze Wines', 'Strand Rd, De Zalze Golf Estate', 'Western Cape', '7600', 'Stellenbosch', 'Red and White', 'https://kleinezalze.co.za/wp-content/uploads/2021/05/Rest1_WebR.jpg'),
(5, 5, 'Koelenhof Wine Cellar (Koelenbosch)', 'Koelenhof Wine Cellar', 'Koelenhof Wine Cellar (Pty) Ltd, Koelenhof Wine Cellar, R304, Koelenhof, Stellenbosch', 'Western Cape', '7605', 'Koelenbosch', 'Red and White', 'https://images.wine.co.za/GetImage.ashx?ImageType=client_image&mode=social&IMAGEID=115193'),
(6, 5, 'Koelenhof Wine Cellar (Koelenhof)', 'Koelenhof Wine Cellar', 'Koelenhof Wine Cellar (Pty) Ltd, Koelenhof Wine Cellar, R304, Koelenhof, Stellenbosch', 'Western Cape', '7605', 'Koelenhof', 'Red and White', 'https://images.wine.co.za/GetImage.ashx?ImageType=client_image&mode=social&IMAGEID=115193'),
(7, 5, 'Koelenhof Wine Cellar (Stellenbosch)', 'Koelenhof Wine Cellar', 'Koelenhof Wine Cellar (Pty) Ltd, Koelenhof Wine Cellar, R304, Koelenhof, Stellenbosch', 'Western Cape', '7605', 'Stellenbosch', 'Red and White', 'https://images.wine.co.za/GetImage.ashx?ImageType=client_image&mode=social&IMAGEID=115193'),
(8, 6, 'La Motte', 'La Motte', 'La Motte Wine Estate (PTY) Ltd', 'Western Cape', '7690', 'Franschhoek', 'Red and White', 'https://velvetescape.com/wp-content/uploads/2018/07/IMG_2169-1280x920.jpg'),
(9, 11, 'Laborie Wines', 'Laborie Wines', 'Laborie Wine Estate', 'Western Cape', '7646', 'Paarl', 'Red and White', 'https://www.laborieestate.co.za/wp-content/uploads/2022/02/tMkM9fDg.jpg'),
(10, 7, 'Nederburg Wines', 'Nederburg Wines', 'Sonstraal Rd', 'Western Cape', '7646', 'Paarl', 'Red and White', 'https://insideguide.co.za/cape-town/app/uploads/2019/07/nederburg-wine-farm.jpg'),
(11, 7, 'Orange River Wines', 'Nederburg Wines', '32 Industria Street', 'Northern Cape', '8800', 'Upington', 'Red and White', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/a3/71/ec/tasting-centre-front.jpg?w=1200&h=-1&s=1'),
(12, 9, 'Perdeberg Wines', 'Perdeberg Wines', 'Vryguns Farm, Windmeul', 'Western Cape', '7630', 'Paarl', 'Red and White', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/22/07/3c/bb/perdeberg-cellar.jpg?w=1200&h=-1&s=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Award`
--
ALTER TABLE `Award`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Bottle`
--
ALTER TABLE `Bottle`
  ADD PRIMARY KEY (`Wine_Barrel_ID`),
  ADD UNIQUE KEY `Bottle_ID` (`Bottle_ID`);

--
-- Indexes for table `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`) USING BTREE,
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Brand_ID` (`Brand_ID`);

--
-- Indexes for table `Brand_Rating`
--
ALTER TABLE `Brand_Rating`
  ADD PRIMARY KEY (`Brand_ID`,`User_ID`),
  ADD KEY `fk_BrandRating_BrandName` (`Brand_Name`),
  ADD KEY `fk_BrandRating_User` (`User_ID`);

--
-- Indexes for table `Production`
--
ALTER TABLE `Production`
  ADD PRIMARY KEY (`Winery_Name`,`Brand_Name`),
  ADD KEY `fk_Production_Brand` (`Brand_Name`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Varietal`
--
ALTER TABLE `Varietal`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Varietal_Brand` (`Brand_Name`);

--
-- Indexes for table `WineBarrels`
--
ALTER TABLE `WineBarrels`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `WineRating`
--
ALTER TABLE `WineRating`
  ADD PRIMARY KEY (`User_ID`,`Bottle_ID`),
  ADD KEY `fk_WineRating_Bottle` (`Bottle_ID`);

--
-- Indexes for table `Winery`
--
ALTER TABLE `Winery`
  ADD PRIMARY KEY (`Winery_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `WineryRating`
--
ALTER TABLE `WineryRating`
  ADD PRIMARY KEY (`User_ID`,`Winery_ID`) USING BTREE,
  ADD KEY `fk_WineyardRating_Winery` (`Winery_ID`);

--
-- Indexes for table `WineyardRating`
--
ALTER TABLE `WineyardRating`
  ADD PRIMARY KEY (`User_ID`,`Wineyard_ID`),
  ADD KEY `fk_WineryID` (`Wineyard_ID`);

--
-- Indexes for table `Wineyards`
--
ALTER TABLE `Wineyards`
  ADD PRIMARY KEY (`Wineyard_ID`,`Winery_ID`),
  ADD UNIQUE KEY `Wineyard_ID` (`Wineyard_ID`),
  ADD UNIQUE KEY `Wineyard_Name` (`Wineyard_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Award`
--
ALTER TABLE `Award`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Bottle`
--
ALTER TABLE `Bottle`
  MODIFY `Bottle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `Brand`
--
ALTER TABLE `Brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `Varietal`
--
ALTER TABLE `Varietal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `WineBarrels`
--
ALTER TABLE `WineBarrels`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `Winery`
--
ALTER TABLE `Winery`
  MODIFY `Winery_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Wineyards`
--
ALTER TABLE `Wineyards`
  MODIFY `Wineyard_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bottle`
--
ALTER TABLE `Bottle`
  ADD CONSTRAINT `fk_Bottle_WineBarrels` FOREIGN KEY (`Wine_Barrel_ID`) REFERENCES `WineBarrels` (`ID`) ON UPDATE CASCADE;

--
-- Constraints for table `Brand_Rating`
--
ALTER TABLE `Brand_Rating`
  ADD CONSTRAINT `fk_BrandRating_Brand` FOREIGN KEY (`Brand_ID`) REFERENCES `Brand` (`Brand_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_BrandRating_BrandName` FOREIGN KEY (`Brand_Name`) REFERENCES `Brand` (`Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_BrandRating_User` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `Production`
--
ALTER TABLE `Production`
  ADD CONSTRAINT `fk_Production_Brand` FOREIGN KEY (`Brand_Name`) REFERENCES `Brand` (`Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Production_Winery` FOREIGN KEY (`Winery_Name`) REFERENCES `Winery` (`Name`) ON UPDATE CASCADE;

--
-- Constraints for table `Varietal`
--
ALTER TABLE `Varietal`
  ADD CONSTRAINT `fk_Varietal_Brand` FOREIGN KEY (`Brand_Name`) REFERENCES `Brand` (`Name`) ON UPDATE CASCADE;

--
-- Constraints for table `WineRating`
--
ALTER TABLE `WineRating`
  ADD CONSTRAINT `fk_WineRating_Bottle` FOREIGN KEY (`Bottle_ID`) REFERENCES `Bottle` (`Bottle_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_WineRating_User` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `Winery`
--
ALTER TABLE `Winery`
  ADD CONSTRAINT `fk_Winery_Brand` FOREIGN KEY (`Brand_Name`) REFERENCES `Brand` (`Name`) ON UPDATE CASCADE;

--
-- Constraints for table `WineryRating`
--
ALTER TABLE `WineryRating`
  ADD CONSTRAINT `fk_WineyRating_User` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_WineyardRating_Winery` FOREIGN KEY (`Winery_ID`) REFERENCES `Winery` (`Winery_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `WineyardRating`
--
ALTER TABLE `WineyardRating`
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_WineryID` FOREIGN KEY (`Wineyard_ID`) REFERENCES `Wineyards` (`Wineyard_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Wineyards`
--
ALTER TABLE `Wineyards`
  ADD CONSTRAINT `WineryNameConstraint` FOREIGN KEY (`Winery_Name`) REFERENCES `Winery` (`Name`),
  ADD CONSTRAINT `fk_Wineyard_Winery` FOREIGN KEY (`Winery_Name`) REFERENCES `Winery` (`Name`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
