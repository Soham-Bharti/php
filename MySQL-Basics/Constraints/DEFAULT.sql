-- MySQL DEFAULT constraint
-- column_name data_type DEFAULT default_value;
-- The default_value must be a literal constant, e.g., a number or a string. It cannot be a function or an expression. However, MySQL allows you to set the current date and time (CURRENT_TIMESTAMP) to the TIMESTAMP and DATETIME columns.
-- When you define a column without the NOT NULL constraint, the column will implicitly take NULL as the default value.
-- If a column has a DEFAULT constraint and the INSERT or UPDATE statement doesn’t provide the value for that column, MySQL will use the default value specified in the DEFAULT constraint.
-- Typically, you set the DEFAULT constraints for columns when you create the table. MySQL also allows you to add default constraints to the columns of existing tables. If you don’t want to use default values for columns, you can remove the default constraints.

-- MySQL DEFAULT constraint example
create table cart_items(
	item_id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) not null,
    quantity int not null,
    price dec(10,2) not null,
    sales_tax dec(10,2) not null DEFAULT 0.1,
    check(quantity > 0),
    check(sales_tax>= 0)
);
desc cart_items;
-- field        type            null    key     default     extra
-- item_id      int	            NO	    PRI		            auto_increment
-- name	        varchar(255)	NO			
-- quantity	    int	            NO			
-- price	    decimal(10,2)	NO			
-- sales_tax	decimal(10,2)	NO		        0.10	

INSERT INTO cart_items(name, quantity, price)
VALUES('Keyboard', 1, 50);
-- done

select * from cart_items;
-- +---------+----------+----------+-------+-----------+
-- | item_id | name     | quantity | price | sales_tax |
-- +---------+----------+----------+-------+-----------+
-- |       1 | Keyboard |        1 | 50.00 |      0.10 |
-- +---------+----------+----------+-------+-----------+
-- 1 row in set (0.00 sec)

INSERT INTO cart_items(name, quantity, price, sales_tax)
VALUES('mouse', 2, 50,default);

select * from cart_items;
-- +---------+----------+----------+-------+-----------+
-- | item_id | name     | quantity | price | sales_tax |
-- +---------+----------+----------+-------+-----------+
-- |       1 | Keyboard |        1 | 50.00 |      0.10 |
-- |       2 | Mouse    |        2 | 50.00 |      0.10 |
-- +---------+----------+----------+-------+-----------+
-- 1 row in set (0.00 sec)


-- Adding a DEFAULT constraint to a column
-- ALTER TABLE table_name
-- ALTER COLUMN column_name SET DEFAULT default_value;

alter table cart_items
alter column quantity set default 1;

desc cart_items
-- field        type            null    key     default     extra
-- item_id      int	            NO	    PRI		            auto_increment
-- name	        varchar(255)	NO			
-- quantity	    int	            NO			    1
-- price	    decimal(10,2)	NO			
-- sales_tax	decimal(10,2)	NO		        0.10	
INSERT INTO cart_items(name, price, sales_tax)
VALUES('Maintenance services',25.99, 0)

select * from cart_items;
-- 1	Keyboard	            1	50.00	0.10
-- 2	mouse	                2	50.00	0.10
-- 3	Maintenance services	1	25.99	0.00

-- Removing a DEFAULT constraint from a column
-- ALTER TABLE table_name
-- ALTER column_name DROP DEFAULT;
alter table cart_items
alter quantity drop default;

desc cart_items;
-- field        type            null    key     default     extra
-- item_id      int	            NO	    PRI		            auto_increment
-- name	        varchar(255)	NO			
-- quantity	    int	            NO			    
-- price	    decimal(10,2)	NO			
-- sales_tax	decimal(10,2)	NO		        0.10	

-- MySQL DEFAULT constraints set default values for columns.
-- Use DEFAULT default_value to set a default constraint to a column.
-- Use ALTER TABLE ... ALTER COLUMN ... SET DEFAULT to add a DEFAULT constraint to a column of an existing table.
-- Use ALTER TABLE ... ALTER COLUMN ... DROP DEFAULT to drop a DEFAULT constraint from a column of an existing table.