ALTER TABLE `lesson` CHANGE `day` `day` ENUM('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY') CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

ALTER TABLE `pre_registration` CHANGE `plan` `plan` ENUM('QUARTERLY','ANNUAL') CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

ALTER TABLE `registration` CHANGE `plan` `plan` ENUM('QUARTERLY','ANNUAL') CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `registration`  ADD `comment` TINYTEXT NULL AFTER `num_payments`;
