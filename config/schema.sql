DROP TABLE IF EXISTS `daily_statistics`;
#---
DROP TABLE IF EXISTS `category_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `author`;
#---
CREATE TABLE `author` (
    `author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Entity';
#---
INSERT INTO `author` (`name`, `url`)
VALUES ('Robert Downey Jr.', 'robert-downey-jr'),
       ('Chris Evans', 'chris-evans'),
       ('Scarlett Johansson', 'scarlett-johansson'),
       ('Chris Hemsworth', 'chris-hemsworth'),
       ('Mark Ruffalo', 'mark-ruffalo');
#---
CREATE TABLE `post` (
    `post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    `content` varchar(4095) DEFAULT NULL COMMENT 'Content',
    `author_id` int unsigned DEFAULT NULL COMMENT 'Author ID',
    PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Post Entity';
#---
ALTER TABLE `post`
    ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    COMMENT 'Created At' AFTER `author_id`,
    ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
    COMMENT 'Updated At' AFTER `created_at`,
    ADD CONSTRAINT `FK_POST_AUTHOR_ID`
        FOREIGN KEY (`author_id`)
        REFERENCES `author` (`author_id`) ON DELETE SET NULL;
#---
INSERT INTO `post` (`name`, `url`, `content`, `author_id`)
VALUES ('Post 1', 'post-1', 'Lorem ipsum dolor sit amet', 1),
       ('Post 2', 'post-2', 'Lorem ipsum dolor sit amet', 1),
       ('Post 3', 'post-3', 'Lorem ipsum dolor sit amet', 3),
       ('Post 4', 'post-4', 'Lorem ipsum dolor sit amet', 2),
       ('Post 5', 'post-5', 'Lorem ipsum dolor sit amet', 3),
       ('Post 6', 'post-6', 'Lorem ipsum dolor sit amet', 5),
       ('Post 7', 'post-7', 'Lorem ipsum dolor sit amet', 5),
       ('Post 8', 'post-8', 'Lorem ipsum dolor sit amet', 4),
       ('Post 9', 'post-9', 'Lorem ipsum dolor sit amet', 4),
       ('Post 10', 'post-10', 'Lorem ipsum dolor sit amet', 2),
       ('Post 11', 'post-11', 'Lorem ipsum dolor sit amet', 3),
       ('Post 12', 'post-12', 'Lorem ipsum dolor sit amet', 1),
       ('Post 13', 'post-13', 'Lorem ipsum dolor sit amet', 1),
       ('Post 14', 'post-14', 'Lorem ipsum dolor sit amet', 3),
       ('Post 15', 'post-15', 'Lorem ipsum dolor sit amet', 3);
#---
CREATE TABLE `category` (
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Entity';
#---
INSERT INTO `category` (`name`, `url`)
VALUES ('Avengers', 'avengers'),
       ('Star Wars', 'star-wars'),
       ('Pokemon', 'pokemon'),
       ('Skyrim', 'skyrim'),
       ('Justice League', 'justice-league');
#---
CREATE TABLE `category_post` (
    `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Post Relation';
#---
ALTER TABLE `category_post`
    ADD CONSTRAINT `FK_CATEGORY_POST_POST_ID`
        FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_CATEGORY_POST_CATEGORY_ID`
        FOREIGN KEY (`category_id`)
        REFERENCES `category` (`category_id`) ON DELETE CASCADE;
#---
INSERT INTO `category_post` (`post_id`, `category_id`)
VALUES (1, 1),
       (2, 2),
       (3, 2),
       (4, 4),
       (5, 1),
       (6, 3),
       (7, 3),
       (8, 1),
       (9, 1),
       (10, 4),
       (11, 2),
       (12, 1),
       (13, 4),
       (14, 2),
       (15, 5);
#---
CREATE TABLE `daily_statistics` (
    `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date',
    `views` int unsigned NOT NULL DEFAULT 0 COMMENT 'Views',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Daily Statistics';
#---
ALTER TABLE `daily_statistics`
    ADD CONSTRAINT `FK_DAILY_STATISTICS_POST_ID`
        FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `daily_statistics` (`post_id`, `date`, `views`)
VALUES (1, '2021-10-30', 1),
       (2, '2021-10-30', 9),
       (3, '2021-10-30', 2),
       (4, '2021-10-30', 40),
       (5, '2021-10-30', 7),
       (6, '2021-10-30', 13),
       (7, '2021-10-30', 3),
       (8, '2021-10-30', 21),
       (9, '2021-10-30', 10),
       (10, '2021-10-30', 5),
       (11, '2021-10-30', 1),
       (12, '2021-10-30', 10),
       (13, '2021-10-30', 4),
       (14, '2021-10-30', 12),
       (15, '2021-10-30', 5),
       (1, '2021-10-31', 2),
       (2, '2021-10-31', 23),
       (3, '2021-10-31', 7),
       (4, '2021-10-31', 34),
       (5, '2021-10-31', 16),
       (6, '2021-10-31', 3),
       (7, '2021-10-31', 18),
       (8, '2021-10-31', 1),
       (9, '2021-10-31', 0),
       (10, '2021-10-31', 4),
       (11, '2021-10-31', 0),
       (12, '2021-10-31', 1),
       (13, '2021-10-31', 14),
       (14, '2021-10-31', 9),
       (15, '2021-10-31', 5);