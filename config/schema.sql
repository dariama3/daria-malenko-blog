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
DROP TABLE IF EXISTS `post`;
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
DROP TABLE IF EXISTS `category`;
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
DROP TABLE IF EXISTS `category_post`;
#---
CREATE TABLE `category_post` (
    `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned DEFAULT NULL COMMENT 'Post ID',
    `category_id` int unsigned DEFAULT NULL COMMENT 'Category ID',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Entity';
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
DROP TABLE IF EXISTS `daily_statistics`;