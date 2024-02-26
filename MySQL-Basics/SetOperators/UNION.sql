-- combine two or more result sets of multiple queries into a single result set
-- SELECT column_list
-- UNION [DISTINCT | ALL]
-- SELECT column_list
-- UNION [DISTINCT | ALL]
-- SELECT column_list
-- ...
select * from t1
union
select * from t2
-- id
-- 1
-- 2
-- 3
-- 4
-- 5
-- UNION removed them and kept only unique values

select * from t1
union all
select * from t2

-- id
-- 1
-- 2
-- 3
-- 1
-- 3
-- 4
-- 5
-- UNION ALL does not need to handle duplicates, it performs faster than UNION DISTINCT

SELECT 
    firstName, 
    lastName
FROM
    employees 
UNION 
SELECT 
    contactFirstName, 
    contactLastName
FROM
    customers;
-- firstName lastName
-- Diane	Murphy
-- Mary	Patterson
-- Jeff	Firrelli
-- William	Patterson
-- Gerard	Bondur
-- Anthony	Bow
-- Leslie	Jennings
-- ...

-- MySQL UNION uses the column names of the first SELECT statement for the column headings of the output.


-- MySQL UNION and ORDER BY
SELECT 
    CONCAT(firstName,' ',lastName) fullname, 'Employee' as contactType
FROM
    employees 
UNION SELECT 
    CONCAT(contactFirstName,' ',contactLastName), 'Customer' as contactType
FROM
    customers
order by fullname
-- Adrian Huxley	Customer
-- Akiko Shimamura	Customer
-- Allen Nelson	Customer
-- Andy Fixter	Employee
-- Ann  Brown	Customer
-- Anna O'Hara	Customer
-- Annette  Roulet	Customer
-- Anthony Bow	Employee
-- Arnold Cruz	Customer
-- Barry Jones	Employee
-- Ben Calaghan	Customer

-- MySQL also provides you with an alternative option to sort a result set based on column position using ORDER BY clause as follows:
SELECT 
    CONCAT(firstName,' ',lastName) fullname, 'Employee' as contactType
FROM
    employees 
UNION SELECT 
    CONCAT(contactFirstName,' ',contactLastName), 'Customer' as contactType
FROM
    customers
order by 1
-- Adrian Huxley	Customer
-- Akiko Shimamura	Customer
-- Allen Nelson	Customer
-- Andy Fixter	Employee
-- Ann  Brown	Customer
-- Anna O'Hara	Customer
-- Annette  Roulet	Customer
-- Anthony Bow	Employee
-- Arnold Cruz	Customer
-- Barry Jones	Employee
-- Ben Calaghan	Customer

SELECT 
    CONCAT(firstName,' ',lastName) fullname, 'Employee' as contactType
FROM
    employees 
UNION SELECT 
    CONCAT(contactFirstName,' ',contactLastName), 'Customer' as contactType
FROM
    customers
order by 2
-- ...
-- Juri Yoshido	Customer
-- Dorothy Young	Customer
-- Allen Nelson	Customer
-- Pascale  Cartrain	Customer
-- Georg  Pipps	Customer
-- Arnold Cruz	Customer
-- Mary Patterson	Employee
-- Jeff Firrelli	Employee
-- William Patterson	Employee
-- Gerard Bondur	Employee
-- Anthony Bow	Employee
-- ...