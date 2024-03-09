-- The phone book analogy
-- Suppose you have a phone book that contains all the names and phone numbers of people in a city.

-- Let’s say you want to find Bob Cat’s phone number. Knowing that the names are alphabetically ordered, you first look for the page where the last name is Cat, then you look for Bob and his phone number.

-- If the names in the phone book were not sorted alphabetically, you would need to go through all the pages, reading every name on it until you find Bob Cat.

-- This is called sequential searching. You go over all the entries until you find the person with the phone number that you are looking for.

-- Relating the phone book to the table, if you have the table phonebooks and you need to find the phone number of Bob Cat, you would perform the following query:

-- SELECT
--     phone_number
-- FROM 
--     phonebooks
-- WHERE 
--     first_name = 'Bob' AND 
--     last_name = 'Cat';

-- It is pretty easy. Although the query is fast, the database has to scan all the rows of the table until it finds the row. If the table has millions of rows, without an index, the data retrieval would take a lot of time to return the result.

-- Introduction to Database Indexes
-- An index is a data structure such as a B-Tree that improves the speed of data retrieval on a table at the cost of additional writes and storage to maintain it.

-- The query optimizer may use indexes to quickly locate data without having to scan every row in a table for a given query.

-- When you create a table with a primary key or unique key, MySQL automatically creates a special index named PRIMARY. This index is called the clustered index.

-- The PRIMARY index is special because the index itself is stored together with the data in the same table. The clustered index enforces the order of rows in the table.

-- Other indexes other than the PRIMARY index are called secondary indexes or non-clustered indexes.

-- MySQL CREATE INDEX statement
-- Typically, you create indexes for a table at the time of creation. For example, the following statement creates a new table with an index that consists of two columns c2 and c3.

-- CREATE TABLE t(
--    c1 INT PRIMARY KEY,
--    c2 INT NOT NULL,
--    c3 INT NOT NULL,
--    c4 VARCHAR(10),
--    INDEX (c2,c3) 
-- );

-- To add an index for a column or a set of columns, you use the CREATE INDEX statement as follows:

-- CREATE INDEX index_name 
-- ON table_name (column_list)

-- To create an index for a column or a list of columns, you specify the index name, the table to which the index belongs, and the column list.

-- For example, to add a new index for the column c4, you use the following statement:

CREATE INDEX idx_c4 ON t(c4);

use classicmodels;

explain SELECT 
    employeeNumber, 
    lastName, 
    firstName
FROM
    employees
WHERE
    jobTitle = 'Sales Rep';

-- 1	SIMPLE	employees		ALL					23	10.00	Using where
create index jobTitle
on employees(jobTitle);
-- done

explain SELECT 
    employeeNumber, 
    lastName, 
    firstName
FROM
    employees
WHERE
    jobTitle = 'Sales Rep';
-- 1	SIMPLE	employees		ref	jobTitle	jobTitle	202	const	17	100.00


show INDEXES from employees;
--  employees	0	PRIMARY	1	employeeNumber	A	23				BTREE			YES	
-- employees	1	reportsTo	1	reportsTo	A	7			YES	BTREE			YES	
-- employees	1	officeCode	1	officeCode	A	7				BTREE			YES	
-- employees	1	jobTitle	1	jobTitle	A	7				BTREE			YES	