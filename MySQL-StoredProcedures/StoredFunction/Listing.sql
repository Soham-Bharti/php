--  how to show stored functions from databases by using the SHOW FUNCTION STATUS or querying the data dictionary.

-- Listing stored functions using SHOW FUNCTION STATUS statement
-- The SHOW FUNCTION STATUS is like the SHOW PROCEDURE STATUS but for the stored functions.

-- Here is the basic syntax of the SHOW FUNCTION STATUS statement:
-- SHOW FUNCTION STATUS 
-- [LIKE 'pattern' | WHERE search_condition];

-- The SHOW FUNCTION STATUS statement returns all characteristics of stored functions. The following statement shows all stored functions in the current MySQL server:

SHOW FUNCTION STATUS;

-- Note that the SHOW FUNCTION STATUS only shows the function that you have a privilege to access.

-- If you just want to show stored functions in a particular database, you can use a WHERE clause in the  SHOW FUNCTION STATUS as shown in the following statement:

-- SHOW FUNCTION STATUS 
-- WHERE search_condition;

-- For example, this statement shows all stored functions in the sample database classicmodels:

SHOW FUNCTION STATUS 
WHERE db = 'classicmodels';
-- classicmodels	CustomerLevel	FUNCTION	root@localhost	2024-03-07 18:38:36	2024-03-07 18:38:36	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci

-- If you want to find the stored functions whose names contain a specific word, you can use the LIKE clause:

-- SHOW FUNCTION STATUS 
-- LIKE '%pattern%';

-- The following statement shows all stored functions whose names contain the word Customer:

SHOW FUNCTION STATUS LIKE '%Customer%';
-- classicmodels	CustomerLevel	FUNCTION	root@localhost	2024-03-07 18:38:36	2024-03-07 18:38:36	DEFINER		utf8mb4	utf8mb4_0900_ai_ci	utf8mb4_0900_ai_ci


-- Listing stored functions using the data dictionary
-- MySQL data dictionary has a routines table that stores information about the stored functions of all databases in the current MySQL server.

-- This query finds all stored functions in a particular database:

-- SELECT 
--     routine_name
-- FROM
--     information_schema.routines
-- WHERE
--     routine_type = 'FUNCTION'
--         AND routine_schema = '<database_name>';

-- For example, the following statement returns all stored functions in the classicmodels database:

SELECT 
    routine_name
FROM
    information_schema.routines
WHERE
    routine_type = 'FUNCTION'
        AND routine_schema = 'classicmodels';
-- CustomerLevel