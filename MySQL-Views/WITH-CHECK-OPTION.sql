-- Sometimes, you create a view to reveal the partial data of a table. However, a simple view is updatable, and therefore, it is possible to update data that is not visible through the view. This update makes the view inconsistent.

-- To ensure the consistency of the view, you use the WITH CHECK OPTION clause when you create or modify the view.

-- The WITH CHECK OPTION is an optional clause of the CREATE VIEW statement. This WITH CHECK OPTION prevents you from updating or inserting rows that are not visible through the view.

-- In other words, whenever you update or insert a row of the base tables through a view, MySQL ensures that the insert or update operation conforms with the definition of the view.

-- The following illustrates the syntax of the WITH CHECK OPTION clause:

-- CREATE OR REPLACE VIEW view_name 
-- AS
--   select_statement
-- WITH CHECK OPTION;


-- MySQL WITH CHECK OPTION example
CREATE DATABASE mydb;

USE mydb;

CREATE TABLE employees(
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO employees (type, name) 
VALUES
('Full-time', 'John Doe'),
('Contractor', 'Jane Smith'),
('Temp', 'Alice Johnson'),
('Full-time', 'Bob Anderson'),
('Contractor', 'Charlie Brown'),
('Temp', 'David Lee'),
('Full-time', 'Eva Martinez'),
('Contractor', 'Frank White'),
('Temp', 'Grace Taylor'),
('Full-time', 'Henry Walker'),
('Contractor', 'Ivy Davis'),
('Temp', 'Jack Turner'),
('Full-time', 'Kelly Harris'),
('Contractor', 'Leo Wilson'),
('Temp', 'Mia Rodriguez'),
('Full-time', 'Nick Carter'),
('Contractor', 'Olivia Clark'),
('Temp', 'Pauline Hall'),
('Full-time', 'Quincy Adams');

SELECT * FROM employees;
-- 1	Full-time	John Doe
-- 2	Contractor	Jane Smith
-- 3	Temp	Alice Johnson
-- 4	Full-time	Bob Anderson
-- 5	Contractor	Charlie Brown
-- 6	Temp	David Lee
-- 7	Full-time	Eva Martinez
-- 8	Contractor	Frank White
-- 9	Temp	Grace Taylor
-- 10	Full-time	Henry Walker
-- 11	Contractor	Ivy Davis
-- 12	Temp	Jack Turner
-- 13	Full-time	Kelly Harris
-- 14	Contractor	Leo Wilson
-- 15	Temp	Mia Rodriguez
-- 16	Full-time	Nick Carter
-- 17	Contractor	Olivia Clark
-- 18	Temp	Pauline Hall
-- 19	Full-time	Quincy Adams

CREATE OR REPLACE VIEW contractors 
AS 
SELECT id, type, name 
FROM 
  employees 
WHERE 
  type = 'Contractor';

select * from contractors;
-- 2	Contractor	Jane Smith
-- 5	Contractor	Charlie Brown
-- 8	Contractor	Frank White
-- 11	Contractor	Ivy Davis
-- 14	Contractor	Leo Wilson
-- 17	Contractor	Olivia Clark

INSERT INTO contractors(name, type)
VALUES('Andy Black', 'Contractor');
-- done

INSERT INTO contractors(name, type)
VALUES('Shashawat', 'Full-time');
-- done 
-- but it should not
-- This statement successfully inserts a new row that is not visible via the contractors view into the employees table.
CREATE OR REPLACE VIEW contractors 
AS 
SELECT id, type, name 
FROM 
  employees 
WHERE 
  type = 'Contractor'
WITH CHECK OPTION;

INSERT INTO contractors(name, type)
VALUES('Shashawat', 'Full-time');
-- Error Code: 1369. CHECK OPTION failed 'mydb.contractors'
