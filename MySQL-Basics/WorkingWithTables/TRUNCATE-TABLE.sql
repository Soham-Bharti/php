-- TRUNCATE TABLE statement to delete all data in a table
-- syntax
-- TRUNCATE [TABLE] table_name;
-- MySQL TRUNCATE TABLE example
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

insert into books(title) values ('Java for dummies'), ('Python for beginners'), ('DSA');
insert into books(title) values ('Java for dummies'), ('Python for beginners'), ('DSA');
-- 1	Java for dummies
-- 2	Python for beginners
-- 3	DSA
-- 4	Java for dummies
-- 5	Python for beginners
-- 6	DSA


TRUNCATE table books;
select * from books;
-- all data from the books were deleted