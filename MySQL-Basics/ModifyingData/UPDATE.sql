-- The UPDATE statement updates data in a table. It allows you to change the values in one or more columns of a single row or multiple rows.
-- The following illustrates the basic syntax of the UPDATE statement:
-- UPDATE [LOW_PRIORITY] [IGNORE] table_name 
-- SET 
--     column_name1 = expr1,
--     column_name2 = expr2,
--     ...
-- [WHERE
--     condition];


-- Notice that the WHERE clause is so important that you should not forget. Sometimes, you may want to update just one row; However, you may forget the WHERE clause and accidentally update all rows of the table.

-- MySQL supports two modifiers in the UPDATE statement.

-- The LOW_PRIORITY modifier instructs the UPDATE statement to delay the update until there is no connection reading data from the table. The LOW_PRIORITY takes effect for the storage engines that use table-level locking only such as MyISAM, MERGE, and MEMORY.
-- The IGNORE modifier enables the UPDATE statement to continue updating rows even if errors occurred. The rows that cause errors such as duplicate-key conflicts are not updated.


-- 1) Using MySQL UPDATE to modify values in a single column example
use classicmodels;
select firstName, lastName, email
from employees
where employeeNumber = 1056;
-- Mary	Patterson	mpatterso@classicmodelcars.com
update employees
set email = 'mary.patterson@classicmodels.com'
where employeeNumber = 1056
-- done

select firstName, lastName, email
from employees
where employeeNumber = 1056;
-- Mary	Patterson	mary.patterson@classicmodels.com

-- 2) Using MySQL UPDATE to modify values in multiple columns
update employees
set 
	lastName = 'Bharti',
	email = 'mary.bharti@classicmodels.com'
where employeeNumber = 1056;
-- done
select firstName, lastName, email
from employees
where employeeNumber = 1056;
-- Mary	Bharti	mary.bharti@classicmodels.com

-- 3) Using MySQL UPDATE to replace string example
update employees
set email = REPLACE(email, '@classicmodelcars.com', '@gmail.com')
where jobTitle = 'Sales Rep' AND officeCode = 6;
-- done
select firstName, lastName, email
from employees
where jobTitle = 'Sales Rep' AND officeCode = 6;
-- Andy	    Fixter	afixter@gmail.com
-- Peter	Marsh	pmarsh@gmail.com
-- Tom	    King	tking@gmail.com

-- 4) Using MySQL UPDATE to update rows returned by a SELECT statement example
-- You can supply the values for the SET clause from a SELECT statement that queries data from other tables.
SELECT 
    customername, 
    salesRepEmployeeNumber
FROM
    customers
WHERE
    salesRepEmployeeNumber IS NULL;

UPDATE customers 
SET 
    salesRepEmployeeNumber = (SELECT 
            employeeNumber
        FROM
            employees
        WHERE
            jobtitle = 'Sales Rep'
        ORDER BY RAND()
        LIMIT 1)
WHERE
    salesRepEmployeeNumber IS NULL;
-- done
SELECT 
    employeeNumber
FROM
    employees
WHERE
    jobtitle = 'Sales Rep'
ORDER BY RAND()
LIMIT 1;
-- returns random emp no. from emp who are sales rep