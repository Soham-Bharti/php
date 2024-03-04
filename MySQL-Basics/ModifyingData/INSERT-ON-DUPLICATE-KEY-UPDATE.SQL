-- MySQL INSERT ON DUPLICATE KEY UPDATE Statement
-- In MySQL, the INSERT ON DUPLICATE KEY UPDATE statement allows you to insert new rows into a table.
-- If a duplicate key violation occurs, you can use the INSERT ON DUPLICATE KEY UPDATE statement to update existing rows instead of throwing an error.
-- This INSERT ON DUPLICATE KEY UPDATE statement is useful when you deal with unique constraints or primary keys.
-- INSERT INTO table_name (column1, column2, ...)
-- VALUES (value1, value2, ...)
-- ON DUPLICATE KEY UPDATE
--    column1 = new_value1, 
--    column2 = new_value2, 
--    ...;
-- The statement returns the number of affected rows based on the action it performs:

-- 1 is returned when a new row is inserted.
-- 2 is returned when an existing row is updated.
-- 0 is returned when no changes are made to an existing row.

-- INSERT INTO table_name (column1, column2, column3, ...)
-- VALUES (...)
-- AS new(alias1, alias2, alias3, ...)
-- ON DUPLICATE KEY UPDATE
--   column1 = alias2 + alias3;

-- MySQL INSERT ON DUPLICATE KEY UPDATE examples
CREATE TABLE employees(
   id INT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   age INT NOT NULL,
   salary DECIMAL(10,2) NOT NULL,
   bonus DECIMAL(10,2) DEFAULT 0
);
-- DONE
INSERT INTO employees(id, name, age, salary)
VALUES(1, 'Jane Doe', 25, 120000);
-- 1 row(s) affected
SELECT * from employees;
-- +----+----------+-----+-----------+-------+
-- | id | name     | age | salary    | bonus |
-- +----+----------+-----+-----------+-------+
-- |  1 | Jane Doe |  25 | 120000.00 |  0.00 |
-- +----+----------+-----+-----------+-------+
-- 1 row in set (0.00 sec)

insert into employees(id, name, age , salary)
values (1,'Soham Bharti', 27, 130000)
as new
on DUPLICATE KEY UPDATE
	name = new.name,
    age = new.age,
    salary = new.salary;
-- 2 row(s) affected
SELECT * from employees;
-- 1	Soham Bharti	27	130000.00	0.00


-- 2) Using MySQL INSERT ON DUPLICATE KEY UPDATE statement to update another column example
INSERT INTO employees(id, name, age, salary)
VALUES(1, 'Jane Doe', 26, 140000)
AS new
ON DUPLICATE KEY UPDATE
   salary = new.salary,
   bonus = new.salary * 0.1;
-- 2 row(s) affected
SELECT * from employees;
-- 1	Soham Bharti	27	140000.00	14000.00