-- You often use joins to query rows from a table that have (in the case of INNER JOIN) or may not have (in the case of LEFT JOIN) matching rows in another table.
-- In MySQL, you can also use the JOIN clauses in the UPDATE statement to update rows in one table based on values from another table. The UPDATE JOIN statement is useful when you need to modify data across related tables.
-- The syntax of the MySQL UPDATE JOIN  is as follows:
-- UPDATE T1
-- [INNER JOIN | LEFT JOIN] T2 ON T1.C1 = T2.C1
-- SET T1.C2 = T2.C2, 
--     T2.C3 = expr
-- WHERE condition;

-- UPDATE T1
-- INNER JOIN T2 ON T1.C1 = T2.C1
-- SET T1.C2 = T2.C2,
--       T2.C3 = expr
-- WHERE condition;

CREATE DATABASE IF NOT EXISTS hr;

USE hr;

CREATE TABLE merits (
  performance INT PRIMARY KEY, 
  percentage DEC(11, 2) NOT NULL
);
drop table employees;
CREATE TABLE employees (
  emp_id INT AUTO_INCREMENT PRIMARY KEY, 
  emp_name VARCHAR(255) NOT NULL, 
  performance INT DEFAULT NULL, 
  salary DEC(11, 2) DEFAULT NULL, 
  FOREIGN KEY (performance) REFERENCES merits (performance)
);

INSERT INTO merits(performance, percentage) 
VALUES 
  (1, 0), 
  (2, 0.01), 
  (3, 0.03), 
  (4, 0.05), 
  (5, 0.08);

INSERT INTO employees(emp_name, performance, salary) 
VALUES 
  ('Mary Doe', 1, 50000), 
  ('Cindy Smith', 3, 65000), 
  ('Sue Greenspan', 4, 75000), 
  ('Grace Dell', 5, 125000), 
  ('Nancy Johnson', 3, 85000), 
  ('John Doe', 2, 45000), 
  ('Lily Bush', 3, 55000);

update 
	employees
	inner join merits using(performance)
set 
	salary = salary + salary * percentage;
-- done
SELECT * FROM employees;
-- 8	Mary Doe	1	50000.00
-- 9	Cindy Smith	3	66950.00
-- 10	Sue Greenspan	4	78750.00
-- 11	Grace Dell	5	135000.00
-- 12	Nancy Johnson	3	87550.00
-- 13	John Doe	2	45450.00
-- 14	Lily Bush	3	56650.00

-- MySQL UPDATE JOIN example with LEFT JOIN
-- Suppose the company has two new hires employees with the performances are NULL:
TRUNCATE TABLE employees;

INSERT INTO employees(emp_name, performance, salary) 
VALUES 
  ('Mary Doe', 1, 50000), 
  ('Cindy Smith', 3, 65000), 
  ('Sue Greenspan', 4, 75000), 
  ('Grace Dell', 5, 125000), 
  ('Nancy Johnson', 3, 85000), 
  ('John Doe', 2, 45000), 
  ('Lily Bush', 3, 55000),
  ('Jack William', NULL, 43000), 
  ('Ricky Bond', NULL, 52000);
-- done

-- Because these employees are new hires so their performance data is not available or NULL:

SELECT * FROM employees;
-- 8	Mary Doe	1	50000.00
-- 9	Cindy Smith	3	66950.00
-- 10	Sue Greenspan	4	78750.00
-- 11	Grace Dell	5	135000.00
-- 12	Nancy Johnson	3	87550.00
-- 13	John Doe	2	45450.00
-- 14	Lily Bush	3	56650.00
-- 15	Mary Doe	1	50000.00
-- 16	Cindy Smith	3	65000.00
-- 17	Sue Greenspan	4	75000.00
-- 18	Grace Dell	5	125000.00
-- 19	Nancy Johnson	3	85000.00
-- 20	John Doe	2	45000.00
-- 21	Lily Bush	3	55000.00
-- 22	Jack William		43000.00
-- 23	Ricky Bond		52000.00

UPDATE 
  employees 
  LEFT JOIN merits ON employees.performance = merits.performance 
SET 
  salary = salary + salary * COALESCE(percentage, 0.015);
-- 14 row(s) affected, 5 warning(s): 1265 Data truncated for column 'salary' at row 2 1265 Data truncated for column 'salary' at row 3 1265 Data truncated for column 'salary' at row 5 1265 Data truncated for column 'salary' at row 6 1265 Data truncated for column 'salary' at row 7 Rows matched: 16  Changed: 14  Warnings: 5
select * from employees;
-- +--------+---------------+-------------+--------+
-- | emp_id | emp_name      | performance | salary |
-- +--------+---------------+-------------+--------+
-- |      1 | Mary Doe      |           1 |  50000 |
-- |      2 | Cindy Smith   |           3 |  66950 |
-- |      3 | Sue Greenspan |           4 |  78750 |
-- |      4 | Grace Dell    |           5 | 135000 |
-- |      5 | Nancy Johnson |           3 |  87550 |
-- |      6 | John Doe      |           2 |  45450 |
-- |      7 | Lily Bush     |           3 |  56650 |
-- |      8 | Jack William  |        NULL |  43645 |
-- |      9 | Ricky Bond    |        NULL |  52780 |
-- +--------+---------------+-------------+--------+
-- 9 rows in set (0.00 sec)

