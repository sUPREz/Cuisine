-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 21 Novembre 2012 à 00:04
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text CHARACTER SET utf8,
  `instructions` text CHARACTER SET utf8,
  `ingredients` text CHARACTER SET utf8,
  `notes` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `instructions`, `ingredients`, `notes`) VALUES
(1, 'Nems', '* Faire cuire la viande\n* Hacher la viande puis la mettre de c&ocirc;t&eacute;\n* R&acirc;per les carottes\n* Cuire les champignons puis les hacher grossi&egrave;rement\n* Cuire les vermicelles puis bien les couper\n* M&eacute;langer la viande, les carottes, les champignons, les vermicelles et le jus de citron\n* Rouler les nems et coller les bords avec de l''eau ou de l''&oelig;uf\n* Faire frire les nems 5 minutes dans l''huile\n* Mettre les nems sur du sopalin\n* Garder les nems chaud au four &agrave; 80&deg;c avant de les apporter &agrave; table\n* C''est pr&ecirc;t !!', '48 Nems\n* 600g de viande\n* 100g de carotte\n* 25g de champignons noirs\n* 50g de vermicelle de soja\n* 1 Citron\n* 48 feuilles de brick', '* C''est d&eacute;licieux !\n* Marche avec Surimi, c&ocirc;te de porc, filet de dinde.'),
(23, 'Cr&ecirc;pes', '* Mettre la farine dans un r&eacute;cipient et faire un puits\n* Casser les oeufs dans le puits\n* Ajouter le sel et l''huile\n* Ajouter un peu de lait\n* M&eacute;langer vigoureusement avec un fouet\n* M&eacute;langer le reste du lait', '* 500g de farine\n* 4 oeufs\n* 1L de lait\n* 2 c.&agrave;.s d''huile\n* 1 pinc&eacute;e de sel', 'Sucr&eacute;es / sal&eacute;es c''est toujours bon !!!!!!'),
(24, 'Sauce Rag&ugrave;', '* Hacher les oignons et les carottes.\n* Cuire les l&eacute;gumes 10mn dans l''huile et le beurre.\n* Ajouter toute la viande et laisse cuire 4 &agrave; 5mn.\n* Ajouter le vin blanc.\n* Laisser &eacute;vaporer.\n* Ajouter les champignons &eacute;minc&eacute;s, les tomates et l''assaisonnement..\n* Faire fondre le bouillon cube dans 1L d''eau.\n* Mouiller r&eacute;guli&egrave;rement avec le bouillon.\n* Laisser cuire longtemps, plus c''est cuit, mieux c''est.\n', '* 1 oignon\n* 1 carotte\n* 500g viande hach&eacute;e\n* 500g chair &agrave; saucisse\n* 100g lardons\n* 1 verre de vin blanc\n* 1 &quot;poign&eacute;e&quot; de champignons\n* 1 boite de tomate pel&eacute;e\n* 1 cube de bouillon\n* Origan\n* Thym\n* Sel / Poivre\n* 100g Beurre\n* Huile d''olive', 'Pour un peu + de tomate, on peut aussi rajouter un pot de concentr&eacute; de tomate en m&ecirc;me temps que l''assaisonnement.\n\nRecette &agrave; base de sauce rag&ugrave; :\n* [[Lasagnes Bolognaises]]'),
(25, 'Quiche', '* D&eacute;rouler la p&acirc;te dans un plat.\n* Mettre les lardons sur la p&acirc;te.\n* Mixer les oeufs, la cr&egrave;me et l''assaisonnement.\n* Verser le m&eacute;lange sur les lardons.\n* Recouvrir de gruy&egrave;re.\n* Cuire 15-20mn &agrave; 200&deg;c.\n', '* 1 p&acirc;te feuillet&eacute;e\n* 1 paquet de lardons\n* 4 &agrave; 6 oeufs\n* 2 pot de cr&egrave;me\n* Gruy&egrave;re rap&eacute;\n* Sel / Poivre', NULL),
(26, 'Cr&egrave;me au chocolat', '* Mettre dans une casserole le sel, le sucre, le sucre vanill&eacute;, le chocolat et les 9/10e du lait.\n* Faire bouillir en tournant en 8.\n* Dissoudre la farine dans un bol avec le reste du lait froid.\n* Verser le m&eacute;lange froid dans la casserole.\n* Faire bouillir pendant 10-15 minutes en touillant.\n* Verser dans un saladier.\n* R&eacute;server au frais pendant quelques heures.', '* 70g de sucre\n* 1L de lait\n* 50g de farine ou 3 c.&agrave;.s de ma&iuml;zena\n* 20g de beurre\n* 2 sachets de sucre vanill&eacute;\n* Sel', NULL),
(27, 'Gourmandine au chocolat', '* S&eacute;parer les blancs des jaunes d''oeuf.\n* Ajouter le sucre aux jaunes.\n* Ajouter la farine.\n* Faire fondre le chocolat avec le beurre.\n* M&eacute;langer le chocolat &agrave; la pr&eacute;paration.\n* Monter les blancs avec le sel.\n* Incorporer les blancs au reste.\n* Mettre au four 15-20mn &agrave; 200&deg;c.', '* 250g de chocolat\n* 100g de beurre\n* 100g de sucre\n* 4 oeufs\n* 2c.&agrave;.s de farine\n* 1 pinc&eacute;e de sel', 'C''est encore meilleur en muffin !'),
(28, 'Cookies', '* M&eacute;langer le sucre et le beurre &agrave; la main.\n* Ajouter l''oeuf et la farine.\n* M&eacute;langer le reste.\n* Faire des petites boules sur une plaque.\n* Mettre au four 15mn &agrave; 160&deg;c.', '* 100g de beurre\n* 250g de sucre \n* 150g de farine\n* 120g de p&eacute;pites de chocolat\n* 1 c.&agrave;.c de vanille\n* 1 c.&agrave;.c de sel\n* 1 sachet de levure chimique\n* 1 oeuf', NULL),
(29, 'Cookies [2]', '* M&eacute;langer le beurre, le sucre, l''oeuf et la vanille.\n* Ajouter petit &agrave; petit la farine, la levure et le sel.\n* Ajouter les p&eacute;pites.\n* Faire des petites boules sur une plaque.\nMettre au four &agrave; 180&deg;c pendant 10mn.', '* 75g de beurre\n* 1 oeuf\n* 85g de sucre\n* 150g de farine\n* 100g de p&eacute;pite de chocolat\n* 1 sachet de sucre vanill&eacute;\n* 1 sachet de levure \n* 1 pinc&eacute;e de sel', NULL),
(30, 'G&acirc;teau au yaourt', '* Tout verser dans un saladier.\n* Beurrer le moule et y verser la p&acirc;te.\n* Mettre au four 15mn &agrave; 200&deg;c.', '* 1 yaourt\n* 1/2 pot d''huile\n* 2 pots de sucre\n* 3 pots de farine\n* 3 oeufs\n* 1 pinc&eacute;e de sel\n* 1 sachet de levure\n* 1 sachet de sucre vanill&eacute;', 'C''est meilleur dans un moule &agrave; baba.\nD&eacute;licieux en muffins !!'),
(31, 'Gaufres', '* Verser la farine et creuser un puits.\n* Verser le sucre, le sel, le beurre fondu et les jaunes d''oeuf dans le puits.\n* Bien m&eacute;langer au fouet\n* Verser progressivement le lait.\n* Monter les blancs en neige et les incorporer au m&eacute;lange.', '* 500g de farine\n* 150g de beurre\n* 6 oeufs\n* 50g de sucre\n* 1 pinc&eacute;e de sel\n* 3/4L de lait', NULL),
(32, 'Meringues', '* Monter les blanc en neige.\n* Int&eacute;grer le sucre petit &agrave; petit.\n* Poser des &quot;morceaux&quot; sur une plaque.\n* Mettre au four 1h30/2h &agrave; 120&deg;c.', '* X blancs d''oeufs\n* 50g de sucre par blanc', NULL),
(33, 'Galette des rois', 'La recette se d&eacute;roule en 3 &eacute;tapes.\n\nh4. Cr&egrave;me p&acirc;tissi&egrave;re \n\n* Faire bouillir le lait.\n* Fouetter le jaune d''oeuf avec le sucre et ajouter la farine.\n* Verser le lait sur la m&eacute;lange puis remettre sur le feu.\n* Remuer en laissant la cr&egrave;me s''&eacute;paissir.\n \n \nh4. Cr&egrave;me d''amende\n\n* M&eacute;langer le beurre avec le sucre.\n* Incorporer l''oeuf puis les amendes.\n* Ajouter la cr&egrave;me p&acirc;tissi&egrave;re au m&eacute;lange.\n* R&eacute;server au frigo.\n \n \nh4. Montage\n\n* D&eacute;rouler la premi&egrave;re p&acirc;te.\n* &Eacute;taler la cr&egrave;me d''amende et y cacher la f&egrave;ve.\n* poser la seconde p&acirc;te et coller les bords avec un peu de blanc d''oeuf.\n* Dorer le dessus avec du jaune d''oeuf.\n* Dessiner des motifs avec la pointe d''un couteau.\n* Mettre au four pendant 25-30mn &agrave; 180&deg;c.', '* 2 p&acirc;tes feuillet&eacute;es\n* 1 oeuf\n \nh4. Cr&egrave;me patissi&egrave;re :\n\n* 125ml de lait\n* 20g de sucre\n* 1 jaune d''oeuf\n* 15g de farine\n\nh4. Cr&egrave;me d''amende :\n\n* 50g de beurre\n* 100g d''amende en poudre\n* 100g de sucre\n* 1 oeuf\n \n', NULL),
(34, 'Muffins (base)', '* M&eacute;langer les oeufs et le beurre fondu.\n* Rajouter la farine et la levure.\n* Rajouter le lait et bien m&eacute;langer.\n* Verser la pr&eacute;paration dans les moules.\n* Mettre au four 15mn &agrave; 200&deg;c.', '* 2 oeufs\n* 100g de beurre\n* 120g de farine\n* 1 sachet de levure\n* 10cl de lait', 'Recettes possibles :\n* [[Muffins Courgettes/Lardons]]\n* [[Muffins Poivrons/Chorizo]]\n* [[Muffins Lardons/Fromage]]'),
(35, 'Muffins Courgettes/Lardons', '* Griller les courgettes &agrave; la po&ecirc;le.\n* Ajouter les lardons et les oignons &eacute;minc&eacute;s. \n* Mixer grossi&egrave;rement l''ensemble.\n* Ajouter &agrave; la p&acirc;te &agrave; [[Muffins (base)|muffins]]', '* 1 oignon\n* 2 courgettes\n* 100g de lardons', '[[Muffins (base)]]'),
(36, 'Muffins Poivrons/Chorizo', '* Couper les poivrons en petit d&eacute;s.\n* Les faire fondre dans un peu d''huile d''olive.\n* Rajouter un peu d''ail.\n* Couper le chorizo en petit d&eacute;s.\n* Ajouter le chorizo aux poivrons.\n* Mixer grossi&egrave;rement.\n* Rajouter &agrave; la p&acirc;te &agrave; [[Muffins (base)|muffins]].', '* 200g de chorizo\n* 1 &agrave; 3 poivrons\n* Ail', '[[Muffins (base)]]'),
(37, 'Muffins Lardons/Fromage', '* &Eacute;mincer l''oignon.\n* Faire cuire l''oignon et les lardons dans une po&ecirc;le.\n* Enlever un peu du gras de cuisson.\n* Ajouter le cont&eacute; coup&eacute; en d&eacute;s.\n* M&eacute;langer avec la p&acirc;te &agrave; [[Muffins (base)|muffins]].\n* Apr&egrave;s avoir vers&eacute; dans les moules, rajouter le r&acirc;p&eacute; par dessus.', '* 100g de lardons\n* 1 oignon\n* 50g de r&acirc;p&eacute;\n* 50g de cont&eacute;', '[[Muffins (base)]]'),
(38, 'Chantilly', '* Mettre tous les ingr&eacute;dients au frigo.\n* Fouetter la cr&egrave;me pour la faire monter.\n* Rajouter lentement les sucres.\n* Rajouter l''eau si n&eacute;cessaire.\n* Laisser la cr&egrave;me au frigo quelques heures.', '* 0.5L de cr&egrave;me &eacute;paisse enti&egrave;re\n* 5cl d''eau\n* 3 c.&agrave;.s de sucre\n* 1 sachet de sucre vanill&eacute;', NULL),
(41, 'Sauce B&eacute;chamelle', '* Faire fondre le beurre &agrave; feu doux sans le laisser blondir.\n* Ajouter la farine petit &agrave; petit.\n* M&eacute;langer jusqu''&agrave; ce que la pr&eacute;paration devienne mousseuse.\n* Faire chauffer le lait.\n* Ajouter petit &agrave; petit le lait.\n* Assaisonner.\n* Laisser cuire 10mn en m&eacute;langeant saas laisser bouillir.', '* 40g de farine\n* 50g de beurre\n* 50cl de lait\n* Sel / Poivre', NULL),
(43, 'Lasagnes Bolognaises', '* Pr&eacute;parer la [[Sauce Rag&ugrave;]].\n* Pr&eacute;parer 2 litres [[Sauce B&eacute;chamelle]].\n* Dans un plat &agrave; gratins, commencer par une couche de b&eacute;chamelle.\n* Disposer ensuite une couche de p&acirc;te, une de rag&ugrave; et une de b&eacute;chamelle.\n* Continuer dans cet ordre jusqu''en haut du plat.\n* Finir par une couche de b&eacute;chamelle.\n* Saupoudrer de parmesan.\n* Mettre au four 30-40mn &agrave; 200&deg;c.', '* Un paquet de parmesan\n* Un paquet de p&acirc;te &agrave; lasagnes', 'Pour cette recette, il faut aussi :\n* De la [[Sauce B&eacute;chamelle]]\n* De la [[Sauce Rag&ugrave;]]'),
(45, 'Velout&eacute; de l&eacute;gumes', '* Eplucher les l&eacute;gumes, les couper en gros\n* Cuire dans de l''eau bouillante (sauf la betterave qui est d&eacute;j&agrave; cuite)\n* Presser pour pas grader trop d''eau du l&eacute;gume\n* Mixer avec la cr&egrave;me (pot ou moins) et du kiri ou pas\n* Saler\n* Servir dans des verrines', '* 1Kg l&eacute;gumes\n* 1 pot de cr&egrave;me\n* Kiri\n* Sel', 'Le kiri peut &ecirc;tre remplac&eacute; par du saint-mor&ecirc;t ou du tartare\nLe l&eacute;gume peut &ecirc;tre : courgette, carotte ou betterave'),
(52, 'Goug&egrave;res au Fromage', '* Faire bouillir l''eau avec le beurre + le sel\n* Hors du feu, ajouter la farine d''un coup\n* Bien m&eacute;langer et attendre 1min\n* Ajouter les oeufs un par un\n* Ajouter gruy&egrave;re r&acirc;p&eacute; + poivre\n* Faire des petites boules sur une plaque\n* Enfourner 25min &agrave; 200&deg;C', '* 25cl eau\n* 80g beurre\n* 150g farine\n* 4 oeufs\n* 150g gruy&egrave;re r&acirc;p&eacute;\n* Sel / Poivre', 'Meilleur servis chauds !');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`tag`) VALUES
('Amende'),
('Asiatique'),
('B&eacute;chamelle'),
('Betteraves'),
('Biscuits'),
('Bolognaise'),
('Carottes'),
('Chair &agrave; saucisse'),
('Champignons'),
('Chocolat'),
('Chorizo'),
('Comt&eacute;'),
('Courgettes'),
('Cr&egrave;me'),
('Cr&egrave;me fraiche'),
('Crabe'),
('Dessert'),
('Dinde'),
('Entr&eacute;e'),
('Fromage'),
('G&acirc;teau'),
('Go&ucirc;ter'),
('Gruy&egrave;re'),
('Italien'),
('Kiri'),
('L&eacute;gumes'),
('Lait'),
('Lardons'),
('Lasagnes'),
('Muffins'),
('Nems'),
('Nutella'),
('Oeufs'),
('Oignon'),
('P&acirc;te feuillet&eacute;e'),
('P&acirc;tes'),
('Parmesan'),
('Plat'),
('Poivrons'),
('Porc'),
('Poulet'),
('Quiche'),
('Rag&ugrave;'),
('Rap&eacute;'),
('Saint-mor&ecirc;t'),
('Sal&eacute;'),
('Sauce'),
('Sucr&eacute;'),
('Surimi'),
('Tartare'),
('Tomate'),
('Verrines'),
('Viande hach&eacute;e'),
('Yaourt');

