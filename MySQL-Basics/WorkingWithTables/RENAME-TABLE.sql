-- To rename one or more tables, you can use the RENAME TABLE statement as follows:
-- RENAME TABLE table_name
-- TO new_table_name;
-- RENAME TABLE does not work for TEMPORARY tables. However, you can use ALTER TABLE to rename temporary tables.
-- RENAME TABLE works for views, except that views cannot be renamed into a different database.
-- RENAME TABLE old_table1 TO new_table1,
--              old_table2 TO new_table2,
--              old_table3 TO new_table3;
-- Note that you cannot use the RENAME TABLE statement to rename a temporary table, but you can use the ALTER TABLE statement to rename a temporary table.

-- Departments Table
-- dept_id  dept_name
-- 1	    Sales
-- 2	    Markting
-- 3	    Finance
-- 4	    Accounting
-- 5	    Warehouses
-- 6	    Production

-- Employees Table
-- id   firstName   lastName    depart_id
-- 1	John	    Doe	        1
-- 2	Bush	    Lily	    2
-- 3	David	    Dave	    3
-- 4	Mary	    Jane	    4
-- 5	Jonatha	    Josh	    5
-- 6	Mateo	    More	    1

-- 1) Renaming a table referenced by a view
CREATE VIEW v_employee_info as 
CREATE VIEW v_employee_info as 
SELECT 
  id, 
  firstName, 
  lastName, 
  dept_name 
from 
  employees 
  inner join departments on dept_id = depart_id;
 
select * from v_employee_info;
-- id   firstName   lastName    dept_name 
-- 1	John	    Doe	        Sales
-- 2	Bush	    Lily	    Markting
-- 3	David	    Dave	    Finance
-- 4	Mary	    Jane	    Accounting
-- 5	Jonatha	    Josh	    Warehouses
-- 6	Mateo	    More	    Sales

RENAME TABLE employees to people;
select * from v_employee_info
-- Error Code: 1356. View 'hr.v_employee_info' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them
CHECK TABLE v_employee_info;
-- Table 'hr.employees' doesn't exist

-- We need to manually change the v_employee_info view so that it refers to the people table instead of the employees table.
-- I changed it manually
CHECK TABLE v_employee_info;
-- hr.v_employee_info	check	status	OK
select * from v_employee_info;
-- id   firstName   lastName    dept_name 
-- 1	John	    Doe	        Sales
-- 2	Bush	    Lily	    Markting
-- 3	David	    Dave	    Finance
-- 4	Mary	    Jane	    Accounting
-- 5	Jonatha	    Josh	    Warehouses
-- 6	Mateo	    More	    Sales


-- 2) Renaming a table that is referenced by a stored procedure
-- First, rename the people table back to the employees table.
rename table people to employees;

-- create a new stored procedure named get_employee that refers to the employees table.
DELIMITER $$
CREATE PROCEDURE get_employee(IN p_id INT)
BEGIN
	SELECT firstName, lastName, dept_name
    FROM employees
    INNER JOIN departments on dept_id = depart_id;
END$$

DELIMITER ;

-- execute the get_employee table to get the data of the employee with ID 1 as follows:
CALL get_employee(1);
-- id   firstName   lastName    dept_name 
-- 1	John	    Doe	        Sales
-- 2	Bush	    Lily	    Markting
-- 3	David	    Dave	    Finance
-- 4	Mary	    Jane	    Accounting
-- 5	Jonatha	    Josh	    Warehouses
-- 6	Mateo	    More	    Sales
rename table employees to people;
call get_employee(2);
-- Error Code: 1146. Table 'hr.employees' doesn't exist
-- To fix this, you need to manually change the employees table in the stored procedure to people table.

-- 3) Renaming a table that is referenced by foreign key constraints
-- The departments table links to the employees table using the department_id column.
-- The department_id column in the employees table is the foreign key that references to the departments table.
-- If you rename the departments table, all the foreign keys that reference the departments table will not be automatically updated. In such cases, you must drop and recreate the foreign keys manually.
RENAME TABLE departments to dept;

DELETE FROM depts 
WHERE
    dept_id = 1
-- Error Code: 1451. Cannot delete or update a parent row: a foreign key constraint fails (`hr`.`people`, CONSTRAINT `people_ibfk_1` FOREIGN KEY (`depart_id`) REFERENCES `depts` (`dept_id`))


-- Renaming multiple tables
-- RENAME TABLE 
--    table_name1 TO new_table_name1,
--    table_name2 TO new_table_name2,
--    ...;
rename table
	people to employees,
    depts to departments;


-- The ALTER TABLE statement can rename a temporary table while the RENAME TABLE statement cannot.
create temporary table last_names
select distinct lastName from employees;
select * from last_names;
-- lastName
-- Doe
-- Lily
-- Dave
-- Jane
-- Josh
-- More
RENAME TABLE lastnames TO unique_lastnames;
-- Error Code: 1146. Table 'hr.lastnames' doesn't exist
alter table lastnames RENAME  TO unique_lastnames;
-- done
select * from unique_lastnames;
-- lastName
-- Doe
-- Lily
-- Dave
-- Jane
-- Josh
-- More