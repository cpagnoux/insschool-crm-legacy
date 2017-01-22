ALTER TABLE `member` CHANGE `means_of_knowledge` `means_of_knowledge` ENUM('POSTER_FLYER','INTERNET','WORD_OF_MOUTH','ADVERTISING_PANEL') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `order_payment`  ADD `cashing_date` DATE NOT NULL AFTER `mode`;
ALTER TABLE `order_payment`  ADD `comment` TINYTEXT NULL AFTER `cashing_date`;

ALTER TABLE `pre_registration` CHANGE `means_of_knowledge` `means_of_knowledge` ENUM('POSTER_FLYER','INTERNET','WORD_OF_MOUTH','ADVERTISING_PANEL') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;

ALTER TABLE `registration_file`  ADD `stamped_envelope` BOOLEAN NOT NULL DEFAULT FALSE;

ALTER TABLE `registration_payment`  ADD `cashing_date` DATE NOT NULL AFTER `mode`;
ALTER TABLE `registration_payment`  ADD `comment` TINYTEXT NULL AFTER `cashing_date`;
