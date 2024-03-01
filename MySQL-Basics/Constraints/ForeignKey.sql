-- A foreign key is a column or group of columns in a table that links to a column or group of columns in another table. The foreign key places constraints on data in the related tables, which allows MySQL to maintain referential integrity.
-- The customers table is called the parent table or referenced table, and the orders table is known as the child table or referencing table.
-- Typically, the foreign key columns of the child table often refer to the primary key columns of the parent table.
-- A table can have more than one foreign key where each foreign key references a primary key of the different parent tables.
-- Once a foreign key constraint is in place, the foreign key columns from the child table must have the corresponding row in the parent key columns of the parent table, or values in these foreign key columns must be NULL (see the SET NULL action example below).

-- Self-referencing foreign key
-- Sometimes, the child and parent tables may refer to the same table. In this case, the foreign key references back to the primary key within the same table.

-- many to one
-- Syntax
-- [CONSTRAINT constraint_name] (optional)
-- FOREIGN KEY [foreign_key_name (optional) ] (column_name, ...)
-- REFERENCES parent_table(colunm_name,...)
-- [ON DELETE reference_option] (optional)
-- [ON UPDATE reference_option] (optional)

-- MySQL fully supports three actions: RESTRICT, CASCADE and SET NULL.
create database fkdemo;
use fkdemo;

-- 1) RESTRICT & NO ACTION actions
create table categories (
	categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName varchar(100) not null
);
create table products(
	productId int AUTO_INCREMENT PRIMARY KEY,
    productName varchar(100) not null,
    catId int,
    CONSTRAINT fk_category 
    FOREIGN KEY (catId)
    REFERENCES categories (categoryId)
);

-- inserted a few datas
insert into categories(categoryName) 
values
	('smart phone'),
	('smart watch');
    
insert into products(productName, catId) 
values
	('redmi note 9 pro',1);
-- everything okay
insert into products(productName, catId) 
values
	('nike shoes',3);

-- Error Code: 1452. Cannot add or update a child row: a foreign key constraint fails (`fkdemo`.`products`, CONSTRAINT `fk_category` FOREIGN KEY (`catId`) REFERENCES `categories` (`categoryId`))

update categories 
set categoryId = 100
where categoryId = 1
-- Error Code: 1451. Cannot delete or update a parent row: a foreign key constraint fails (`fkdemo`.`products`, CONSTRAINT `fk_category` FOREIGN KEY (`catId`) REFERENCES `categories` (`categoryId`))


-- 2) CASCADE action
drop table products;
create table products(
	productId int AUTO_INCREMENT PRIMARY key,
    productName varchar(100) not null,
    catId int not null,
    CONSTRAINT fk_category
    FOREIGN KEY (catID)
    REFERENCES categories (categoryId)
		ON UPDATE CASCADE
        On DELETE CASCADE
);
-- done
insert into products(productName, catId) 
values
('iPhone',1),
('Galaxy Note',1),
('Apple watch',2),
('Samsung galay watch',2);
-- done
select * from products
-- productId    productName             catId
-- 1	        iPhone	                1
-- 2	        Galaxy Note	            1
-- 3	        Apple watch	    	    2
-- 4	        Samsung galay watch	    2

update categories 
set categoryId = 100
where categoryId = 1;
-- 1 row(s) affected Rows matched: 1  Changed: 1  Warnings: 0

select * from categories
-- categoryId   categoryName
-- 2	        smart watch
-- 100	        smart phone

select * from products
-- productId    productName             catId
-- 1	        iPhone	                100
-- 2	        Galaxy Note	            100
-- 3	        Apple watch	            2
-- 4	        Samsung galay watch	    2


DELETE from categories
where categoryId = 2
-- 1 row(s) affected

select * from categories
-- categoryId   categoryName
-- 100	        smart phone

select * from products
-- productId    productName             catId
-- 1	        iPhone	                100
-- 2	        Galaxy Note	            100


-- 3) SET NULL action
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS products;
-- done

create table categories(
	categoryId int AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(100) not null
);

create table products(
	productId int AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(100) not null,
    catId int,
    CONSTRAINT fk_cat
    FOREIGN KEY (catId)
		REFERENCES categories(categoryId)
		On UPDATE set null
        on delete set null
);
-- done

INSERT INTO categories(categoryName)
VALUES
    ('Smartphone'),
    ('Smartwatch');
    -- done

INSERT INTO products(productName, catId)
VALUES
    ('iPhone', 1), 
    ('Galaxy Note',1),
    ('Apple Watch',2),
    ('Samsung Galary Watch',2);
-- done

update categories
set categoryId = 100
where categoryid = 1;
-- done
select * from categories
-- categoryId   categoryName
-- 2	        Smartwatch
-- 100	        Smartphone

select * from products
-- productId    productName             catId
-- 1	        iPhone	                (null)
-- 2	        Galaxy Note	            (null)
-- 3	        Apple Watch	            2
-- 4	        Samsung Galary Watch	2

-- The rows with the categoryId 1 in the products table was automatically set to NULL due to the ON UPDATE SET NULL action.
delete from categories
where categoryId = 2;
-- done

select * from products
-- productId    productName             catId
-- 1	        iPhone	                (null)
-- 2	        Galaxy Note	            (null)
-- 3	        Apple Watch	            (null)
-- 4	        Samsung Galary Watch	(null)
-- The values in the categoryId column of the rows with categoryId 2 in the products table was automatically set to NULL due to the ON DELETE SET NULL action.


-- Drop MySQL foreign key constraints
-- ALTER TABLE table_name 
-- DROP FOREIGN KEY constraint_name;
-- To obtain the generated constraint name of a table, you use the SHOW CREATE TABLE statement:
-- SHOW CREATE TABLE table_name;
SHOW CREATE TABLE products;
-- CREATE TABLE `products` (
--   `productId` int NOT NULL AUTO_INCREMENT,
--   `productName` varchar(100) NOT NULL,
--   `catId` int DEFAULT NULL,
--   PRIMARY KEY (`productId`),
--   KEY `fk_cat` (`catId`) 
--   CONSTRAINT `fk_cat` FOREIGN KEY (`catId`) REFERENCES `categories` (`categoryId`)
--   ON DELETE SET NULL ON UPDATE SET NULL
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

alter table products
drop foreign key fk_cat

SHOW CREATE TABLE products;
-- CREATE TABLE `products` (
--   `productId` int NOT NULL AUTO_INCREMENT,
--   `productName` varchar(100) NOT NULL,
--   `catId` int DEFAULT NULL,
--   PRIMARY KEY (`productId`),
--   KEY `fk_cat` (`catId`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

-- Disabling foreign key checks
-- Sometimes, it is very useful to disable foreign key checks e.g., when you import data from a CSV file into a table.
-- If you don’t disable foreign key checks, you have to load data into a proper order i.e., you have to load data into parent tables first and then child tables, which can be tedious.
-- However, if you disable the foreign key checks, you can load data into tables in any order.

-- To disable foreign key checks, you use the following statement:
SET foreign_key_checks = 0;
-- And you can enable it by using the following statement:
SET foreign_key_checks = 1;

SET foreign_key_checks = 3;
-- Error Code: 1231. Variable 'foreign_key_checks' can't be set to the value of '3'
