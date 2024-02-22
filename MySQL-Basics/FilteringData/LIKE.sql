-- LIKE operator to query data based on a specified pattern
-- expression LIKE pattern ESCAPE escape_character
-- MySQL provides two wildcard characters for constructing patterns: Percentage % and underscore _ .
-- The percentage ( % ) wildcard matches any string of zero or more characters.
-- The underscore ( _ ) wildcard matches any single character.
SELECT
    employeeNumber,
    lastName,
    firstName
FROM
    employees
WHERE
    firstName LIKE 'a%';

-- +----------------+----------+-----------+
-- | employeeNumber | lastName | firstName |
-- +----------------+----------+-----------+
-- |           1143 | Bow      | Anthony   |
-- |           1611 | Fixter   | Andy      |
-- +----------------+----------+-----------+
-- 2 rows in set (0.00 sec)

select
    employeeNumber,
    lastName,
    firstName
from
    employees
where
    lastName LIKE '%on';

-- +----------------+-----------+-----------+
-- | employeeNumber | lastName  | firstName |
-- +----------------+-----------+-----------+
-- |           1056 | Patterson | Mary      |
-- |           1088 | Patterson | William   |
-- |           1166 | Thompson  | Leslie    |
-- |           1216 | Patterson | Steve     |
-- +----------------+-----------+-----------+
-- 4 rows in set (0.00 sec)


-- To check if a string contains a substring, you can use the percentage ( % ) wildcard at the beginning and the end of the substring.
select
    employeeNumber,
    lastName,
    firstName
from
    employees
where
    lastName LIKE '%on%';

-- +----------------+-----------+-----------+
-- | employeeNumber | lastName  | firstName |
-- +----------------+-----------+-----------+
-- |           1056 | Patterson | Mary      |
-- |           1088 | Patterson | William   |
-- |           1102 | Bondur    | Gerard    |
-- |           1166 | Thompson  | Leslie    |
-- |           1216 | Patterson | Steve     |
-- |           1337 | Bondur    | Loui      |
-- |           1504 | Jones     | Barry     |
-- +----------------+-----------+-----------+
-- 7 rows in set (0.00 sec)


-- 2) Using MySQL LIKE operator with an underscore( _ ) wildcard examples
-- To find employees whose first names start with the letter T , end with the letter m, and contain any single character between e.g., Tom , Tim, you use the underscore (_) wildcard to construct the pattern as follows:
select
    employeeNumber,
    lastName,
    firstName
from
    employees
where
    firstName LIKE 't_m';

--  +----------------+----------+-----------+
-- | employeeNumber | lastName | firstName |
-- +----------------+----------+-----------+
-- |           1619 | King     | Tom       |
-- +----------------+----------+-----------+
-- 1 row in set (0.00 sec)


-- 3) Using MySQL NOT LIKE operator example
SELECT
    employeeNumber,
    lastName,
    firstName
FROM
    employees
WHERE
    lastName NOT LIKE 'B%';

-- +----------------+-----------+-----------+
-- | employeeNumber | lastName  | firstName |
-- +----------------+-----------+-----------+
-- |           1002 | Murphy    | Diane     |
-- |           1056 | Patterson | Mary      |
-- |           1076 | Firrelli  | Jeff      |
-- |           1088 | Patterson | William   |
-- |           1165 | Jennings  | Leslie    |
-- |           1166 | Thompson  | Leslie    |
-- |           1188 | Firrelli  | Julie     |
-- |           1216 | Patterson | Steve     |
-- |           1286 | Tseng     | Foon Yue  |
-- |           1323 | Vanauf    | George    |
-- |           1370 | Hernandez | Gerard    |
-- |           1401 | Castillo  | Pamela    |
-- |           1504 | Jones     | Barry     |
-- |           1611 | Fixter    | Andy      |
-- |           1612 | Marsh     | Peter     |
-- |           1619 | King      | Tom       |
-- |           1621 | Nishi     | Mami      |
-- |           1625 | Kato      | Yoshimi   |
-- |           1702 | Gerard    | Martin    |
-- +----------------+-----------+-----------+
-- 19 rows in set (0.00 sec)

select
    employeeNumber,
    lastName,
    firstName
from
    employees
where
    firstName LIKE 'M___i';

-- Empty set (0.00 sec)
select
    employeeNumber,
    lastName,
    firstName
from
    employees
where
    firstName LIKE 'M___i%';

-- +----------------+----------+-----------+
-- | employeeNumber | lastName | firstName |
-- +----------------+----------+-----------+
-- |           1702 | Gerard   | Martin    |
-- +----------------+----------+-----------+
-- 1 row in set (0.00 sec)



-- ###############################################################
-- MySQL LIKE operator with the ESCAPE clause
-- Sometimes the pattern may contain the wildcard characters e.g., 10%, _20, etc.
-- In this case, you can use the ESCAPE clause to specify the escape character so that the LIKE operator interprets the wildcard character as a literal character.
-- If you don’t specify the escape character explicitly, the backslash character (\) is the default escape character.
-- For example, if you want to find products whose product codes contain the string _20 , you can use the pattern %\_20% with the default escape character:
select
    productCode,
    productName
from
    products
where
    productCode LIKE '%\_20%';

-- +-------------+-------------------------------------------+
-- | productCode | productName                               |
-- +-------------+-------------------------------------------+
-- | S10_2016    | 1996 Moto Guzzi 1100i                     |
-- | S24_2000    | 1960 BSA Gold Star DBD34                  |
-- | S24_2011    | 18th century schooner                     |
-- | S24_2022    | 1938 Cadillac V-16 Presidential Limousine |
-- | S700_2047   | HMS Bounty                                |
-- +-------------+-------------------------------------------+
-- 5 rows in set (0.00 sec)
-- Alternatively, you can specify a different escape character e.g., $ using the ESCAPE clause:
select
    productCode,
    productName
from
    products
where
    productCode LIKE '%$_20%' ESCAPE '$';

--  +-------------+-------------------------------------------+
-- | productCode | productName                               |
-- +-------------+-------------------------------------------+
-- | S10_2016    | 1996 Moto Guzzi 1100i                     |
-- | S24_2000    | 1960 BSA Gold Star DBD34                  |
-- | S24_2011    | 18th century schooner                     |
-- | S24_2022    | 1938 Cadillac V-16 Presidential Limousine |
-- | S700_2047   | HMS Bounty                                |
-- +-------------+-------------------------------------------+
-- 5 rows in set (0.00 sec)

-- select productCode, productName from products where productCode LIKE '%^&_20%' ESCAPE '^&';
-- ERROR 1210 (HY000): Incorrect arguments to ESCAPE


-- Use the LIKE operator to test if a value matches a pattern.
-- The % wildcard matches zero or more characters.
-- The _ wildcard matches a single character.
-- Use ESCAPE clause specifies an escape character other than the default escape character (\).
-- Use the NOT operator to negate the LIKE operator.