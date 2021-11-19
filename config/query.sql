#--- Get categories with posts
SELECT DISTINCT `category`.* FROM `category`
    JOIN `category_post` USING(`category_id`);
#--- Get authors with posts
SELECT DISTINCT `author`.* FROM `author`
    JOIN `post` USING(`author_id`);
#--- Get Category/Post/Author by ID
SELECT * FROM `category` WHERE `category_id` = 1;
SELECT * FROM `post` WHERE `post_id` = 1;
SELECT * FROM `author` WHERE `author_id` = 1;
#--- Get Category/Post/Author by URL
SELECT * FROM `category` WHERE `url` = 'avengers';
SELECT * FROM `post` WHERE `url` = 'post-1';
SELECT * FROM `author` WHERE `url` = 'chris-evans';
#--- Get Posts by Category
SELECT `post`.* FROM `post`
    JOIN `category_post` USING(`post_id`)
    WHERE `category_post`.`category_id` = 1;
#--- Authors sorted by number of posts (highest to lowest)
SELECT `author`.*, COUNT(*) as `number_of_posts` FROM `author`
    JOIN `post` USING(`author_id`)
    GROUP BY `author`.`author_id`
    ORDER BY `number_of_posts` DESC;
#--- Categories with the highest number of authors
SELECT `category`.*, COUNT(DISTINCT `post`.`author_id`) as `number_of_authors` FROM `category`
    JOIN `category_post` USING(`category_id`)
    JOIN `post` USING(`post_id`)
    GROUP BY `category_post`.`category_id`
    ORDER BY `number_of_authors` DESC;

