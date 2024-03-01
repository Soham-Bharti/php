-- MySQL primary key
-- In MySQL, a primary key is a column or a set of columns that uniquely identifies each row in the table. A primary key column must contain unique values.
-- If the primary key consists of multiple columns, the combination of values in these columns must be unique. Additionally, a primary key column cannot contain NULL.
-- A table can have either zero or one primary key, but not more than one.
-- CREATE TABLE table_name(
--    column1 datatype,
--    column2 datatype, 
--    ...,
--    PRIMARY KEY(column1)
-- );
-- or
-- CREATE TABLE table_name(
--    column1 datatype,
--    column2 datatype,
--    column3 datatype,
--    ...,
--    PRIMARY KEY(column1, column2)
-- );

-- 1) Defining a single-column primary key example
create table products(
	id int PRIMARY KEY,
    name varchar(255) not null
);
insert into products(id, name) values ('1', 'AC'), (2, 'TV');
-- done
insert into products(id, name) values (1, 'AC'), ('3', 'TV');
-- Error Code: 1062. Duplicate entry '1' for key 'products.PRIMARY'

-- 2) Defining a single-column primary key with AUTO_INCREMENT attribute example
DROP TABLE products; 

CREATE TABLE products(
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL
);
INSERT INTO products (name) 
VALUES 
    ('Laptop'),
    ('Smartphone'),
    ('Wireless Headphones');
select * from products;
-- 1	Laptop
-- 2	Smartphone
-- 3	Wireless Headphones

-- 3) Defining a multi-column primary key example
create table customers (
	id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    email varchar(255) not null
);
-- Suppose each customer has some favorite products and each product is favored by some customers.
-- To model this relationship, you need to create a table called favorites
create table favourites(
	customer_id INT,
    product_id INT,
    favourite_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(customer_id, product_id)
);
-- The favorites table has a primary that consists of two columns customer_id and product_id.

-- 4) Adding a primary key to a table example
create table tags(
	id int, 
    name varchar(25) NOT NULL
);
-- To make the id column the primary key, you use the ALTER TABLE ... ADD PRIMARY KEY statement
alter table tags 
add primary key (id)

-- 5) Removing the primary key from a table
alter table tags 
drop primary key 