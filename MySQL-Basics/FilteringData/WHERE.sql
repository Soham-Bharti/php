-- WHERE – learn how to use the WHERE clause to filter rows based on specified conditions
-- SELECT 
--     select_list
-- FROM
--     table_name
-- WHERE
--     search_condition;
-- 1) Using the WHERE clause with equality operator example
SELECT
    lastname,
    firstname,
    jobtitle
FROM
    employees
WHERE
    jobtitle = 'Sales Rep';

-- +-----------+-----------+-----------+
-- | lastName  | firstName | jobtitle  |
-- +-----------+-----------+-----------+
-- | Jennings  | Leslie    | Sales Rep |
-- | Thompson  | Leslie    | Sales Rep |
-- | Firrelli  | Julie     | Sales Rep |
-- | Patterson | Steve     | Sales Rep |
-- | Tseng     | Foon Yue  | Sales Rep |
-- | Vanauf    | George    | Sales Rep |
-- | Bondur    | Loui      | Sales Rep |
-- | Hernandez | Gerard    | Sales Rep |
-- | Castillo  | Pamela    | Sales Rep |
-- | Bott      | Larry     | Sales Rep |
-- | Jones     | Barry     | Sales Rep |
-- | Fixter    | Andy      | Sales Rep |
-- | Marsh     | Peter     | Sales Rep |
-- | King      | Tom       | Sales Rep |
-- | Nishi     | Mami      | Sales Rep |
-- | Kato      | Yoshimi   | Sales Rep |
-- | Gerard    | Martin    | Sales Rep |
-- +-----------+-----------+-----------+
-- 17 rows in set (0.16 sec)
-- 2) Using the WHERE clause with the AND operator
SELECT
    lastName,
    firstName,
    jobTitle,
    officeCode
FROM
    employees
WHERE
    jobtitle = 'Sales rep'
    AND officeCode = 1;

-- +----------+-----------+-----------+------------+
-- | lastName | firstName | jobTitle  | officeCode |
-- +----------+-----------+-----------+------------+
-- | Jennings | Leslie    | Sales Rep | 1          |
-- | Thompson | Leslie    | Sales Rep | 1          |
-- +----------+-----------+-----------+------------+
-- 2 rows in set (0.01 sec)
-- 3) Using MySQL WHERE clause with OR operator
SELECT
    lastName,
    firstName,
    jobTitle,
    officeCode
FROM
    employees
WHERE
    jobtitle = 'Sales rep'
    OR officeCode = 1;

-- +-----------+-----------+--------------------+------------+
-- | lastName  | firstName | jobTitle           | officeCode |
-- +-----------+-----------+--------------------+------------+
-- | Murphy    | Diane     | President          | 1          |
-- | Patterson | Mary      | VP Sales           | 1          |
-- | Firrelli  | Jeff      | VP Marketing       | 1          |
-- | Bow       | Anthony   | Sales Manager (NA) | 1          |
-- | Jennings  | Leslie    | Sales Rep          | 1          |
-- | Thompson  | Leslie    | Sales Rep          | 1          |
-- | Firrelli  | Julie     | Sales Rep          | 2          |
-- | Patterson | Steve     | Sales Rep          | 2          |
-- | Tseng     | Foon Yue  | Sales Rep          | 3          |
-- | Vanauf    | George    | Sales Rep          | 3          |
-- | Bondur    | Loui      | Sales Rep          | 4          |
-- | Hernandez | Gerard    | Sales Rep          | 4          |
-- | Castillo  | Pamela    | Sales Rep          | 4          |
-- | Bott      | Larry     | Sales Rep          | 7          |
-- | Jones     | Barry     | Sales Rep          | 7          |
-- | Fixter    | Andy      | Sales Rep          | 6          |
-- | Marsh     | Peter     | Sales Rep          | 6          |
-- | King      | Tom       | Sales Rep          | 6          |
-- | Nishi     | Mami      | Sales Rep          | 5          |
-- | Kato      | Yoshimi   | Sales Rep          | 5          |
-- | Gerard    | Martin    | Sales Rep          | 4          |
-- +-----------+-----------+--------------------+------------+
-- 21 rows in set (0.00 sec)
-- 4) Using the WHERE clause with the BETWEEN operator example
SELECT
    lastName,
    firstName,
    jobTitle,
    officeCode
FROM
    employees
WHERE
    officeCode between 1
    AND 3
ORDER BY
    officeCode;

-- +-----------+-----------+--------------------+------------+
-- | lastName  | firstName | jobTitle           | officeCode |
-- +-----------+-----------+--------------------+------------+
-- | Murphy    | Diane     | President          | 1          |
-- | Patterson | Mary      | VP Sales           | 1          |
-- | Firrelli  | Jeff      | VP Marketing       | 1          |
-- | Bow       | Anthony   | Sales Manager (NA) | 1          |
-- | Jennings  | Leslie    | Sales Rep          | 1          |
-- | Thompson  | Leslie    | Sales Rep          | 1          |
-- | Firrelli  | Julie     | Sales Rep          | 2          |
-- | Patterson | Steve     | Sales Rep          | 2          |
-- | Tseng     | Foon Yue  | Sales Rep          | 3          |
-- | Vanauf    | George    | Sales Rep          | 3          |
-- +-----------+-----------+--------------------+------------+
-- 10 rows in set (0.03 sec)
SELECT
    lastName,
    firstName,
    jobTitle,
    officeCode
