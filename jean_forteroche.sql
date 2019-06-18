-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 18 juin 2019 à 09:56
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jean forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approuve` int(11) DEFAULT NULL,
  `supprimer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `approuve`, `supprimer`) VALUES
(26, 4, 'emilie', 'Pas mal pour un début.', '2019-06-16 14:07:29', 1, NULL),
(27, 4, 'benou', 'bien le bonjour.', '2019-06-17 09:56:13', NULL, NULL),
(23, 5, 'jean', 'coucou !', '2019-06-16 11:51:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(2, 'Né sur l\'île d\'Adak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a laoreet ipsum, at interdum risus. Proin ut ipsum ex. Aliquam erat volutpat. Aenean augue ipsum, gravida quis euismod quis, laoreet et mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent mollis, eros sed pharetra tincidunt, nisl justo aliquet nulla, vitae feugiat leo elit in tortor. Duis elementum sem dictum diam congue ullamcorper. Sed suscipit ac quam sit amet aliquet. Etiam tellus dolor, pharetra eget libero eu, interdum tristique velit. Duis elementum varius diam, rutrum fringilla enim scelerisque in.\r\n\r\nNulla facilisi. Cras ac eros erat. In vitae nisl justo. Mauris egestas tincidunt egestas. Donec nec quam feugiat, posuere dui ut, euismod tellus. Curabitur ut mauris id erat placerat blandit. Etiam vitae libero nibh. Sed ut porttitor est, in vulputate elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Proin varius nec urna sed feugiat. Aenean iaculis laoreet tincidunt. Vivamus id nisi erat. Aliquam a placerat dolor.\r\n\r\nSuspendisse feugiat fringilla leo, sed porttitor dolor scelerisque porta. Donec ac finibus leo. Nulla mattis egestas est, et dapibus leo iaculis ut. Sed rutrum eros eros, eget mattis ex gravida non. Mauris molestie lorem sed ex venenatis dictum. Mauris a ullamcorper nulla, eget iaculis dui. Praesent imperdiet erat tellus, vitae faucibus metus consectetur ac. Donec egestas, mi vel lobortis laoreet, enim nulla tristique purus, ac vestibulum purus neque ac nisi. Maecenas eu velit urna. Proin eget eros eget nisi consectetur gravida nec sit amet augue.\r\n\r\nUt nec velit placerat, aliquet dolor vitae, lacinia ligula. Etiam pretium vel risus sit amet scelerisque. Donec ullamcorper posuere vulputate. Vivamus turpis lectus, aliquet id nisi at, elementum efficitur elit. In felis neque, consectetur eu blandit vel, mollis a arcu. Proin lacinia metus in rhoncus mollis. Sed aliquam libero sit amet nibh pellentesque tempor. Nunc vehicula diam vel arcu imperdiet, pulvinar faucibus dui luctus.\r\n\r\nFusce massa justo, gravida ac sollicitudin ac, iaculis et tortor. Praesent in cursus massa. Proin elementum erat vel ante pharetra, nec suscipit elit scelerisque. Nulla in risus ac nulla rutrum ornare eget id libero. Fusce pulvinar, sem nec sagittis tristique, eros erat placerat tortor, vulputate sollicitudin augue lectus id lacus. Donec semper tortor eget volutpat laoreet. Pellentesque auctor, justo ac dapibus sollicitudin, libero nibh iaculis odio, id interdum urna mauris in dui. Duis aliquam scelerisque suscipit. Vivamus eget nisl justo. Nunc vestibulum lacus ac faucibus aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi vitae molestie risus, nec maximus purus. Nam dignissim fringilla hendrerit. Morbi dignissim purus vitae aliquet ornare. In laoreet justo diam, nec tristique turpis gravida ut.', '2019-05-05 17:15:50'),
(16, 'test', 'test', '2019-06-17 19:51:03'),
(15, 'blablab', 'dbzdbzkdzd', '2019-06-17 19:50:16'),
(8, 'test 2', 'test 2', '2019-06-17 18:06:47'),
(14, 'test 23', 'cefefef', '2019-06-17 19:47:57'),
(13, 'feefe', '', '2019-06-17 18:42:21'),
(11, 'hello bud', 'bud budb bud', '2019-06-17 18:14:34'),
(12, 'bcbcbcb', 'bbcbcbcb', '2019-06-17 18:15:19'),
(17, 'dzd', 'dzdz', '2019-06-17 19:51:23'),
(18, 'dzdzd', 'dzdzd', '2019-06-18 11:22:41'),
(4, 'Mouton de panurge', 'Elle n\'a pas encore de plumes\r\nLa flèche qui doit percer son flanc\r\nEt dans son cœur rien ne s\'allume\r\nQuand elle cède à ses galants\r\nElle se rit bien des gondoles\r\nDes fleurs bleues, des galants discours\r\nDes Vénus de la vieille école\r\nCelles qui font l\'amour par amour\r\n\r\nN\'allez pas croire davantage\r\nQue le démon brûle son corps\r\nIl s\'arrête au premier étage\r\nSon septième ciel, et encore\r\nElle n\'est jamais langoureuse\r\nPassée par le pont des soupirs\r\nEt voit comme des bêtes curieuses\r\nCelles qui font l\'amour par plaisir\r\n\r\nCroyez pas qu\'elle soit à vendre\r\nQuand on l\'a mise sur le dos\r\nOn n\'est pas tenu de se fendre\r\nD\'un somptueux petit cadeau\r\nAvant d\'aller en bacchanale\r\nElle présente pas un devis\r\nElle n\'a rien de ces belles vénales\r\nCelles qui font l\'amour par profit', '2019-05-22 17:02:53'),
(5, 'Il suffit de passer le pont ', 'Il suffit de passer le pont,\r\nC\'est tout de suite l\'aventure!\r\nLaisse-moi tenir ton jupon,\r\nJ\'t\'emmèn\' visiter la nature!\r\nL\'herbe est douce à Pâques fleuri\'s...\r\nJetons mes sabots, tes galoches,\r\nEt, légers comme des cabris,\r\nCourons après les sons de cloches!\r\nDin din don! les matines sonnent\r\nEn l\'honneur de notre bonheur,\r\nDing ding dong! faut l\'dire à personne:\r\nJ\'ai graissé la patte au sonneur.\r\n\r\nLaisse-moi tenir ton jupon,\r\nCourons, guilleret, guillerette,\r\nIl suffit de passer le pont,\r\nEt c\'est le royaum\' des fleurettes...\r\nEntre tout\'s les bell\'s que voici,\r\nJe devin\' cell\' que tu préfères...\r\nC\'est pas l\'coqu\'licot, Dieu merci!\r\nNi l\'coucou, mais la primevère.\r\nJ\'en vois un\' blotti\' sous les feuilles,\r\nElle est en velours comm\' tes jou\'s.\r\nFais le guet pendant qu\'je la cueille:\r\n\"Je n\'ai jamais aimé que vous!\"\r\n\r\nIl suffit de trois petits bonds,\r\nC\'est tout de suit\' la tarantelle,\r\nLaisse-moi tenir ton jupon,\r\nJ\'saurai ménager tes dentelles...\r\nJ\'ai graissé la patte au berger\r\nPour lui fair\' jouer une aubade.\r\nLors, ma mi\', sans croire au danger,\r\nFaisons mille et une gambades,\r\nTon pied frappe et frappe la mousse...\r\nSi l\'chardon s\'y pique dedans,\r\nNe pleure pas, ma mi\' qui souffre:\r\nJe te l\'enlève avec les dents!', '2019-05-22 17:02:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
