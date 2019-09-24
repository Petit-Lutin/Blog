-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 11 sep. 2019 à 09:12
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p4-blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

-- DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
PRIMARY KEY (`id`),
 FOREIGN KEY (post_id) REFERENCES posts(id)

) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'bob', 'lol', '2019-07-29 12:00:00', ''),
(2, 1, 'bob 2', 'seriously ?', '2019-07-29 17:00:00', ''),
(3, 1, 'bob', 'lol', '2019-07-29 12:00:00', ''),
(4, 1, 'bob 2', 'seriously ?', '2019-07-29 17:00:00', ''),
(5, 2, 'ff', 'ff', '2019-07-29 11:46:59', ''),
(6, 7, 'sdsd', 'sdsdsd', '2019-09-09 10:38:37', ''),
(7, 7, 'sdsf', 'sdfsdfffff', '2019-09-09 10:39:18', ''),
(8, 10, 'john', 'test commentaire', '2019-09-11 09:48:56', '');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

--DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `reports` (
  `comment_id` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,

  PRIMARY KEY (`comment_id`,`user_ip`),
  FOREIGN KEY (comment_id) REFERENCES comments(id)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'essai 1', 'youhouuuu', '2019-07-29 09:00:00'),
(2, 'article 2', 'on ne m\'arrête plu !', '2019-07-30 11:00:00'),
(3, 'blabla', 'contenublabla', '2019-08-21 11:22:52'),
(4, 'blabla2', 'blabla2', '2019-08-21 11:39:49'),
(5, 'utilisation de tinymce', '<h1>youhouuuu !!!</h1>\r\n<p><strong>TinyMCE est int&eacute;gr&eacute; aux posts !</strong></p>', '2019-08-21 14:11:16'),
(6, 'article 6', '<p class=\"paragraph ng-attr-widget\" style=\"text-align: center;\"><span class=\"ng-directive ng-binding\"><span style=\"color: #3598db;\">Cupcake ipsum dolor sit amet bonbon cake drag&eacute;e. Caramels topping muffin chocolate bar croissant chocolate bar powder. Gummies chocolate candy canes cupcake sweet topping topping. Candy canes chupa chups tiram</span>isu candy canes chocolate wafer gummi bears. Wafer marzipan sesame snaps gummi bears gummies sweet souffl&eacute;. Gummies chupa chups bonbon candy canes chocolate. Cookie sugar plum chocolate cake tootsie roll cupcake marzipan danish cake caramels. Chocolate macaroon topping jelly-o. Gummies candy wafer marshmallow bonbon muffin marzipan. Tiramisu tart chupa chups cupcake marshmallow icing cake. Muffin cookie pudding candy jelly-o. Sesame snaps halvah sesame snaps brownie caramels candy jelly beans candy. Chocolate dessert bonbon cake ice cream dessert biscuit jujubes.</span></p>\r\n<p class=\"paragraph ng-attr-widget\"><span class=\"ng-directive ng-binding\">Muffin muffin liquorice tootsie roll chocolate bar donut drag&eacute;e chocolate cake candy canes. Topping ice cream pie. Marzipan gingerbread gummi bears. Tootsie roll marshmallow lollipop. Sweet roll chupa chups bonbon ice cream sesame snaps gummi bears lemon drops candy gingerbread. Pie cookie powder. Chupa chups liquorice donut sesame snaps. Wafer souffl&eacute; ice cream cake. Powder topping apple pie. Candy canes lemon drops pie. Chocolate bar sugar plum cupcake. Cookie caramels liquorice lollipop muffin macaroon.</span></p>\r\n<p class=\"paragraph ng-attr-widget\" style=\"text-align: right;\"><span class=\"ng-directive ng-binding\" style=\"font-family: \'trebuchet ms\', geneva, sans-serif; color: #b96ad9;\">Topping lollipop cheesecake jelly beans sugar plum cookie danish. Fruitcake fruitcake danish chocolate cake carrot cake wafer candy topping. Chocolate cake pie cheesecake topping gummies marzipan ice cream. Pudding pudding chocolate bar icing gummi bears marzipan sweet pie. Cupcake bonbon drag&eacute;e donut sweet roll. Cake sugar plum powder fruitcake bonbon macaroon cake liquorice. Biscuit sesame snaps pastry wafer. Powder powder chocolate drag&eacute;e gummi bears pastry. Bear claw lemon drops pastry cake halvah pie. Powder jujubes halvah. Sugar plum sesame snaps oat cake ice cream wafer jelly-o chupa chups. Sweet roll icing caramels chocolate cake cheesecake cookie pie pastry. Donut gummi bears muffin jujubes tiramisu. Croissant lollipop brownie halvah jelly-o brownie.</span></p>', '2019-08-21 14:21:24'),
(7, 'article 666', '<p class=\"paragraph ng-attr-widget\" style=\"text-align: center;\"><span class=\"ng-directive ng-binding\">Cupcake ipsum dolor sit amet bonbon cake drag&eacute;e. <span style=\"color: #e03e2d;\"><strong>Caramels</strong></span> topping muffin chocolate bar croissant chocolate bar powder. Gummies chocolate candy canes cupcake sweet topping topping. Candy canes chupa chups tiramisu candy canes chocolate wafer gummi bears. Wafer marzipan sesame snaps gummi bears gummies sweet souffl&eacute;. Gummies chupa chups bonbon candy canes chocolate. Cookie sugar plum chocolate cake tootsie roll cupcake marzipan danish cake caramels. Chocolate macaroon topping jelly-o. Gummies candy wafer marshmallow bonbon muffin marzipan. Tiramisu tart chupa chups cupcake marshmallow icing cake. Muffin cookie pudding candy jelly-o. Sesame snaps halvah sesame snaps brownie caramels candy jelly beans candy. Chocolate dessert bonbon cake ice cream dessert biscuit jujubes.</span></p>\r\n<p class=\"paragraph ng-attr-widget\"><span class=\"ng-directive ng-binding\">Muffin muffin liquorice tootsie roll chocolate bar donut drag&eacute;e chocolate cake candy canes. Topping ice cream pie. Marzipan gingerbread gummi bears. Tootsie roll marshmallow lollipop. Sweet roll chupa chups bonbon ice cream sesame snaps gummi bears lemon drops candy gingerbread. Pie cookie powder. Chupa chups liquorice donut sesame snaps. Wafer souffl&eacute; ice cream cake. Powder topping apple pie. Candy canes lemon drops pie. Chocolate bar sugar plum cupcake. Cookie caramels liquorice lollipop muffin macaroon.</span></p>\r\n<p class=\"paragraph ng-attr-widget\" style=\"text-align: right;\"><span class=\"ng-directive ng-binding\" style=\"font-family: \'trebuchet ms\', geneva, sans-serif; color: #b96ad9;\">Topping lollipop cheesecake jelly beans sugar plum cookie danish. Fruitcake fruitcake danish chocolate cake carrot cake wafer candy topping. Chocolate cake pie cheesecake topping gummies marzipan ice cream. Pudding pudding chocolate bar icing gummi bears marzipan sweet pie. Cupcake bonbon drag&eacute;e donut sweet roll. Cake sugar plum powder fruitcake bonbon macaroon cake liquorice. Biscuit sesame snaps pastry wafer. Powder powder chocolate drag&eacute;e gummi bears pastry. Bear claw lemon drops pastry cake halvah pie. Powder jujubes halvah. Sugar plum sesame snaps oat cake ice cream wafer jelly-o chupa chups. Sweet roll icing caramels chocolate cake cheesecake cookie pie pastry. Donut gummi bears muffin jujubes tiramisu. Croissant lollipop brownie halvah jelly-o brownie.</span></p>', '2019-08-21 15:33:26'),
(8, 'article 666', '<p class=\"paragraph ng-attr-widget\" style=\"text-align: center;\"><span class=\"ng-directive ng-binding\">Cupcake ipsum dolor sit amet bonbon cake drag&eacute;e. <span style=\"color: #e03e2d; background-color: #ffffff;\"><strong>Caramels</strong></span> topping muffin chocolate bar croissant chocolate bar powder. Gummies chocolate candy canes cupcake sweet topping topping. Candy canes chupa chups tiramisu candy canes chocolate wafer gummi bears. Wafer marzipan sesame snaps gummi bears gummies sweet souffl&eacute;. Gummies chupa chups bonbon candy canes chocolate. Cookie sugar plum chocolate cake tootsie roll cupcake marzipan danish cake caramels. Chocolate macaroon topping jelly-o. Gummies candy wafer marshmallow bonbon muffin marzipan. Tiramisu tart chupa chups cupcake marshmallow icing cake. Muffin cookie pudding candy jelly-o. Sesame snaps halvah sesame snaps brownie caramels candy jelly beans candy. Chocolate dessert bonbon cake ice cream dessert biscuit jujubes.</span></p>\r\n<p class=\"paragraph ng-attr-widget\"><span class=\"ng-directive ng-binding\">Muffin muffin liquorice tootsie roll chocolate bar donut drag&eacute;e chocolate cake candy canes. Topping ice cream pie. Marzipan gingerbread gummi bears. Tootsie roll marshmallow lollipop. Sweet roll chupa chups bonbon ice cream sesame snaps gummi bears lemon drops candy gingerbread. Pie cookie powder. Chupa chups liquorice donut sesame snaps. Wafer souffl&eacute; ice cream cake. Powder topping apple pie. Candy canes lemon drops pie. Chocolate bar sugar plum cupcake. Cookie caramels liquorice lollipop muffin macaroon.</span></p>\r\n<p class=\"paragraph ng-attr-widget\" style=\"text-align: right;\"><span class=\"ng-directive ng-binding\" style=\"font-family: \'trebuchet ms\', geneva, sans-serif; color: #b96ad9;\">Topping lollipop cheesecake jelly beans sugar plum cookie danish. Fruitcake fruitcake danish chocolate cake carrot cake wafer candy topping. Chocolate cake pie cheesecake topping gummies marzipan ice cream. Pudding pudding chocolate bar icing gummi bears marzipan sweet pie. Cupcake bonbon drag&eacute;e donut sweet roll. Cake sugar plum powder fruitcake bonbon macaroon cake liquorice. Biscuit sesame snaps pastry wafer. Powder powder chocolate drag&eacute;e gummi bears pastry. Bear claw lemon drops pastry cake halvah pie. Powder jujubes halvah. Sugar plum sesame snaps oat cake ice cream wafer jelly-o chupa chups. Sweet roll icing caramels chocolate cake cheesecake cookie pie pastry. Donut gummi bears muffin jujubes tiramisu. Croissant lollipop brownie halvah jelly-o brownie.</span></p>', '2019-08-21 15:33:56'),
(9, 'you', '<p>lorem ipsum</p>', '2019-08-21 15:41:37'),
(10, 'oh oh oh', '<p>c\'est le P&egrave;re No&euml;l</p>', '2019-08-22 11:49:43');



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

