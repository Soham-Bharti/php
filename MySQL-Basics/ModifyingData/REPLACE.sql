-- The MySQL REPLACE statement is an extension to the SQL Standard. The MySQL REPLACE statement works as follows:
-- Step 1. Insert a new row into the table, if a duplicate key error occurs.
-- Step 2. If the insertion fails due to a duplicate-key error occurs:
-- Delete the conflicting row that causes the duplicate key error from the table.
-- Insert the new row into the table again.
-- To determine whether the new row that already exists in the table, MySQL uses PRIMARY KEY or UNIQUE KEY index. If the table does not have one of these indexes, the REPLACE statement works like an INSERT statement.
-- To use the REPLACE statement, you need to have at least both INSERT and DELETE privileges for the table.

-- REPLACE [INTO] table_name(column_list)
-- VALUES(value_list);
CREATE TABLE cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    population INT NOT NULL
);
-- done
INSERT INTO cities(name,population)
VALUES('New York',8008278),
	  ('Los Angeles',3694825),
	  ('San Diego',1223405);
-- done
SELECT * from cities;
-- 1	New York	8008278
-- 2	Los Angeles	3694825
-- 3	San Diego	1223405

REPLACE INTO cities(id,population)
VALUES(2,3696820);
-- done
SELECT * FROM cities;
-- 1	New York	8008278
-- 2	(null)      3696820
-- 3	San Diego	1223405
-- The REPLACE statement works as follows:
-- First, the REPLACE statement attempted to insert a new row into cities the table. The insertion failed because the id 2 already exists in the cities table.
-- Then, the REPLACE statement deleted the row with id 2 and inserted a new row with the same id 2 and population 3696820. Because no value is specified for the name column, it was set to NULL.

-- Using MySQL REPLACE statement to update a row
-- REPLACE INTO table
-- SET column1 = value1,
--     column2 = value2;

REPLACE INTO cities(id,name,population)
VALUES(4,'The Bihar',9769000);
-- done
SELECT * FROM cities;
-- 1	New York	8008278
-- 2		        3696820
-- 3	San Diego	1223405
-- 4	The Bihar	9769000

-- Using MySQL REPLACE to insert data from a SELECT statement
-- REPLACE INTO table_1(column_list)
-- SELECT column_list
-- FROM table_2
-- WHERE where_condition;
-- Note that this form of the REPLACE statement is similar to INSERT INTO SELECT statement.
REPLACE INTO 
    cities(name,population)
SELECT 
    name,
    population 
FROM 
   cities 
WHERE id = 1;
-- done
select * from cities;
-- 1	New York	8008278
-- 2		        3696820
-- 3	San Diego	1223405
-- 4	The Bihar	9769000
-- 5	New York	8008278