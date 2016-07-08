INSERT INTO `order_content` VALUES (1, 1, 1),
	(1, 2, 1),
	(1, 3, 1),
	(1, 5, 1);

INSERT INTO `file` VALUES ('', 1, 1, 1, 1);

INSERT INTO `goody` VALUES ('', 'DVD INS Show 2015', '', 12.00, 500),
	('', 'T-shirt INS School Homme Vert XL', 'Modèle : homme ; Couleur : vert ; Taille : XL', 12.00, 100),
	('', 'T-shirt INS School Femme Bleu S', 'Modèle : femme ; Couleur : bleu ; Taille : S', 12.00, 100),
	('', 'Clé USB', 'Clé USB 4 Go', 8.00, ''),
	('', 'Clé USB + mixtape au choix', 'Choix disponibles : house, hip-hop, funk', 10.00, '');

INSERT INTO `lesson` VALUES ('', 'Ragga Dancehall Débutant', 9, 'LUNDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Ragga Dancehall Inter.', 9, 'LUNDI', '19:35:00', '20:35:00', 1, '', ''),
	('', 'Ragga Dancehall Avancé', 9, 'LUNDI', '20:40:00', '21:55:00', 1, '', ''),
	('', 'Locking Débutant', 5, 'LUNDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Popping Débutant', 5, 'LUNDI', '19:35:00', '20:35:00', 2, '', ''),
	('', 'Locking Avancé', 2, 'LUNDI', '20:40:00', '21:55:00', 2, '', ''),
	('', 'House Cardio', 1, 'MARDI', '12:30:00', '13:30:00', 1, '', ''),
	('', 'New School Débutant', 1, 'MARDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Lady Style', 6, 'MARDI', '19:35:00', '20:35:00', 1, '', ''),
	('', 'New School Avancé', 1, 'MARDI', '20:40:00', '21:55:00', 1, '', ''),
	('', 'Atelier Enfant', 2, 'MARDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Kizomba', 8, 'MARDI', '19:35:00', '20:35:00', 2, '', ''),
	('', 'New School Int. (20h40 - 21h40)', 1, 'MARDI', '20:40:00', '21:55:00', 2, '', ''),
	('', 'Break enfants 8-11 ans', 7, 'MERCREDI', '14:00:00', '14:55:00', 1, '', ''),
	('', 'Break Débutant', 7, 'MERCREDI', '15:00:00', '15:55:00', 1, '', ''),
	('', 'Break Intermédiaire', 7, 'MERCREDI', '16:00:00', '17:00:00', 1, '', ''),
	('', 'Hip Hop Tout Style Déb.', 2, 'MERCREDI', '17:25:00', '18:25:00', 1, '', ''),
	('', 'Hip Hop Tout Style Int.', 2, 'MERCREDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Hip Hop Tout Style Avan.', 2, 'MERCREDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'Atelier INS School', 0, 'MERCREDI', '20:55:00', '21:55:00', 1, '', ''),
	('', 'Découverte 6-7 ans', 1, 'MERCREDI', '14:00:00', '14:55:00', 2, '', ''),
	('', 'Découverte 8-9 ans', 1, 'MERCREDI', '15:00:00', '15:55:00', 2, '', ''),
	('', 'Découverte 10-11 ans', 1, 'MERCREDI', '16:00:00', '17:00:00', 2, '', ''),
	('', 'Break Avan. (17h25 - 18h40)', 7, 'MERCREDI', '17:25:00', '18:25:00', 2, '', ''),
	('', 'Session Libre Break', 0, 'MERCREDI', '18:30:00', '19:30:00', 2, '', ''),
	('', 'Session Libre', 0, 'MERCREDI', '20:55:00', '21:55:00', 2, '', ''),
	('', 'House Débutant', 1, 'JEUDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'House Avancé', 1, 'JEUDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'House Coaching', 1, 'JEUDI', '20:55:00', '21:55:00', 1, '', ''),
	('', 'Pilates-Stretching (19h - 20h)', 3, 'JEUDI', '19:35:00', '20:50:00', 2, '', ''),
	('', 'Soul Step (20h05 - 21h05)', 2, 'JEUDI', '20:55:00', '21:55:00', 2, '', ''),
	('', 'Session Libre Debout', 0, 'VENDREDI', '18:30:00', '19:30:00', 1, '', ''),
	('', 'Popping Avancé', 2, 'VENDREDI', '19:35:00', '20:50:00', 1, '', ''),
	('', 'Popping Coaching', 2, 'VENDREDI', '20:50:00', '21:50:00', 1, '', ''),
	('', 'Break \'\'Top Rock\'\'', 4, 'VENDREDI', '18:30:00', '19:30:00', 2, '', '');

INSERT INTO `order` VALUES ('', 1, '2016-05-01');

INSERT INTO `order_payment` VALUES ('', 1, 46.00, 'CHQ', '2016-05-15');

INSERT INTO `lesson_participation` VALUES (1, 6, ''),
	(1, 28, ''),
	(1, 29, '');

INSERT INTO `registration` VALUES ('', 1, '2011-2012', 4, 380.00, 0, 3),
	('', 1, '2012-2013', 3, 340.00, 10, 3),
	('', 1, '2013-2014', 4, 10.00, 0, 1),
	('', 1, '2015-2016', 2, 0.00, 0, 0);

INSERT INTO `registration_payment` VALUES ('', 1, 130.00, 'CHQ', '2011-09-15'),
	('', 1, 130.00, 'CHQ', '2011-12-01'),
	('', 1, 120.00, 'CHQ', '2012-03-01'),
	('', 2, 106.00, 'CHQ', '2012-09-15'),
	('', 2, 100.00, 'CHQ', '2012-12-01'),
	('', 2, 100.00, 'CHQ', '2013-03-01'),
	('', 3, 10.00, 'ESP', '2013-09-15');

INSERT INTO `room` VALUES ('', 'Salle du Temps', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand', 1),
	('', 'Salle Afrika Bambaataa', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand', 2);

INSERT INTO `teacher` VALUES ('', 'François', 'Khamny', '', '', '', '', '', '', '', ''),
	('', 'Djamel', 'Dahak', '', '', '', '', '', '', '', ''),
	('', 'Frédérique', 'Vitrey', '', '', '', '', '', '', '', ''),
	('', 'Deem', 'Manebard', '', '', '', '', '', '', '', ''),
	('', 'Mariel', 'Fikat', '', '', '', '', '', '', '', ''),
	('', 'Eve', 'H', '', '', '', '', '', '', '', ''),
	('', 'Arnaud', 'Ousset', '', '', '', '', '', '', '', ''),
	('', 'Sophie & Hervé', 'N/A', '', '', '', '', '', '', '', ''),
	('', 'Belly', 'Raveloarijaona', '', '', '', '', '', '', '', '');
