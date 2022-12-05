CREATE TABLE `user_type` (
	`id` INT(3) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(40),
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_profile` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`password` VARCHAR(20) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`name` VARCHAR(100) NOT NULL,
	`bio` VARCHAR(200),
	`picture` VARCHAR(300) DEFAULT 'https://cdn.discordapp.com/embed/avatars/0.png',
  `user_type_id` INT(3) NOT NULL,
	PRIMARY KEY (`id`),
  FOREIGN KEY (`user_type_id`) REFERENCES `user_type`(`id`)
);

CREATE TABLE `snippet` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(100) DEFAULT 'Sem Titulo',
	`code` LONGBLOB NOT NULL,
	`file_ext` VARCHAR(15) NOT NULL DEFAULT 'txt',
	`trigger` VARCHAR(30),
	`publishedAt` DATE DEFAULT CURRENT_TIMESTAMP,
  `user_profile_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
  FOREIGN KEY (`user_profile_id`) REFERENCES `user_profile`(`id`)
  ON DELETE CASCADE
);

CREATE TABLE `reply` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`content` VARCHAR(200) NOT NULL,
	`publishedAt` DATE DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
  `snippet_id` INT(10) NOT NULL,
  `user_profile_id` INT(10) NOT NULL,
  FOREIGN KEY (`user_profile_id`) REFERENCES `user_profile`(`id`)
  ON DELETE CASCADE,
  FOREIGN KEY (`snippet_id`) REFERENCES `snippet`(`id`)
  ON DELETE CASCADE
);


--inserting data

INSERT INTO `user_type` (`name`) VALUES ('admin');

INSERT INTO `user_type` (`name`) VALUES ('user');

INSERT INTO `user_profile` (`password`, `email`, `name`, `bio`, `user_type_id`) VALUES ('123', 'david@upf.br', 'David', 'I am a student', 1);

INSERT INTO `user_profile` (`password`, `email`, `name`, `bio`, `user_type_id`) VALUES ('123', 'tonezer@upf.br', 'Tonezer', 'Web Dev Professor - UPF', 2);


