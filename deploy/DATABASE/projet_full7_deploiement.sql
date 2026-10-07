-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Version de déploiement : structure complète + données consoles et games uniquement
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_full7`
--

CREATE DATABASE IF NOT EXISTS `projet_full7` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projet_full7`;

-- --------------------------------------------------------

--
-- Structure de la table `consoles`
--

CREATE TABLE `consoles` (
  `id_console` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `annee_sortie` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consoles`
--

INSERT INTO `consoles` (`id_console`, `nom`, `marque`, `annee_sortie`, `description`) VALUES
(1, 'PlayStation', 'PlayStation', '1994', 'Première console de Sony, sortie en 1994. Elle démocratise la 3D et le support CD-ROM, et attire les joueurs adultes avec des licences majeures comme Final Fantasy VII, Metal Gear Solid et Gran Turismo.'),
(2, 'PlayStation 2', 'PlayStation', '2000', 'Console la plus vendue de l\'histoire avec plus de 155 millions d\'exemplaires. Compatible avec les jeux PS1 et lecteur DVD intégré, elle a bénéficié d\'une ludothèque gigantesque sur plus de dix ans.'),
(3, 'PlayStation 3', 'PlayStation', '2006', 'Console de Sony sortie en 2006, dotée d\'un lecteur Blu-ray et du PlayStation Network. Après un lancement difficile, elle s\'impose grâce à des exclusivités ambitieuses comme The Last of Us et Uncharted.'),
(4, 'Game Boy', 'Nintendo', '1989', 'Console portable de Nintendo lancée en 1989 avec un écran monochrome vert. Très robuste et endurante côté batterie, elle doit son succès à Tetris puis à la déferlante Pokémon, et s\'est vendue à plus de 118 millions d\'exemplaires avec la Game Boy Color.'),
(5, 'NES', 'Nintendo', '1983', 'Console 8 bits de Nintendo, sortie au Japon en 1983 sous le nom de Famicom. Elle relance l\'industrie du jeu vidéo après le krach de 1983 et installe des séries majeures comme Mario, Zelda et Metroid.'),
(6, 'Nintendo 64', 'Nintendo', '1996', 'Console 64 bits de Nintendo sortie en 1996, la première à proposer une manette avec joystick analogique et quatre ports manettes. Elle marque l\'histoire avec Super Mario 64 et Ocarina of Time, mais reste fidèle aux cartouches.'),
(7, 'Master System', 'Sega', '1985', 'Console 8 bits de Sega lancée en 1985, concurrente directe de la NES. Moins populaire au Japon et aux États-Unis, elle rencontre un vrai succès en Europe et au Brésil grâce à des adaptations d\'arcade de qualité.'),
(8, 'Mega Drive', 'Sega', '1988', 'Console 16 bits de Sega sortie en 1988, connue sous le nom de Genesis en Amérique du Nord. Elle s\'impose avec Sonic, ses jeux d\'action rapides et une image de console plus « arcade » face à la Super Nintendo.'),
(9, 'Saturn', 'Sega', '1994', 'Console 32 bits de Sega sortie en 1994, très appréciée pour ses adaptations d\'arcade et ses shoot\'em up. Malgré un succès commercial limité face à la PlayStation, elle a hébergé de nombreux jeux devenus cultes.'),
(10, 'PSP', 'PlayStation', '2004', 'Console portable de Sony sortie en 2004, dotée d\'un grand écran couleur et de jeux sur disque UMD. Elle propose des graphismes proches de la PS2, la lecture de vidéos et de musique, et a accueilli de nombreux jeux devenus cultes.');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id_jeux` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `annee_sortie` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `console_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id_jeux`, `nom`, `annee_sortie`, `description`, `console_id`) VALUES
(1, 'Final Fantasy VII', '1997', 'RPG culte de Square dans lequel Cloud Strife, ancien soldat, rejoint un groupe de résistants contre la corporation Shinra et le redoutable Sephiroth. Scénario marquant, musiques de Nobuo Uematsu et cinématiques révolutionnaires pour l\'époque.', 1),
(2, 'Metal Gear Solid', '1998', 'Jeu d\'infiltration de Hideo Kojima où Solid Snake doit neutraliser une menace nucléaire sur une base isolée en Alaska. Mise en scène cinématographique, combats de boss mémorables et dialogues qui brisent le quatrième mur.', 1),
(3, 'Crash Bandicoot', '1996', 'Plateforme 3D de Naughty Dog dans laquelle Crash, un bandicoot déjanté, traverse des îles piégées pour affronter le Dr Neo Cortex. Difficulté exigeante, niveaux variés et mascotte devenue emblématique de la première PlayStation.', 1),
(4, 'Gran Turismo', '1997', 'Simulation de course de Polyphony Digital qui propose des centaines de voitures réelles à acheter, régler et faire évoluer. Son réalisme, ses permis à passer et sa progression en mode carrière ont redéfini le jeu de course sur console.', 1),
(5, 'Resident Evil', '1996', 'Survival horror de Capcom qui enferme les membres des S.T.A.R.S. dans un manoir infesté de zombies. Caméras fixes, inventaire limité et munitions rares créent une tension permanente et lancent un genre entier.', 1),
(6, 'Tekken 3', '1997', 'Jeu de combat 3D de Namco proposant un vaste casting comme Jin Kazama, Paul Phoenix ou Eddy Gordo. Combats fluides, coups enchaînés très techniques et modes bonus comme Tekken Force en font une référence du genre.', 1),
(7, 'Spyro the Dragon', '1998', 'Plateforme 3D d\'Insomniac Games où un petit dragon violet doit libérer ses semblables transformés en cristal. Mondes colorés et ouverts, vol plané, collecte de gemmes et bande-son signée Stewart Copeland, batteur de The Police.', 1),
(8, 'Castlevania: Symphony of the Night', '1997', 'Suite de Castlevania où Alucard explore le château de Dracula dans un monde ouvert rempli de secrets. Progression par capacités, éléments de RPG, superbe direction artistique 2D et musiques envoûtantes, à l\'origine du terme Metroidvania.', 1),
(9, 'Tomb Raider', '1996', 'Aventure de Core Design qui lance la carrière de Lara Croft, archéologue intrépide. Exploration de tombeaux, énigmes de plateforme, combats contre des animaux et un environnement 3D très ambitieux, qui a marqué toute une génération.', 1),
(10, 'Silent Hill', '1999', 'Horreur psychologique de Konami où Harry Mason recherche sa fille disparue dans une ville engloutie par le brouillard. Atmosphère pesante, sons dérangeants, radio qui grésille à l\'approche des monstres et fins multiples.', 1),
(11, 'Grand Theft Auto: San Andreas', '2004', 'Monde ouvert de Rockstar Games où Carl « CJ » Johnson retourne dans son quartier de Los Santos. Trois villes à explorer, personnalisation du personnage, missions variées et immense liberté, pour l\'un des jeux les plus vendus de la console.', 2),
(12, 'Shadow of the Colossus', '2005', 'Jeu d\'aventure de la Team Ico où un jeune homme doit abattre seize colosses géants pour ressusciter une jeune fille. Univers désert et contemplatif, combats spectaculaires et bande-son poignante, souvent cité comme une œuvre d\'art vidéoludique.', 2),
(13, 'God of War', '2005', 'Action-aventure de Santa Monica Studio où Kratos, guerrier spartiate hanté par son passé, affronte les dieux de la mythologie grecque. Combats brutaux à l\'aide des Lames du Chaos, énigmes et boss gigantesques, dans une ambiance épique.', 2),
(14, 'Kingdom Hearts', '2002', 'RPG d\'action de Square et Disney où Sora, Donald et Dingo parcourent des mondes Disney pour affronter les Sans-cœur. Mélange inattendu de personnages de Final Fantasy et de dessins animés, servi par une musique de Yoko Shimomura.', 2),
(15, 'Metal Gear Solid 3: Snake Eater', '2004', 'Infiltration dans la jungle soviétique en 1964 où Naked Snake doit sauver un scientifique et empêcher une guerre nucléaire. Camouflage, chasse, gestion de la santé et scénario dramatique, souvent salué comme le meilleur de la série.', 2),
(16, 'Gran Turismo 4', '2004', 'Simulation automobile de Polyphony Digital regroupant plus de 700 voitures et une centaine de circuits. Mode carrière très complet, physique soignée, photo mode et son réalisme poussé en font une référence de la course sur PS2.', 2),
(17, 'Final Fantasy X', '2001', 'RPG de Square dans lequel Tidus, un joueur de blitzball, est projeté dans le monde de Spira et accompagne Yuna dans son pèlerinage. Premier épisode entièrement en 3D avec voix, système de combat au tour par tour et histoire très émouvante.', 2),
(18, 'Resident Evil 4', '2005', 'Survival horror d\'action de Capcom où Leon S. Kennedy doit retrouver la fille du président dans un village espagnol hostile. Caméra à l\'épaule, rythme intense et combats de boss marquants, qui ont influencé tout le jeu d\'action moderne.', 2),
(19, 'Jak and Daxter: The Precursor Legacy', '2001', 'Plateforme 3D de Naughty Dog dans un monde ouvert sans aucun temps de chargement. Jak et son compagnon Daxter, transformé en Ottsel, collectent des cellules d\'énergie dans des environnements variés, dans un jeu très soigné techniquement.', 2),
(20, 'Devil May Cry', '2001', 'Hack and slash de Capcom mettant en scène Dante, chasseur de démons au style irrésistible. Enchaînements de combos, notation de style, armes à feu et épées, dans une ambiance gothique qui a donné naissance à un genre à part entière.', 2),
(21, 'The Last of Us', '2013', 'Action-survie de Naughty Dog dans un monde ravagé par une épidémie fongique. Joel escorte Ellie à travers les États-Unis, dans une aventure portée par des personnages marquants, une mise en scène poignante et une tension constante.', 3),
(22, 'Uncharted 2: Among Thieves', '2009', 'Aventure cinématographique de Naughty Dog où Nathan Drake traque le trésor de Marco Polo au Népal. Scènes d\'action spectaculaires, escalade dans un train suspendu et humour de chaque instant, pour l\'un des meilleurs jeux de la console.', 3),
(23, 'Red Dead Redemption', '2010', 'Monde ouvert de Rockstar Games situé dans l\'Ouest américain de 1911. John Marston, ancien hors-la-loi, doit traquer ses anciens complices pour sauver sa famille. Paysages magnifiques, chevauchées, duels et histoire crépusculaire.', 3),
(24, 'Demon\'s Souls', '2009', 'Action-RPG de FromSoftware, précurseur de la série Souls, qui se déroule dans le royaume de Boletaria. Combats exigeants, mort punitive, mondes interconnectés et boss redoutables, dans une ambiance sombre qui a inspiré de nombreux jeux.', 3),
(25, 'God of War III', '2010', 'Troisième volet de la saga où Kratos gravit l\'Olympe pour se venger de Zeus et des dieux qui l\'ont trahi. Combats démesurés contre des titans, mise en scène grandiose et système d\'armes varié, pour une conclusion spectaculaire.', 3),
(26, 'Metal Gear Solid 4: Guns of the Patriots', '2008', 'Dernière mission de Solid Snake, vieilli prématurément, dans des zones de guerre où des mercenaires sont contrôlés par nanomachines. Infiltration plus libre, cinématiques longues et conclusion émouvante de la saga.', 3),
(27, 'Journey', '2012', 'Aventure de thatgamecompany où un voyageur en tunique traverse un désert immense vers une montagne lointaine. Aucune parole, une musique sublime et de brèves rencontres anonymes avec d\'autres joueurs, pour une expérience poétique et contemplative.', 3),
(28, 'Grand Theft Auto V', '2013', 'Monde ouvert de Rockstar Games se déroulant à Los Santos, avec trois protagonistes jouables : Michael, Franklin et Trevor. Braquages élaborés, activités innombrables et une carte immense, pour l\'un des jeux les plus vendus de tous les temps.', 3),
(29, 'Heavy Rain', '2010', 'Thriller interactif de Quantic Dream où quatre personnages traquent le mystérieux Tueur à l\'origami. Les choix du joueur et les échecs modifient le scénario, dans une ambiance de film noir portée par des scènes à quick time events.', 3),
(30, 'Persona 5', '2016', 'RPG japonais d\'Atlus où un lycéen rejoint les Voleurs Fantômes pour corriger le cœur corrompu d\'adultes malfaisants. Alternance entre vie quotidienne et donjons, style graphique très soigné et bande-son jazzy inoubliable.', 3),
(31, 'Tetris', '1989', 'Jeu de puzzle créé par Alekseï Pajitnov où il faut assembler des blocs qui tombent pour compléter des lignes. Livré avec la console, il a contribué à son immense succès grâce à un gameplay simple, addictif et accessible à tous les âges.', 4),
(32, 'Pokémon Jaune', '1996', 'RPG de Game Freak dans lequel le joueur capture, entraîne et échange 151 créatures pour devenir maître Pokémon. Le câble link permet de se battre et d\'échanger entre amis, ce qui a déclenché un phénomène mondial.', 4),
(33, 'Pokémon Or/Argent', '1999', 'Deuxième génération de Pokémon avec la région de Johto, 100 nouvelles créatures, un cycle jour/nuit et la possibilité de revisiter Kanto. Une aventure très riche, considérée comme l\'un des meilleurs épisodes de la série.', 4),
(34, 'Super Mario Land', '1989', 'Premier Mario sur console portable, dans lequel il traverse le royaume de Sarasaland pour sauver la princesse Daisy. Niveaux courts, phases de shoot\'em up en avion et sous-marin, et une musique très reconnaissable.', 4),
(35, 'The Legend of Zelda: Link\'s Awakening', '1993', 'Aventure de Zelda se déroulant sur l\'île de Cocolint, où Link, naufragé, doit réveiller le Poisson-Rêve. Donjons ingénieux, personnages attachants venus de l\'univers Nintendo et une histoire mystérieuse et touchante.', 4),
(36, 'Metroid II: Return of Samus', '1991', 'Deuxième aventure de Samus Aran qui doit éradiquer les derniers Metroids sur leur planète d\'origine, SR388. Exploration en profondeur, ambiance solitaire et évolutions successives des créatures, avant le célèbre Super Metroid.', 4),
(37, 'Kirby\'s Dream Land', '1992', 'Premier jeu de Kirby, créé par Masahiro Sakurai, où la boule rose doit récupérer la nourriture volée par le roi Dadidou. Jeu court et accessible qui permet d\'avaler des ennemis et de voler, idéal pour les débutants.', 4),
(38, 'Wario Land: Super Mario Land 3', '1993', 'Première aventure de Wario en héros, qui cherche à récupérer son château volé par la pirate Captain Syrup. Niveaux plus longs, transformations de pouvoir et collecte de pièces pour acheter le trésor final.', 4),
(39, 'Donkey Kong Land', '1995', 'Adaptation portable de Donkey Kong Country où Donkey et Diddy Kong doivent récupérer leurs bananes volées par King K. Rool. Graphismes pré-rendus impressionnants pour la console et niveaux entièrement inédits.', 4),
(40, 'Dr. Mario', '1990', 'Puzzle de Nintendo où l\'on incarne un médecin qui jette des pilules colorées pour éliminer des virus dans un flacon. Un mode deux joueurs très compétitif et une musique entraînante en font un incontournable.', 4),
(41, 'Super Mario Bros.', '1985', 'Plateforme de Shigeru Miyamoto dans lequel Mario traverse le royaume Champignon pour sauver la princesse Peach de Bowser. Level design parfait, contrôles précis et musique inoubliable ont fondé le jeu de plateforme moderne.', 5),
(42, 'The Legend of Zelda', '1986', 'Aventure fondatrice où Link explore Hyrule pour rassembler les fragments de la Triforce et vaincre Ganon. Monde ouvert, donjons secrets et sauvegarde sur la cartouche, un jeu qui a défini l\'action-aventure.', 5),
(43, 'Metroid', '1986', 'Aventure de science-fiction où Samus Aran explore la planète Zebes pour détruire les Pirates de l\'espace et le Cerveau-Mère. Exploration non linéaire, capacités à débloquer et révélation surprise finale sur l\'identité de Samus.', 5),
(44, 'Mega Man 2', '1988', 'Plateforme de Capcom où Mega Man affronte huit robots maîtres créés par le Dr Wily. Choix libre de l\'ordre des niveaux, armes à récupérer sur les boss et une bande-son considérée comme l\'une des meilleures de la console.', 5),
(45, 'Super Mario Bros. 3', '1988', 'Suite très riche de Mario avec huit mondes, une carte à explorer et de nombreux costumes comme la queue de raton laveur pour voler. Idées inventives à chaque niveau et énorme succès mondial, souvent considéré comme un sommet de la NES.', 5),
(46, 'Castlevania', '1986', 'Action gothique où Simon Belmont, armé de son fouet, traverse le château de Dracula pour vaincre le comte. Difficulté élevée, ambiance de film d\'horreur et bande-son mémorable, à l\'origine d\'une longue série.', 5),
(47, 'Contra', '1987', 'Run and gun de Konami où deux commandos affrontent une armée extraterrestre. Action ininterrompue, armes à ramasser et code Konami célèbre qui donne 30 vies, à jouer en coopération pour une expérience mythique.', 5),
(48, 'Punch-Out!!', '1987', 'Jeu de boxe de Nintendo où Little Mac gravit les rangs du circuit avec l\'aide de son entraîneur. Adversaires excentriques à mémoriser, esquives au bon timing et duels contre Mike Tyson dans certaines versions.', 5),
(49, 'Kirby\'s Adventure', '1993', 'Aventure de Kirby en plusieurs mondes, dans laquelle il doit réparer la Baguette des Rêves. C\'est ici qu\'il acquiert le pouvoir de copier les capacités de ses ennemis, un gameplay qui deviendra la marque de la série.', 5),
(50, 'Final Fantasy', '1987', 'Premier épisode du RPG de Square où quatre Guerriers de la Lumière voyagent pour restaurer la lumière des cristaux. Choix des classes, combats au tour par tour et exploration du monde, qui ont posé les bases de la série.', 5),
(51, 'Super Mario 64', '1996', 'Premier Mario en 3D dans lequel il explore le château de Peach et entre dans des tableaux pour récupérer des étoiles. Liberté de mouvement inédite et caméra dynamique ont posé les bases de la plateforme 3D.', 6),
(52, 'The Legend of Zelda: Ocarina of Time', '1998', 'Aventure 3D où Link voyage entre enfance et âge adulte pour empêcher Ganondorf de s\'emparer de la Triforce. Ciblage des ennemis, ocarina magique et donjons inoubliables, considéré comme l\'un des meilleurs jeux de tous les temps.', 6),
(53, 'GoldenEye 007', '1997', 'FPS de Rare adapté du film de James Bond de 1995. Missions à objectifs variés selon la difficulté et multijoueur à quatre en écran partagé, devenu légendaire dans les salons et sur la console.', 6),
(54, 'Mario Kart 64', '1996', 'Course de karts déjantée avec des personnages de Nintendo, des circuits en 3D et des objets pour gêner ses adversaires. Le mode à quatre joueurs en écran partagé a fait de ce jeu un classique des soirées entre amis.', 6),
(55, 'Super Smash Bros.', '1999', 'Jeu de combat crossover de Nintendo où douze héros comme Mario, Link ou Pikachu s\'affrontent dans des arènes. Le but est d\'éjecter l\'adversaire hors de l\'écran, avec un système accessible et des combats à quatre chaotiques.', 6),
(56, 'The Legend of Zelda: Majora\'s Mask', '2000', 'Zelda sombre où Link, piégé à Termina, doit empêcher la lune de s\'écraser en trois jours qu\'il peut rejouer indéfiniment. Masques transformants, quêtes secondaires nombreuses et ambiance angoissante et mélancolique.', 6),
(57, 'Banjo-Kazooie', '1998', 'Plateforme 3D de Rare où un ours et un oiseau doivent sauver la sœur de Banjo des griffes de la sorcière Gruntilda. Mondes vastes à explorer, humour décalé et capacités variées à débloquer au fil de l\'aventure.', 6),
(58, 'Star Fox 64', '1997', 'Shoot\'em up de Nintendo où Fox McCloud mène son escadron contre l\'armée d\'Andross. Trajets multiples selon les performances, voix des personnages devenues cultes et manette Rumble Pak vendue avec le jeu.', 6),
(59, 'Perfect Dark', '2000', 'FPS de science-fiction de Rare avec Joanna Dark, agent secret de l\'institut Carrington. Missions à objectifs, armes futuristes et multijoueur avec bots personnalisables, pour un digne successeur de GoldenEye.', 6),
(60, 'Paper Mario', '2000', 'RPG d\'Intelligent Systems où Mario, en version papier, part récupérer les sept Étoiles Spirituelles pour libérer Peach. Combats au tour par tour avec timing, humour omniprésent et univers en papier découpé charmant.', 6),
(61, 'Alex Kidd in Miracle World', '1986', 'Plateforme de Sega qui a servi de mascotte à la console avant Sonic. Alex Kidd affronte des ennemis au poing, achète des objets utiles et ses parties de pierre-papier-ciseaux contre les boss sont restées célèbres.', 7),
(62, 'Sonic the Hedgehog', '1991', 'Version 8 bits du célèbre hérisson bleu, conçue spécifiquement pour la Master System. Niveaux repensés par rapport à la version Mega Drive, ambiance colorée et une bande-son accrocheuse pour un titre très apprécié en Europe.', 7),
(63, 'Phantasy Star', '1987', 'Un des premiers RPG de la console, où Alis Landale part venger son frère dans un univers de science-fiction. Donjons en 3D à la première personne, voyages entre planètes et personnage féminin fort, ce qui était rare à l\'époque.', 7),
(64, 'Wonder Boy III: The Dragon\'s Trap', '1989', 'Aventure-plateforme où le héros, transformé en dragon par une malédiction, prend plusieurs formes animales aux capacités différentes. Exploration libre de mondes reliés, dans un jeu très apprécié encore aujourd\'hui.', 7),
(65, 'Psycho Fox', '1989', 'Plateforme de Sega dans lequel un renard peut se métamorphoser en hippopotame, singe ou tigre pour surmonter les obstacles. Un jeu coloré et dynamique, avec un bâton à lancer et des mondes variés à traverser.', 7),
(66, 'Golden Axe Warrior', '1991', 'Action-aventure inspirée de Zelda dans l\'univers de Golden Axe. Le héros explore une carte vue du dessus, affronte des ennemis, trouve des objets et recherche neuf cristaux pour vaincre le maléfique Death Adder.', 7),
(67, 'Shinobi', '1988', 'Adaptation de l\'arcade de Sega dans laquelle le ninja Joe Musashi sauve ses camarades enlevés par un clan ennemi. Combats aux shurikens et à l\'épée, niveaux à plusieurs étages et boss variés, pour un jeu exigeant.', 7),
(68, 'Space Harrier', '1986', 'Shooter rapide en vue arrière dans lequel un héros vole au-dessus de mondes fantastiques et tire sur toutes sortes de créatures. Adaptation de l\'arcade de Sega, impressionnante sur une console 8 bits pour son époque.', 7),
(69, 'Castle of Illusion Starring Mickey Mouse', '1990', 'Plateforme Disney dans laquelle Mickey doit sauver Minnie de la sorcière Mizrabel. Graphismes soignés, niveaux variés et sauts sur les ennemis comme dans les meilleurs jeux du genre, pour un titre très apprécié.', 7),
(70, 'Out Run', '1986', 'Jeu de course d\'arcade au volant d\'une Ferrari décapotable, avec une blonde à ses côtés. Le joueur choisit son itinéraire aux bifurcations, sur une musique au choix à la radio, dans un jeu emblématique de Sega.', 7),
(71, 'Sonic the Hedgehog', '1991', 'Plateforme ultra-rapide de la Sonic Team où le hérisson bleu affronte le Dr Robotnik. Boucles, tremplins et vitesse fulgurante ont fait de Sonic la mascotte de Sega et l\'un des rivaux les plus sérieux de Mario.', 8),
(72, 'Sonic the Hedgehog 2', '1992', 'Suite de Sonic qui introduit Tails, son fidèle acolyte, et le spin dash pour démarrer plus vite. Zones plus variées, mode deux joueurs en écran partagé et bande-son mémorable en font l\'un des jeux les plus vendus de la console.', 8),
(73, 'Streets of Rage 2', '1992', 'Beat\'em up où quatre combattants reprennent les rues face au syndicat du crime de Mr. X. Combats variés, coopération à deux et bande-son électro de Yuzo Koshiro, qui reste l\'une des meilleures de l\'histoire du jeu vidéo.', 8),
(74, 'Golden Axe', '1989', 'Beat\'em up d\'heroic fantasy où un nain, une amazone et un barbare partent renverser le maléfique Death Adder. Jeu jouable à deux, avec chevauchées de créatures et magie, pour un classique de l\'arcade sur console.', 8),
(75, 'Phantasy Star IV', '1993', 'RPG de science-fiction de Sega qui conclut la saga avec Chaz Ashley et son équipe. Combats au tour par tour avec des combos, cinématiques en bande dessinée et récit complexe, souvent cité parmi les meilleurs RPG 16 bits.', 8),
(76, 'Gunstar Heroes', '1993', 'Run and gun explosif du studio Treasure où deux frères affrontent l\'armée de l\'Empire. Boss inventifs, combinaisons d\'armes très variées, animation époustouflante et action non-stop, un sommet technique de la Mega Drive.', 8),
(77, 'Ecco the Dolphin', '1992', 'Aventure sous-marine où un dauphin part à la recherche de sa famille disparue après un tourbillon mystérieux. Ambiance envoûtante, énigmes, exploration des océans et voyages dans le temps, pour un jeu à l\'atmosphère unique.', 8),
(78, 'Shinobi III: Return of the Ninja Master', '1993', 'Action-plateforme rapide où Joe Musashi affronte Neo Zeed. Le ninja court sur un cheval, surfe sur l\'eau et dispose de techniques de magie, dans un jeu très exigeant et fluide, considéré comme l\'un des meilleurs de la série.', 8),
(79, 'Castlevania: Bloodlines', '1994', 'Épisode de la Mega Drive où John Morris et Eric Lecarde combattent le comte Dracula, ressuscité pendant la Première Guerre mondiale. Trois mondes en Europe, effets graphiques impressionnants et bande-son remarquable.', 8),
(80, 'Comix Zone', '1995', 'Beat\'em up original dans lequel Sketch Turner, dessinateur, est piégé dans sa propre bande dessinée par son ennemi Mortus. Les cases servent de niveaux, avec des bulles et des dessins réagissant aux actions du héros.', 8),
(81, 'NiGHTS into Dreams', '1996', 'Jeu de vol onirique de la Sonic Team où deux enfants, Claris et Elliot, affrontent leurs peurs dans le monde des rêves. Vol libre avec NiGHTS, l\'esprit de rêve, dans une atmosphère féerique et une bande-son douce.', 9),
(82, 'Panzer Dragoon Saga', '1998', 'RPG rare et très recherché de Team Andromeda dans lequel Edge chevauche un dragon dans un monde post-apocalyptique. Combats en 3D à 360 degrés, univers original et tirage limité qui en font aujourd\'hui un jeu de collection.', 9),
(83, 'Virtua Fighter 2', '1995', 'Jeu de combat 3D de Sega adapté de l\'arcade en haute résolution. Combats techniques et fluides, personnages aux styles martiaux réalistes et animation soignée à 60 images par seconde, un grand jeu de la Saturn.', 9),
(84, 'Sega Rally Championship', '1995', 'Jeu de course de rallye adapté de l\'arcade de Sega. Trois circuits aux terrains variés, dérapages réalistes, mode contre-la-montre avec fantôme et musique rock. L\'un des meilleurs jeux de course de la Saturn.', 9),
(85, 'Radiant Silvergun', '1998', 'Shoot\'em up de Treasure où un vaisseau utilise sept armes différentes contre des vagues d\'ennemis et de boss. Système de score profond, histoire racontée sur fond de récit non linéaire, référence du genre.', 9),
(86, 'Dragon Force', '1996', 'Jeu de stratégie de Sega où huit royaumes se disputent le continent de Legendra. Jusqu\'à 200 soldats s\'affrontent en temps réel sur le champ de bataille, avec des dizaines de personnages recrutables et des batailles épiques.', 9),
(87, 'Guardian Heroes', '1996', 'Beat\'em up-RPG de Treasure où l\'on affronte des ennemis sur plusieurs plans avec jusqu\'à six joueurs. Histoire à embranchements, statistiques à améliorer et multiples fins possibles, pour un jeu très rejouable.', 9),
(88, 'Sonic R', '1997', 'Jeu de course où Sonic et ses amis s\'affrontent en courant plutôt qu\'en véhicule, sur des circuits 3D remplis de secrets. Bande-son chantée et pistes à explorer, pour un spin-off original de la série.', 9),
(89, 'Virtua Cop', '1995', 'Jeu de tir au pistolet de Sega adapté de l\'arcade, où l\'on incarne un policier qui affronte des criminels dans des décors en 3D. Il se joue au Stunner, le pistolet optique de la console, avec un mode deux joueurs et un système de scores.', 9),
(90, 'Shining Force III', '1997', 'RPG tactique de Sega où l\'on dirige une armée sur des champs de bataille au tour par tour, avec une histoire racontée sous plusieurs points de vue. Environnements en 3D, nombreux personnages et scénario ambitieux répartis sur trois scénarios.', 9),
(91, 'God of War: Chains of Olympus', '2008', 'Action-aventure de Ready at Dawn où Kratos, au service des dieux, affronte les forces de Perséphone. Combats brutaux, énigmes et boss gigantesques, dans un rendu graphique si impressionnant qu\'il rivalise avec les jeux de salon.', 10),
(92, 'Monster Hunter Freedom Unite', '2008', 'Action-RPG de Capcom où le joueur chasse des monstres géants pour fabriquer armes et armures à partir de leurs dépouilles. Des centaines d\'heures de jeu, un mode coopératif à plusieurs qui a fait un carton, notamment au Japon.', 10),
(93, 'Crisis Core: Final Fantasy VII', '2007', 'Action-RPG de Square Enix racontant la vie de Zack Fair, soldat du SOLDAT, avant les événements de Final Fantasy VII. Combats en temps réel, système de roulette de bonus et une histoire touchante pour les fans de la saga.', 10),
(94, 'Metal Gear Solid: Peace Walker', '2010', 'Épisode de Hideo Kojima où Big Boss dirige une armée de mercenaires au Costa Rica en 1974. Infiltration, jeu coopératif jusqu\'à quatre, gestion de sa base et recrutement d\'ennemis capturés pour renforcer son équipe.', 10),
(95, 'Grand Theft Auto: Liberty City Stories', '2005', 'Monde ouvert de Rockstar Games se déroulant à Liberty City, où Toni Cipriani se fait une place dans la mafia. Missions variées, véhicules à conduire et une ville entière à explorer, en version portable pour la première fois.', 10),
(96, 'Patapon 2', '2007', 'Jeu de rythme et de stratégie de Pyramid où l\'on dirige une armée de créatures à un œil en frappant des tambours. Direction artistique en 2D minimaliste, musique entraînante et une progression addictive à travers les régions.', 10),
(97, 'LocoRoco', '2006', 'Plateforme original de Sony où l\'on incline le décor à l\'aide des boutons de tranche pour faire rouler des boules colorées. Univers joyeux, chansons décalées en langage inventé et un gameplay simple et charmant.', 10),
(98, 'Daxter', '2006', 'Plateforme d\'action de Ready at Dawn où le fidèle compagnon de Jak vit sa propre aventure, en tant qu\'exterminateur de nuisibles à Haven City. Humour omniprésent, phases de combat et de plateforme variées et pleines de clins d\'œil.', 10),
(99, 'Persona 3 Portable', '2009', 'RPG d\'Atlus où un lycéen combat des Ombres pendant une heure cachée de la nuit, tout en vivant sa vie quotidienne. Système de liens sociaux, combats au tour par tour, et une version portable enrichie avec un personnage féminin jouable.', 10),
(100, 'Lumines', '2004', 'Puzzle de Q Entertainment où l\'on assemble des blocs de deux couleurs pendant qu\'une ligne balaie l\'écran au rythme de la musique. Un mélange hypnotique de sons et de visuels, présent dès le lancement de la console.', 10);

-- --------------------------------------------------------

--
-- Structure de la table `ownerships`
--

CREATE TABLE `ownerships` (
  `id_appartenance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jeux` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `pseudo` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`id_console`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_jeux`),
  ADD KEY `fk_console` (`console_id`);

--
-- Index pour la table `ownerships`
--
ALTER TABLE `ownerships`
  ADD PRIMARY KEY (`id_appartenance`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_jeux`),
  ADD KEY `fk_jeux` (`id_jeux`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id_jeux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `ownerships`
--
ALTER TABLE `ownerships`
  MODIFY `id_appartenance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_console` FOREIGN KEY (`console_id`) REFERENCES `consoles` (`id_console`);

--
-- Contraintes pour la table `ownerships`
--
ALTER TABLE `ownerships`
  ADD CONSTRAINT `fk_jeux` FOREIGN KEY (`id_jeux`) REFERENCES `games` (`id_jeux`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
