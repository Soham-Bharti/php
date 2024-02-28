-- A UNIQUE constraint is an integrity constraint that ensures the uniqueness of values in a column or group of columns. A UNIQUE constraint can be either a column constraint or a table constraint.
-- eg. email of users
-- syntax
-- CREATE TABLE table_name(
--     ...,
--     column1 datatype UNIQUE,
--     ...
-- );
-- or
-- CREATE TABLE table_name(
--    ...
--    column1 datatype,
--    column2 datatype,
--    ...,
--    UNIQUE(column1, column2)
-- );

-- If you define a UNIQUE constraint without specifying a name, MySQL automatically generates a name for it. To define a UNIQUE constraint with a name, you use this syntax:

-- [CONSTRAINT constraint_name]
-- UNIQUE(column_list)

-- MySQL UNIQUE constraint example
use test;
create table suppliers(
	supplier_id int AUTO_INCREMENT,
    name VARCHAR(255) not null,
    phone VARCHAR(15) not null UNIQUE,
    address VARCHAR(255) not null,
    PRIMARY KEY(supplier_id),
    CONSTRAINT uc_name_address UNIQUE(name, address)
);

INSERT INTO suppliers(name, phone, address) 
VALUES( 'ABC Inc', 
       '(408)-908-2476',
       '4000 North 1st Street');
-- done
INSERT INTO suppliers(name, phone, address) 
VALUES( 'XYZ Corporation','(408)-908-2476','3000 North 1st Street');
-- Error Code: 1062. Duplicate entry '(408)-908-2476' for key 'suppliers.phone'
INSERT INTO suppliers(name, phone, address) 
VALUES( 'XYZ Corporation','(408)-908-3333','3000 North 1st Street');
-- done
INSERT into suppliers(name, phone, address)  values( 'ABC Inc', 
       '(408)-908-1111',
       '4000 North 1st Street');
-- Error Code: 1062. Duplicate entry 'ABC Inc-4000 North 1st Street' for key 'suppliers.uc_name_address'


-- MySQL UNIQUE constraint & NULL
-- In MySQL, NULL values are treated as distinct when it comes to unique constraints. Therefore, if you have a column that accepts NULL values, you can insert multiple values into the column.
CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) UNIQUE
)
insert into contacts(name, phone) values('Alice', '8569874985'), ('soham', null), ('somi', null);
-- done
select * from contacts
-- id   name    phone
-- 1	Alice	8569874985
-- 2	soham	(null)
-- 3	somi	(null)

-- MySQL UNIQUE constraints and indexes
-- When you define a unique constraint for a column or a group of columns, MySQL creates a corresponding UNIQUE index and uses this index to enforce the rule.
show create table suppliers;
-- CREATE TABLE `suppliers` (
--   `supplier_id` int NOT NULL AUTO_INCREMENT,
--   `name` varchar(255) NOT NULL,
--   `phone` varchar(15) NOT NULL,
--   `address` varchar(255) NOT NULL,
--   PRIMARY KEY (`supplier_id`),
--   UNIQUE KEY `phone` (`phone`),
--   UNIQUE KEY `uc_name_address` (`name`,`address`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

-- The following SHOW INDEX statement displays all indexes associated with the suppliers table.
show index from suppliers;
-- suppliers	0	PRIMARY	        1	supplier_id	    A	2				BTREE			YES	
-- suppliers	0	phone	        1	phone	        A	2				BTREE			YES	
-- suppliers	0	uc_name_address	1	name	        A	2				BTREE			YES	
-- suppliers	0	uc_name_address	2	address	        A	2				BTREE			YES	

-- Drop a unique constraint
-- To drop a UNIQUE constraint, you can use DROP INDEX or ALTER TABLE statement:
-- DROP INDEX index_name ON table_name;
-- or
-- ALTER TABLE table_name
-- DROP INDEX index_name;

alter table suppliers
drop index uc_name_address
-- done
show index from suppliers
-- suppliers	0	PRIMARY	1	supplier_id	    A	2				BTREE			YES	
-- suppliers	0	phone	1	phone	        A	2				BTREE			YES	

-- Add new unique constraint
-- ALTER TABLE table_name
-- ADD CONSTRAINT constraint_name 
-- UNIQUE (column_list);
alter table suppliers
add constraint uc_address
unique (address);
-- 0 row(s) affected Records: 0  Duplicates: 0  Warnings: 0

show index from suppliers;
-- suppliers	0	PRIMARY	    1	supplier_id	A	2				BTREE			YES	
-- suppliers	0	phone	    1	phone	    A	2				BTREE			YES	
-- suppliers	0	uc_address	1	address	    A	2				BTREE			YES	
desc suppliers;
-- supplier_id	int	            NO	    PRI		auto_increment
-- name	        varchar(255)	NO			
-- phone	    varchar(15)	    NO	    UNI		
-- address	    varchar(255)	NO	    UNI		
