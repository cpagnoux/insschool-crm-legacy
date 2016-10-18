INSERT INTO `order` (`member_id`, `date`) VALUES (1, '2016-05-01');

INSERT INTO `order_content` (`order_id`, `goody_id`, `quantity`) VALUES (1, 2, 1),
	(1, 4, 1);

INSERT INTO `order_payment` (`order_id`, `amount`, `mode`, `date`) VALUES (1, 46.00, 'CHECK', '2016-05-15');

INSERT INTO `registration` (`member_id`, `season`, `plan`, `price`, `discount`, `num_payments`, `date`) VALUES (1, '2011-2012', 'ANNUAL', 380.00, 0, 3, '2011-09-15'),
	(1, '2012-2013', 'ANNUAL', 340.00, 10, 3, '2012-09-15'),
	(1, '2013-2014', 'ANNUAL', 10.00, 0, 1, '2013-09-15'),
	(1, '2015-2016', 'ANNUAL', 0.00, 0, 0, '2015-09-15');

INSERT INTO `registration_detail` (`registration_id`, `lesson_id`) VALUES (1, 4),
	(1, 23),
	(1, 26),
	(1, 32),
	(2, 10),
	(2, 24),
	(2, 33),
	(3, 11),
	(3, 25),
	(3, 34),
	(4, 5),
	(4, 25);

INSERT INTO `registration_file` (`registration_id`, `medical_certificate`, `insurance`, `photo`, `stamped_envelope`) VALUES (1, 1, 1, 1, 1),
	(2, 1, 1, 1, 1),
	(3, 1, 1, 1, 1),
	(4, 0, 1, 0, 0);

INSERT INTO `registration_payment` (`registration_id`, `amount`, `mode`, `date`) VALUES (1, 130.00, 'CHECK', '2011-09-15'),
	(1, 130.00, 'CHECK', '2011-12-01'),
	(1, 120.00, 'CHECK', '2012-03-01'),
	(2, 106.00, 'CHECK', '2012-09-15'),
	(2, 100.00, 'CHECK', '2012-12-01'),
	(2, 100.00, 'CHECK', '2013-03-01'),
	(3, 10.00, 'CASH', '2013-09-15');

DELETE FROM `user`;
INSERT INTO `user` (`username`, `password`, `admin`) VALUES ('admin', 'a06f16e446c970d78b8ef65d4a82c257062e3037d6e091a003449904c5fd2345607b81d711cfc5e3bb19e1c67e525128f3c4c8fa28222576307b3a8fdb86e9a5', 1),
	('user', '44926452f4c0c3329226cdaa2e724a179b4b07f2d604ec59655f243936725953b494f44e819503b69b8868b0f999ce4facdd5eb943783e357f344793c9fbc43c', 0);
