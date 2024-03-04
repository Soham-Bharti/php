-- Columns are generated because the data in these columns are computed based on predefined expressions.
-- column_name data_type [GENERATED ALWAYS] AS (expression)
--    [VIRTUAL | STORED] [UNIQUE [KEY]]
-- DROP TABLE IF EXISTS contacts;
-- Before using generated columns
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- NOW using generated columns
DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    fullname varchar(101) GENERATED ALWAYS AS (CONCAT(first_name, ' ', last_name)),
    email VARCHAR(100) NOT NULL
);

desc contacts;
-- field        type            null    key     extra
-- id	        int	            NO	    PRI		auto_increment
-- first_name	varchar(50)	    NO			
-- last_name	varchar(50)	    NO			
-- fullname	    varchar(101)	YES			    VIRTUAL GENERATED
-- email	    varchar(100)    NO			

INSERT INTO
    contacts(first_name, last_name, email)
VALUES
('soham', 'bharti', 'soham.silversky@gmail.com');

select
    *
from
    contacts;

-- id   first_name  last_name   fullname        email
-- 1	soham	    bharti	    soham bharti	soham.silversky@gmail.com
use classicmodels;

alter table
    products
add
    column stockValue DEC(10, 2) generated always as (buyprice * quantityinstock) stored;

select
    productName,
    stockvalue
from
    products;
-- 1969 Harley Davidson Ultimate Chopper	387209.73
-- 1952 Alpine Renault 1300	                720126.90
-- 1996 Moto Guzzi 1100i	                457058.75
-- 2003 Harley-Davidson Eagle Drag Bike     508073.64
-- 1972 Alfa Romeo GTA	                    278631.36
-- 1962 LanciaA Delta 16V	                702325.22
-- 1968 Ford Mustang	                    6483.12
-- 2001 Ferrari Enzo	                    345940.21
-- 1958 Setra Bus	                        123004.10