-- --------------------------------------------------------

--
-- Structure de la table `tags_in_recettes`
--

CREATE TABLE IF NOT EXISTS `tags_in_recettes` (
  `recette_id` int(11) NOT NULL,
  `tag` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`recette_id`,`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tags_in_recettes`
--

INSERT INTO `tags_in_recettes` (`recette_id`, `tag`) VALUES
(1, 'Asiatique'),
(1, 'Carottes'),
(1, 'Crabe'),
(1, 'Dinde'),
(1, 'Entr&eacute;e'),
(1, 'Nems'),
(1, 'Plat'),
(1, 'Porc'),
(1, 'Poulet'),
(1, 'Sal&eacute;'),
(1, 'Surimi'),
(23, 'Dessert'),
(23, 'Go&ucirc;ter'),
(23, 'Nutella'),
(23, 'Plat'),
(23, 'Sal&eacute;'),
(23, 'Sucr&eacute;'),
(24, 'Bolognaise'),
(24, 'Chair &agrave; saucisse'),
(24, 'Champignons'),
(24, 'Lardons'),
(24, 'Rag&ugrave;'),
(24, 'Sal&eacute;'),
(24, 'Sauce'),
(24, 'Tomate'),
(24, 'Viande hach&eacute;e'),
(25, 'Cr&egrave;me fraiche'),
(25, 'Entr&eacute;e'),
(25, 'Gruy&egrave;re'),
(25, 'Lardons'),
(25, 'Oeufs'),
(25, 'P&acirc;te feuillet&eacute;e'),
(25, 'Quiche'),
(25, 'Rap&eacute;'),
(25, 'Sal&eacute;'),
(26, 'Chocolat'),
(26, 'Cr&egrave;me'),
(26, 'Dessert'),
(26, 'Sucr&eacute;'),
(27, 'Chocolat'),
(27, 'Dessert'),
(27, 'G&acirc;teau'),
(27, 'Go&ucirc;ter'),
(27, 'Sucr&eacute;'),
(28, 'Biscuits'),
(28, 'Chocolat'),
(28, 'Go&ucirc;ter'),
(28, 'Sucr&eacute;'),
(29, 'Biscuits'),
(29, 'Chocolat'),
(29, 'Go&ucirc;ter'),
(29, 'Sucr&eacute;'),
(30, 'Dessert'),
(30, 'G&acirc;teau'),
(30, 'Go&ucirc;ter'),
(30, 'Oeufs'),
(30, 'Yaourt'),
(31, 'Go&ucirc;ter'),
(31, 'Sal&eacute;'),
(31, 'Sucr&eacute;'),
(32, 'Dessert'),
(32, 'Go&ucirc;ter'),
(32, 'Sucr&eacute;'),
(33, 'Amende'),
(33, 'Dessert'),
(33, 'G&acirc;teau'),
(33, 'Go&ucirc;ter'),
(33, 'Oeufs'),
(33, 'Sucr&eacute;'),
(34, 'Muffins'),
(34, 'Sal&eacute;'),
(35, 'Courgettes'),
(35, 'Lardons'),
(35, 'Muffins'),
(35, 'Sal&eacute;'),
(36, 'Chorizo'),
(36, 'Muffins'),
(36, 'Poivrons'),
(36, 'Sal&eacute;'),
(37, 'Comt&eacute;'),
(37, 'Fromage'),
(37, 'Lardons'),
(37, 'Muffins'),
(37, 'Oignon'),
(37, 'Rap&eacute;'),
(37, 'Sal&eacute;'),
(38, 'Dessert'),
(38, 'Sucr&eacute;'),
(41, 'B&eacute;chamelle'),
(41, 'Lait'),
(41, 'Sauce'),
(43, 'B&eacute;chamelle'),
(43, 'Italien'),
(43, 'Lasagnes'),
(43, 'P&acirc;tes'),
(43, 'Parmesan'),
(43, 'Plat'),
(43, 'Rag&ugrave;'),
(43, 'Sal&eacute;'),
(45, 'Betteraves'),
(45, 'Carottes'),
(45, 'Courgettes'),
(45, 'Cr&egrave;me fraiche'),
(45, 'Entr&eacute;e'),
(45, 'Kiri'),
(45, 'L&eacute;gumes'),
(45, 'Saint-mor&ecirc;t'),
(45, 'Tartare'),
(45, 'Verrines'),
(52, 'Entr&eacute;e'),
(52, 'Gruy&egrave;re'),
(52, 'Rap&eacute;'),
(52, 'Sal&eacute;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
