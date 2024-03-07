-- Listing stored procedures using SHOW PROCEDURE STATUS statement
-- Here is the basic syntax of the SHOW PROCEDURE STATUS statement:

SHOW PROCEDURE STATUS [LIKE 'pattern' | WHERE search_condition]

-- The SHOW PROCEDURE STATUS statement shows all characteristics of stored procedures including stored procedure names. It returns stored procedures that you have the privilege to access.

-- For example, the following statement shows all stored procedures in the current MySQL server:

SHOW PROCEDURE STATUS;
-- classicmodels	CreatePersonTable	PROCEDURE	root@localhost	2024-03-07 11:10:16	2024-03-07 11:10:16	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getAllCustomers	PROCEDURE	root@localhost	2024-03-07 11:23:03	2024-03-07 11:23:03	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetCustomers	PROCEDURE	root@localhost	2024-03-07 10:10:27	2024-03-07 10:10:27	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetEmployees	PROCEDURE	root@localhost	2024-03-07 12:31:16	2024-03-07 12:30:33	DEFINER	Get employees	utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getOfficeByCountry	PROCEDURE	root@localhost	2024-03-07 11:38:08	2024-03-07 11:38:08	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetOrderCountByStatus	PROCEDURE	root@localhost	2024-03-07 11:46:22	2024-03-07 11:46:22	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getTotalOrders	PROCEDURE	root@localhost	2024-03-07 12:44:31	2024-03-07 12:44:31	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	setCounter	PROCEDURE	root@localhost	2024-03-07 11:57:02	2024-03-07 11:57:02	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- hr	get_employee	PROCEDURE	root@localhost	2024-02-27 11:54:54	2024-02-27 11:54:54	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- sys	create_synonym_db	PROCEDURE	mysql.sys@localhost	2024-02-21 10:43:19	2024-02-21 10:43:19	INVOKER	
--  Description
--  -----------
 
--  Takes a source database name and synonym name, and then creates the 
--  synonym database with views that point to all of the tables within
--  the source database.
 
--  Useful for creating a "ps" synonym for "performance_schema",
--  or "is" i...	utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
--  .....


SHOW PROCEDURE STATUS 
WHERE search_condition;
-- For example, this statement lists all stored procedures in the sample database classicmodels:

SHOW PROCEDURE STATUS WHERE db = 'classicmodels';
-- classicmodels	CreatePersonTable	PROCEDURE	root@localhost	2024-03-07 11:10:16	2024-03-07 11:10:16	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getAllCustomers	PROCEDURE	root@localhost	2024-03-07 11:23:03	2024-03-07 11:23:03	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetCustomers	PROCEDURE	root@localhost	2024-03-07 10:10:27	2024-03-07 10:10:27	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetEmployees	PROCEDURE	root@localhost	2024-03-07 12:31:16	2024-03-07 12:30:33	DEFINER	Get employees	utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getOfficeByCountry	PROCEDURE	root@localhost	2024-03-07 11:38:08	2024-03-07 11:38:08	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	GetOrderCountByStatus	PROCEDURE	root@localhost	2024-03-07 11:46:22	2024-03-07 11:46:22	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getTotalOrders	PROCEDURE	root@localhost	2024-03-07 12:44:31	2024-03-07 12:44:31	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	setCounter	PROCEDURE	root@localhost	2024-03-07 11:57:02	2024-03-07 11:57:02	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- In case you want to find stored procedures whose names contain a specific word, you can use the LIKE clause as follows:

-- SHOW PROCEDURE STATUS LIKE '%pattern%'
-- The following statement shows all stored procedures whose names contain the word Order:

SHOW PROCEDURE STATUS LIKE '%Order%'
-- classicmodels	GetOrderCountByStatus	PROCEDURE	root@localhost	2024-03-07 11:46:22	2024-03-07 11:46:22	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci
-- classicmodels	getTotalOrders	PROCEDURE	root@localhost	2024-03-07 12:44:31	2024-03-07 12:44:31	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci


-- Listing stored procedures using the data dictionary
-- The routines table in the information_schema database contains all information on the stored procedures and stored functions of all databases in the current MySQL server.

-- To show all stored procedures of a particular database, you use the following query:

-- SELECT 
--     routine_name
-- FROM
--     information_schema.routines
-- WHERE
--     routine_type = 'PROCEDURE'
--         AND routine_schema = '<database_name>';

-- For example, this statement lists all stored procedures in the classicmodels database:

SELECT 
    routine_name
FROM
    information_schema.routines
WHERE
    routine_type = 'PROCEDURE'
        AND routine_schema = 'classicmodels';
-- ROUTINE_NAME
-- CreatePersonTable
-- getAllCustomers
-- GetCustomers
-- GetEmployees
-- getOfficeByCountry
-- GetOrderCountByStatus
-- getTotalOrders
-- setCounter