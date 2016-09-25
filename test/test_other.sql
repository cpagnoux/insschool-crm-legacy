INSERT INTO `goody` VALUES ('', 'DVD INS Show 2015', '', 12.00, 500),
	('', 'T-shirt INS School Homme Vert XL', 'Modèle : homme ; Couleur : vert ; Taille : XL', 12.00, 0),
	('', 'T-shirt INS School Femme Bleu S', 'Modèle : femme ; Couleur : bleu ; Taille : S', 12.00, 0),
	('', 'Clé USB', 'Clé USB 4 Go', 8.00, 100),
	('', 'Clé USB + mixtape au choix', 'Choix disponibles : house, hip-hop, funk', 10.00, 100);

INSERT INTO `lesson` VALUES ('', 'Atelier Ados', 1, 'MONDAY', '18:30', '19:30', 1, ''),
	('', 'Open Class', 2, 'MONDAY', '19:35', '20:35', 1, ''),
	('', 'Locking Intermédiaire', 5, 'MONDAY', '18:30', '19:30', 2, ''),
	('', 'Popping Débutant', 5, 'MONDAY', '19:35', '20:35', 2, ''),
	('', 'Locking Avancé', 2, 'MONDAY', '20:40', '21:55', 2, ''),
	('', 'Lady Style Débutant', 6, 'TUESDAY', '18:30', '19:30', 1, ''),
	('', 'Lady Style Intermédiaire', 6, 'TUESDAY', '19:35', '20:35', 1, ''),
	('', 'Lady Style Avancé', 6, 'TUESDAY', '20:40', '21:55', 1, ''),
	('', 'New School / L.A Style Déb.', 1, 'TUESDAY', '18:30', '19:30', 2, ''),
	('', 'New School / L.A Style Inter.', 1, 'TUESDAY', '19:35', '20:35', 2, ''),
	('', 'New School / L.A Style Avan.', 1, 'TUESDAY', '20:40', '21:55', 2, ''),
	('', 'Break enfants 8-11 ans', 7, 'WEDNESDAY', '15:00', '15:55', 1, ''),
	('', 'Break + 12 ans', 7, 'WEDNESDAY', '16:00', '17:00', 1, ''),
	('', 'Hip Hop Tous Styles Déb.', 2, 'WEDNESDAY', '17:25', '18:25', 1, ''),
	('', 'Hip Hop Tous Styles Int.', 2, 'WEDNESDAY', '18:30', '19:30', 1, ''),
	('', 'Hip Hop Tous Styles Avan.', 2, 'WEDNESDAY', '19:35', '20:50', 1, ''),
	('', 'Atelier INS School', 0, 'WEDNESDAY', '20:55', '21:55', 1, ''),
	('', 'Découverte 6-7 ans', 1, 'WEDNESDAY', '14:00', '14:55', 2, ''),
	('', 'Découverte 8-9 ans', 1, 'WEDNESDAY', '15:00', '15:55', 2, ''),
	('', 'Découverte 10-11 ans', 2, 'WEDNESDAY', '16:00', '17:00', 2, ''),
	('', 'Session Libre Break', 0, 'WEDNESDAY', '17:25', '18:25', 2, ''),
	('', 'Session Libre', 0, 'WEDNESDAY', '20:55', '21:55', 2, ''),
	('', 'House Débutant', 1, 'THURSDAY', '18:30', '19:30', 1, ''),
	('', 'House Intermédiaire', 1, 'THURSDAY', '19:35', '20:35', 1, ''),
	('', 'House Avancé', 1, 'THURSDAY', '20:40', '21:55', 1, ''),
	('', 'Locking Débutant', 5, 'THURSDAY', '18:00', '19:30', 2, ''),
	('', 'Soul Step', 2, 'THURSDAY', '19:35', '20:35', 2, ''),
	('', 'Beat Making', 2, 'THURSDAY', '20:40', '21:55', 2, ''),
	('', 'Popping 8-11 ans', 2, 'FRIDAY', '18:30', '19:30', 1, ''),
	('', 'Popping Avancé', 2, 'FRIDAY', '19:35', '20:50', 1, ''),
	('', 'Popping Coaching', 2, 'FRIDAY', '20:50', '21:50', 1, ''),
	('', 'Break Adultes', 4, 'FRIDAY', '18:30', '19:30', 2, ''),
	('', 'Kizomba Déb.', 8, 'FRIDAY', '19:35', '20:35', 2, ''),
	('', 'Kizomba Int.', 8, 'FRIDAY', '20:40', '21:40', 2, '');

INSERT INTO `order` VALUES ('', 1, '2016-05-01');

INSERT INTO `order_content` VALUES (1, 1, 1),
	(1, 2, 1),
	(1, 3, 1),
	(1, 5, 1);

INSERT INTO `order_payment` VALUES ('', 1, 46.00, 'CHECK', '2016-05-15');

INSERT INTO `registration` VALUES ('', 1, '2011-2012', 'ANNUAL', '', 380.00, 0, 3, '', '2011-09-15'),
	('', 1, '2012-2013', 'ANNUAL', '', 340.00, 10, 3, '', '2012-09-15'),
	('', 1, '2013-2014', 'ANNUAL', '', 10.00, 0, 1, '', '2013-09-15'),
	('', 1, '2015-2016', 'ANNUAL', '', 0.00, 0, 0, '', '2015-09-15');

INSERT INTO `registration_detail` VALUES (1, 4, ''),
	(1, 23, ''),
	(1, 26, ''),
	(1, 32, ''),
	(2, 10, ''),
	(2, 24, ''),
	(2, 33, ''),
	(3, 11, ''),
	(3, 25, ''),
	(3, 34, ''),
	(4, 5, ''),
	(4, 25, '');

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

INSERT INTO `room` VALUES ('', 'Salle du Temps', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand'),
	('', 'Salle Afrika Bambaataa', '29 Rue Jules Verne', '63100', 'Clermont-Ferrand');

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