FROM
    employees
WHERE
    officeCode >= 1
    AND officeCode <= 3
ORDER BY
    officeCode;

-- same result as above
-- 5) Using the WHERE clause with the LIKE operator example
SELECT
    firstName,
    lastName
FROM
    employees
WHERE
    lastName LIKE '%son'
ORDER BY
    firstName;

-- +-----------+-----------+
-- | firstName | lastName  |
-- +-----------+-----------+
-- | Leslie    | Thompson  |
-- | Mary      | Patterson |
-- | Steve     | Patterson |
-- | William   | Patterson |
-- +-----------+-----------+
-- 4 rows in set (0.01 sec)
-- 6) Using the WHERE clause with the IN operator example
SELECT
    firstName,
    lastName,
    officeCode
FROM
    employees
WHERE
    officeCode IN (1, 2, 3)
ORDER BY
    officeCode;

-- +-----------+-----------+------------+
-- | firstName | lastName  | officeCode |
-- +-----------+-----------+------------+
-- | Diane     | Murphy    | 1          |
-- | Mary      | Patterson | 1          |
-- | Jeff      | Firrelli  | 1          |
-- | Anthony   | Bow       | 1          |
-- | Leslie    | Jennings  | 1          |
-- | Leslie    | Thompson  | 1          |
-- | Julie     | Firrelli  | 2          |
-- | Steve     | Patterson | 2          |
-- | Foon Yue  | Tseng     | 3          |
-- | George    | Vanauf    | 3          |
-- +-----------+-----------+------------+
-- 10 rows in set (0.00 sec)
-- 7) Using MySQL WHERE clause with the IS NULL operator
SELECT
    lastName,
    firstName,
    reportsTo
FROM
    employees
WHERE
    reportsTo IS NULL;

-- +----------+-----------+-----------+
-- | lastName | firstName | reportsTo |
-- +----------+-----------+-----------+
-- | Murphy   | Diane     |      NULL |
-- +----------+-----------+-----------+
-- 1 row in set (0.02 sec)
-- 8) Using MySQL WHERE clause with comparison operators
-- Operator	Description
-- =	Equal to. You can use it with almost any data type.
-- <> or !=	Not equal to
-- <	Less than. You typically use it with numeric and date/time data types.
-- >	Greater than.
-- <=	Less than or equal to
-- >=	Greater than or equal to
SELECT
    lastname,
    firstname,
    jobtitle
FROM
    employees
WHERE
    jobtitle <> 'Sales Rep';

-- +-----------+-----------+----------------------+
-- | lastname  | firstname | jobtitle             |
-- +-----------+-----------+----------------------+
-- | Murphy    | Diane     | President            |
-- | Patterson | Mary      | VP Sales             |
-- | Firrelli  | Jeff      | VP Marketing         |
-- | Patterson | William   | Sales Manager (APAC) |
-- | Bondur    | Gerard    | Sale Manager (EMEA)  |
-- | Bow       | Anthony   | Sales Manager (NA)   |
-- +-----------+-----------+----------------------+
-- 6 rows in set (0.01 sec)
SELECT
    firstName,
    lastName,
    officeCode
FROM
    employees
WHERE
    officeCode > 5;

-- +-----------+-----------+------------+
-- | firstName | lastName  | officeCode |
-- +-----------+-----------+------------+
-- | William   | Patterson | 6          |
-- | Larry     | Bott      | 7          |
-- | Barry     | Jones     | 7          |
-- | Andy      | Fixter    | 6          |
-- | Peter     | Marsh     | 6          |
-- | Tom       | King      | 6          |
-- +-----------+-----------+------------+
-- 6 rows in set (0.00 sec)
SELECT
    firstName,
    lastName,
    officeCode
FROM
    employees
WHERE
    officeCode <= 4
ORDER BY
    officeCode;

-- +-----------+-----------+------------+
-- | firstName | lastName  | officeCode |
-- +-----------+-----------+------------+
-- | Diane     | Murphy    | 1          |
-- | Mary      | Patterson | 1          |
-- | Jeff      | Firrelli  | 1          |
-- | Anthony   | Bow       | 1          |
-- | Leslie    | Jennings  | 1          |
-- | Leslie    | Thompson  | 1          |
-- | Julie     | Firrelli  | 2          |
-- | Steve     | Patterson | 2          |
-- | Foon Yue  | Tseng     | 3          |
-- | George    | Vanauf    | 3          |
-- | Gerard    | Bondur    | 4          |
-- | Loui      | Bondur    | 4          |
-- | Gerard    | Hernandez | 4          |
-- | Pamela    | Castillo  | 4          |
-- | Martin    | Gerard    | 4          |
-- +-----------+-----------+------------+
-- 15 rows in set (0.00 sec)