INSERT INTO `order_content` VALUES (1, 1, 1),
	(1, 2, 1),
	(1, 3, 1),
	(1, 5, 1);

INSERT INTO `goody` VALUES ('', 'DVD INS Show 2015', '', 12.00, 500),
	('', 'T-shirt INS School Homme Vert XL', 'Modèle : homme ; Couleur : vert ; Taille : XL', 12.00, 0),
	('', 'T-shirt INS School Femme Bleu S', 'Modèle : femme ; Couleur : bleu ; Taille : S', 12.00, 0),
	('', 'Clé USB', 'Clé USB 4 Go', 8.00, 100),
	('', 'Clé USB + mixtape au choix', 'Choix disponibles : house, hip-hop, funk', 10.00, 100);

INSERT INTO `lesson` VALUES ('', 'Ragga Dancehall Débutant', 9, 'MONDAY', '18:30', '19:30', 1, ''),
	('', 'Ragga Dancehall Inter.', 9, 'MONDAY', '19:35', '20:35', 1, ''),
	('', 'Ragga Dancehall Avancé', 9, 'MONDAY', '20:40', '21:55', 1, ''),
	('', 'Locking Débutant', 5, 'MONDAY', '18:30', '19:30', 2, ''),
	('', 'Popping Débutant', 5, 'MONDAY', '19:35', '20:35', 2, ''),
	('', 'Locking Avancé', 2, 'MONDAY', '20:40', '21:55', 2, ''),
	('', 'House Cardio', 1, 'TUESDAY', '12:30', '13:30', 1, ''),
	('', 'New School Débutant', 1, 'TUESDAY', '18:30', '19:30', 1, ''),
	('', 'Lady Style', 6, 'TUESDAY', '19:35', '20:35', 1, ''),
	('', 'New School Avancé', 1, 'TUESDAY', '20:40', '21:55', 1, ''),
	('', 'Atelier Enfant', 2, 'TUESDAY', '18:30', '19:30', 2, ''),
	('', 'Kizomba', 8, 'TUESDAY', '19:35', '20:35', 2, ''),
	('', 'New School Int. (20h40 - 21h40)', 1, 'TUESDAY', '20:40', '21:55', 2, ''),
	('', 'Break enfants 8-11 ans', 7, 'WEDNESDAY', '14:00', '14:55', 1, ''),
	('', 'Break Débutant', 7, 'WEDNESDAY', '15:00', '15:55', 1, ''),
	('', 'Break Intermédiaire', 7, 'WEDNESDAY', '16:00', '17:00', 1, ''),
	('', 'Hip Hop Tout Style Déb.', 2, 'WEDNESDAY', '17:25', '18:25', 1, ''),
	('', 'Hip Hop Tout Style Int.', 2, 'WEDNESDAY', '18:30', '19:30', 1, ''),
	('', 'Hip Hop Tout Style Avan.', 2, 'WEDNESDAY', '19:35', '20:50', 1, ''),
	('', 'Atelier INS School', 0, 'WEDNESDAY', '20:55', '21:55', 1, ''),
	('', 'Découverte 6-7 ans', 1, 'WEDNESDAY', '14:00', '14:55', 2, ''),
	('', 'Découverte 8-9 ans', 1, 'WEDNESDAY', '15:00', '15:55', 2, ''),
	('', 'Découverte 10-11 ans', 1, 'WEDNESDAY', '16:00', '17:00', 2, ''),
	('', 'Break Avan. (17h25 - 18h40)', 7, 'WEDNESDAY', '17:25', '18:25', 2, ''),
	('', 'Session Libre Break', 0, 'WEDNESDAY', '18:30', '19:30', 2, ''),
	('', 'Session Libre', 0, 'WEDNESDAY', '20:55', '21:55', 2, ''),
	('', 'House Débutant', 1, 'THURSDAY', '18:30', '19:30', 1, ''),
	('', 'House Avancé', 1, 'THURSDAY', '19:35', '20:50', 1, ''),
	('', 'House Coaching', 1, 'THURSDAY', '20:55', '21:55', 1, ''),
	('', 'Pilates-Stretching (19h - 20h)', 3, 'THURSDAY', '19:35', '20:50', 2, ''),
	('', 'Soul Step (20h05 - 21h05)', 2, 'THURSDAY', '20:55', '21:55', 2, ''),
	('', 'Session Libre Debout', 0, 'FRIDAY', '18:30', '19:30', 1, ''),
	('', 'Popping Avancé', 2, 'FRIDAY', '19:35', '20:50', 1, ''),
	('', 'Popping Coaching', 2, 'FRIDAY', '20:50', '21:50', 1, ''),
	('', 'Break \'\'Top Rock\'\'', 4, 'FRIDAY', '18:30', '19:30', 2, '');

INSERT INTO `order` VALUES ('', 1, '2016-05-01');

INSERT INTO `order_payment` VALUES ('', 1, 46.00, 'CHECK', '2016-05-15');

INSERT INTO `registration` VALUES ('', 1, '2011-2012', 380.00, 0, 3),
	('', 1, '2012-2013', 340.00, 10, 3),
	('', 1, '2013-2014', 10.00, 0, 1),
	('', 1, '2015-2016', 0.00, 0, 0);

INSERT INTO `registration_detail` VALUES (1, 4, ''),
	(1, 5, ''),
	(1, 15, ''),
	(1, 27, ''),
	(2, 10, ''),
	(2, 12, ''),
	(2, 28, ''),
	(3, 10, ''),
	(3, 12, ''),
	(3, 28, ''),
	(3, 29, ''),
	(4, 6, ''),
	(4, 28, ''),
	(4, 29, '');

INSERT INTO `registration_file` VALUES (1, 1, 1, 1),
	(2, 1, 1, 1),
	(3, 1, 1, 1),
	(4, 0, 1, 0);

INSERT INTO `registration_payment` VALUES ('', 1, 130.00, 'CHECK', '2011-09-15'),
	('', 1, 130.00, 'CHECK', '2011-12-01'),
	('', 1, 120.00, 'CHECK', '2012-03-01'),
	('', 2, 106.00, 'CHECK', '2012-09-15'),
	('', 2, 100.00, 'CHECK', '2012-12-01'),
	('', 2, 100.00, 'CHECK', '2013-03-01'),
	('', 3, 10.00, 'CASH', '2013-09-15');

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

INSERT INTO `user` VALUES ('admin', 'a06f16e446c970d78b8ef65d4a82c257062e3037d6e091a003449904c5fd2345607b81d711cfc5e3bb19e1c67e525128f3c4c8fa28222576307b3a8fdb86e9a5', 1),
	('user', '44926452f4c0c3329226cdaa2e724a179b4b07f2d604ec59655f243936725953b494f44e819503b69b8868b0f999ce4facdd5eb943783e357f344793c9fbc43c', 0);
