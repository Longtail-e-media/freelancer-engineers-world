-- 30-11-2024
ALTER TABLE `tbl_freelancer` ADD `rating` FLOAT NOT NULL AFTER `profile_picture`;
ALTER TABLE `tbl_freelancer` ADD `user_id` FLOAT NOT NULL AFTER `job_id`;
ALTER TABLE `tbl_client` ADD `user_id` INT(11) NOT NULL AFTER `id`;
ALTER TABLE `tbl_client` ADD `rating` FLOAT NOT NULL AFTER `category_id`;
ALTER TABLE `tbl_freelancer` ADD `email` VARCHAR(255) NOT NULL AFTER `username`;
ALTER TABLE `tbl_client` ADD `email` VARCHAR(255) NOT NULL AFTER `client_name`, ADD `username` VARCHAR(255) NOT NULL AFTER `email`, ADD `mobile_no` VARCHAR(255) NOT NULL AFTER `username`;

-- 02/12/2024
ALTER TABLE `tbl_client` ADD `first_name` VARCHAR(255) NOT NULL AFTER `status`, ADD `middle_name` VARCHAR(255) NOT NULL AFTER `first_name`, ADD `last_name` VARCHAR(255) NOT NULL AFTER `middle_name`;

-- 2024-12-03
UPDATE `tbl_modules` SET `name` = 'Admin Users' WHERE `tbl_modules`.`id` = 1;
UPDATE `tbl_modules` SET `sortorder` = '4' WHERE `tbl_modules`.`id` = 306;
INSERT INTO `tbl_modules` (`id`, `parent_id`, `name`, `link`, `mode`, `icon_link`, `status`, `sortorder`, `added_date`, `properties`)
    VALUES (NULL, '74', 'Client Users', 'clientuser/list', 'clientuser', 'icon-users', '1', '2', '2024-12-03', ''),
           (NULL, '74', 'Freelancer Users', 'freelanceruser/list', 'freelanceruser', 'icon-users', '1', '3', '2024-12-03', '');
