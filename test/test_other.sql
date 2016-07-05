INSERT INTO `order_content` VALUES (1, 1, 1),
	(1, 3, 1),
	(2, 5, 1),
	(2, 2, 1);

INSERT INTO `file` VALUES ('', 101, 0, 1, 0),
	('', 102, 0, 1, 1);

INSERT INTO `goody` VALUES ('', 'DVD INS Show 2015', '', 12.00, 500),
	('', 'T-shirt INS School Homme Vert XL', 'Modèle : homme ; Couleur : vert ; Taille : XL', 12.00, 100),
	('', 'T-shirt INS School Femme Bleu S', 'Modèle : femme ; Couleur : bleu ; Taille : S', 12.00, 100),
	('', 'Clé USB', 'Clé USB 4 Go', 8.00, ''),
	('', 'Clé USB + mixtape au choix', 'Choix disponibles : house, hip-hop, funk', 10.00, '');

INSERT INTO `lesson` VALUES ('', 'Ragga Dancehall Débutant', 0, 'LUNDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Ragga Dancehall Inter.', 0, 'LUNDI', '19:35:00', '20:35:00', 1, '', ''),
	('', 'Ragga Dancehall Avancé', 0, 'LUNDI', '20:40:00', '21:55:00', 1, '', ''),
	('', 'Locking Débutant', 0, 'LUNDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Popping Débutant', 0, 'LUNDI', '19:35:00', '20:35:00', 2, '', ''),
	('', 'Locking Avancé', 2, 'LUNDI', '20:40:00', '21:55:00', 2, '', ''),
	('', 'House Cardio', 0, 'MARDI', '12:30:00', '13:30:00', 1, '', ''),
	('', 'New School Débutant', 1, 'MARDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Lady Style', 0, 'MARDI', '19:35:00', '20:35:00', 1, '', ''),
	('', 'New School Avancé', 1, 'MARDI', '20:40:00', '21:55:00', 1, '', ''),
	('', 'Atelier Enfant', 0, 'MARDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Kizomba', 0, 'MARDI', '19:35:00', '20:35:00', 2, '', ''),
	('', 'New School Int. (20h40 - 21h40)', 1, 'MARDI', '20:40:00', '21:55:00', 2, '', ''),
	('', 'Break enfants 8-11 ans', 0, 'MERCREDI', '14:00:00', '14:55:00', 1, '', ''),
	('', 'Break Débutant', 0, 'MERCREDI', '15:00:00', '15:55:00', 1, '', ''),
	('', 'Break Intermédiaire', 0, 'MERCREDI', '16:00:00', '17:00:00', 1, '', ''),
	('', 'Hip Hop Tout Style Déb.', 2, 'MERCREDI', '17:25:00', '18:25:00', 1, '', ''),
	('', 'Hip Hop Tout Style Int.', 2, 'MERCREDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Hip Hop Tout Style Avan.', 2, 'MERCREDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'Atelier INS School', 0, 'MERCREDI', '20:55:00', '21:55:00', 1, '', ''),
	('', 'Découverte 6-7 ans', 0, 'MERCREDI', '14:00:00', '14:55:00', 2, '', ''),
	('', 'Découverte 8-9 ans', 0, 'MERCREDI', '15:00:00', '15:55:00', 2, '', ''),
	('', 'Découverte 10-11 ans', 0, 'MERCREDI', '16:00:00', '17:00:00', 2, '', ''),
	('', 'Break Avan. (17h25 - 18h40)', 0, 'MERCREDI', '17:25:00', '18:25:00', 2, '', ''),
	('', 'Session Libre Break', 0, 'MERCREDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Session Libre', 0, 'MERCREDI', '20:55:00', '21:55:00', 2, '', ''),
	('', 'House Débutant', 1, 'JEUDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'House Avancé', 1, 'JEUDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'House Coaching', 1, 'JEUDI', '20:55:00', '21:55:00', 1, '', ''),
	('', 'Pilates-Stretching (19h - 20h)', 0, 'JEUDI', '19:35:00', '20:50:00', 2, '', ''),
	('', 'Soul Step (20h05 - 21h05)', 0, 'JEUDI', '20:55:00', '21:55:00', 2, '', ''),
	('', 'Session Libre Debout', 0, 'VENDREDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Popping Avancé', 2, 'VENDREDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'Popping Coaching', 2, 'VENDREDI', '20:50:00', '21:50:00', 1, '', ''),
	('', 'Break \'\'Top Rock\'\'', 0, 'VENDREDI', '18:30:00', '19:30:00', 2, '', '');

INSERT INTO `member` VALUES ('', 'Christophe', 'Pagnoux-Vieuxfort', '1992-03-27', '7 Avenue de l\'Union Soviétique', '63000', 'Clermont-Ferrand', '0661081798', '', '', '0981825328', 'christophe.pagnouxv@gmail.com', 1),
	('', 'Rebecca', 'Kloes', '1995-02-15', '7 Avenue de l\'Union Soviétique', '63000', 'Clermont-Ferrand', '0686690546', '', '', '0981825328', 'kloes.rebecca@gmail.com', 1);

INSERT INTO `order` VALUES ('', 101, '2016-02-15'),
	('', 102, '2016-03-27');

INSERT INTO `lesson_participation` VALUES (101, 6, ''),
	(101, 28, ''),
	(101, 29, ''),
	(102, 27, ''),
	(102, 29, '');

INSERT INTO `payment` VALUES ('', 1, 'CHQ', 130.00, '2011-09-15'),
	('', 1, 'CHQ', 130.00, '2011-12-01'),
	('', 1, 'CHQ', 120.00, '2012-03-01'),
	('', 2, 'CHQ', 106.00, '2012-09-15'),
	('', 2, 'CHQ', 100.00, '2012-12-01'),
	('', 2, 'CHQ', 100.00, '2013-03-01'),
	('', 3, 'ESP', 10.00, '2013-09-15');

INSERT INTO `registration` VALUES ('', 101, '2011-2012', 4, 380.00, 0, 3),
	('', 101, '2012-2013', 3, 340.00, 10, 3),
	('', 101, '2013-2014', 4, 10.00, 0, 1),
	('', 101, '2015-2016', 2, 0.00, 0, 0),
	('', 102, '2015-2016', 1, 0.00, 0, 0);

INSERT INTO `room` VALUES ('', 'Salle du Temps', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand', 1),
	('', 'Salle Afrika Bambaataa', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand', 2);

INSERT INTO `teacher` VALUES ('', 'François', 'Khamny', '', '', '', '', '', '', ''),
	('', 'Djamel', 'Dahak', '', '', '', '', '', '', ''),
	('', 'Frédérique', 'Vitrey', '', '', '', '', '', '', ''),
	('', 'Deem', 'Manebard', '', '', '', '', '', '', ''),
	('', 'Mariel', 'Fikat', '', '', '', '', '', '', ''),
	('', 'Eve', 'H', '', '', '', '', '', '', ''),
	('', 'Arnaud', 'Ousset', '', '', '', '', '', '', ''),
	('', 'Sophie & Hervé', 'N/A', '', '', '', '', '', '', ''),
	('', 'Belly', 'Raveloarijaona', '', '', '', '', '', '', '');
