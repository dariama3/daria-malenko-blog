DROP DATABASE IF EXISTS dariam_blog;

DROP USER IF EXISTS 'dariam_blog_user'@'%';

CREATE DATABASE dariam_blog;

CREATE USER 'dariam_blog_user'@'%' IDENTIFIED BY '45RNSEhr';

GRANT ALL ON dariam_blog.* TO 'dariam_blog_user'@'%';
