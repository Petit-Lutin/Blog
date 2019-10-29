-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 oct. 2019 à 10:44
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
-- Base de données :  `p4-test`
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
    FOREIGN KEY (post_id)
      REFERENCES posts(id)
      ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(3, 1, 'bob', 'lol', '2019-07-29 12:00:00'),
(4, 1, 'bob 2', 'seriously ?', '2019-07-29 17:00:00'),
(5, 2, 'ff', 'ff', '2019-07-29 11:46:59');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `slug`) VALUES
(1, 'Introduction', '<p>Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa consarcinando a veritate longe discreta. unde admissum est facinus impium, quod Constanti tempus nota inusserat sempiterna.</p>', '2019-07-29 09:00:00', 'first'),
(2, 'Prologue', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2019-07-30 11:00:00', 'article-2'),
(3, 'Chapitre 1 : titre du chapitre', '<p>contenublabla</p>', '2019-08-21 11:22:52', 'chapitre-1'),
(4, 'Chapitre 2 : titre du chapitre', '<p>blabla2</p>', '2019-08-21 11:39:49', 'chapitre-2'),
(5, 'Chapitre 3 : titre du chapitre', '<h1>Pan !</h1>\r\n<p>Que va-t-il arriver &agrave; notre h&eacute;ros ?</p>', '2019-08-21 14:11:16', 'chapitre-3'),
(6, 'Chapitre 4 : titre du chapitre', '<p class=\"paragraph ng-attr-widget\" style=\"text-align: center;\"><span class=\"ng-directive ng-binding\"><span style=\"color: #3598db;\">Cupcake ipsum dolor sit amet bonbon cake drag&eacute;e. Caramels topping muffin chocolate bar croissant chocolate bar powder. Gummies chocolate candy canes cupcake sweet topping topping. Candy canes chupa chups tiram</span>isu candy canes chocolate wafer gummi bears. Wafer marzipan sesame snaps gummi bears gummies sweet souffl&eacute;. Gummies chupa chups bonbon candy canes chocolate. Cookie sugar plum chocolate cake tootsie roll cupcake marzipan danish cake caramels. Chocolate macaroon topping jelly-o. Gummies candy wafer marshmallow bonbon muffin marzipan. Tiramisu tart chupa chups cupcake marshmallow icing cake. Muffin cookie pudding candy jelly-o. Sesame snaps halvah sesame snaps brownie caramels candy jelly beans candy. Chocolate dessert bonbon cake ice cream dessert biscuit jujubes.</span></p>\r\n<p class=\"paragraph ng-attr-widget\"><span class=\"ng-directive ng-binding\">Muffin muffin liquorice tootsie roll chocolate bar donut drag&eacute;e chocolate cake candy canes. Topping ice cream pie. Marzipan gingerbread gummi bears. Tootsie roll marshmallow lollipop. Sweet roll chupa chups bonbon ice cream sesame snaps gummi bears lemon drops candy gingerbread. Pie cookie powder. Chupa chups liquorice donut sesame snaps. Wafer souffl&eacute; ice cream cake. Powder topping apple pie. Candy canes lemon drops pie. Chocolate bar sugar plum cupcake. Cookie caramels liquorice lollipop muffin macaroon.</span></p>\r\n<p class=\"paragraph ng-attr-widget\" style=\"text-align: right;\"><span class=\"ng-directive ng-binding\" style=\"font-family: \'trebuchet ms\', geneva, sans-serif; color: #b96ad9;\">Topping lollipop cheesecake jelly beans sugar plum cookie danish. Fruitcake fruitcake danish chocolate cake carrot cake wafer candy topping. Chocolate cake pie cheesecake topping gummies marzipan ice cream. Pudding pudding chocolate bar icing gummi bears marzipan sweet pie. Cupcake bonbon drag&eacute;e donut sweet roll. Cake sugar plum powder fruitcake bonbon macaroon cake liquorice. Biscuit sesame snaps pastry wafer. Powder powder chocolate drag&eacute;e gummi bears pastry. Bear claw lemon drops pastry cake halvah pie. Powder jujubes halvah. Sugar plum sesame snaps oat cake ice cream wafer jelly-o chupa chups. Sweet roll icing caramels chocolate cake cheesecake cookie pie pastry. Donut gummi bears muffin jujubes tiramisu. Croissant lollipop brownie halvah jelly-o brownie.</span></p>', '2019-08-21 14:21:24', 'chapitre-4'),
(8, 'Chapitre 6 : titre du chapitre', '<p class=\"paragraph ng-attr-widget\" style=\"text-align: center;\"><span class=\"ng-directive ng-binding\">Cupcake ipsum dolor sit amet bonbon cake drag&eacute;e. <span style=\"color: #e03e2d; background-color: #ffffff;\"><strong>Caramels</strong></span> topping muffin chocolate bar croissant chocolate bar powder. Gummies chocolate candy canes cupcake sweet topping topping. Candy canes chupa chups tiramisu candy canes chocolate wafer gummi bears. Wafer marzipan sesame snaps gummi bears gummies sweet souffl&eacute;. Gummies chupa chups bonbon candy canes chocolate. Cookie sugar plum chocolate cake tootsie roll cupcake marzipan danish cake caramels. Chocolate macaroon topping jelly-o. Gummies candy wafer marshmallow bonbon muffin marzipan. Tiramisu tart chupa chups cupcake marshmallow icing cake. Muffin cookie pudding candy jelly-o. Sesame snaps halvah sesame snaps brownie caramels candy jelly beans candy. Chocolate dessert bonbon cake ice cream dessert biscuit jujubes.</span></p>\r\n<p class=\"paragraph ng-attr-widget\"><span class=\"ng-directive ng-binding\">Muffin muffin liquorice tootsie roll chocolate bar donut drag&eacute;e chocolate cake candy canes. Topping ice cream pie. Marzipan gingerbread gummi bears. Tootsie roll marshmallow lollipop. Sweet roll chupa chups bonbon ice cream sesame snaps gummi bears lemon drops candy gingerbread. Pie cookie powder. Chupa chups liquorice donut sesame snaps. Wafer souffl&eacute; ice cream cake. Powder topping apple pie. Candy canes lemon drops pie. Chocolate bar sugar plum cupcake. Cookie caramels liquorice lollipop muffin macaroon.</span></p>\r\n<p class=\"paragraph ng-attr-widget\" style=\"text-align: right;\"><span class=\"ng-directive ng-binding\" style=\"font-family: \'trebuchet ms\', geneva, sans-serif; color: #b96ad9;\">Topping lollipop cheesecake jelly beans sugar plum cookie danish. Fruitcake fruitcake danish chocolate cake carrot cake wafer candy topping. Chocolate cake pie cheesecake topping gummies marzipan ice cream. Pudding pudding chocolate bar icing gummi bears marzipan sweet pie. Cupcake bonbon drag&eacute;e donut sweet roll. Cake sugar plum powder fruitcake bonbon macaroon cake liquorice. Biscuit sesame snaps pastry wafer. Powder powder chocolate drag&eacute;e gummi bears pastry. Bear claw lemon drops pastry cake halvah pie. Powder jujubes halvah. Sugar plum sesame snaps oat cake ice cream wafer jelly-o chupa chups. Sweet roll icing caramels chocolate cake cheesecake cookie pie pastry. Donut gummi bears muffin jujubes tiramisu. Croissant lollipop brownie halvah jelly-o brownie.</span></p>', '2019-08-21 15:33:56', 'chapitre-6');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `comment_id` int(11) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`comment_id`,`user_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`comment_id`, `user_ip`) VALUES
(6, '::1'),
(8, '::1'),
(9, '::1'),
(10, '::1'),
(11, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`pseudo`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pseudo`, `password`, `email`, `role`) VALUES
('admin', '$2y$10$0cFaLeU3f9TtWd8Fm9MWBufPW/umfA8CF.kjBxm6Ie3s7.8ShzLZK', 'admin@email.fr', 'superutilisateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
