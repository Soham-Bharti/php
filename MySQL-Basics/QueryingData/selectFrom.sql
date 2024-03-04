-- SELECT FROM – show you how to use a simple SELECT FROM statement to query the data from a single table.

-- SELECT
--     select_list
-- FROM
--     table_name;

-- or
-- select
--     select_list
-- from
--     table_name;

mysql > use classicmodels;

Database changed mysql > show tables;

-- | Tables_in_classicmodels |
-- +-------------------------+
-- | customers               |
-- | employees               |
-- | offices                 |
-- | orderdetails            |
-- | orders                  |
-- | payments                |
-- | productlines            |
-- | products                |
select
    *
from
    customers;

-- 122 rows in set (0.00 sec)
-- 1) Using the SELECT FROM statement to retrieve data from a single column example
SELECT
    lastName
FROM
    employees;

-- +-----------+
-- | lastname  |
-- +-----------+
-- | Murphy    |
-- | Patterson |
-- | Firrelli  |
-- | Patterson |
-- | Bondur    |
-- | Bow       |
-- | Jennings  |
-- | Thompson  |
-- | Firrelli  |
-- | Patterson |
-- | Tseng     |
-- | Vanauf    |
-- | Bondur    |
-- | Hernandez |
-- | Castillo  |
-- | Bott      |
-- | Jones     |
-- | Fixter    |
-- | Marsh     |
-- | King      |
-- | Nishi     |
-- | Kato      |
-- | Gerard    |
-- +-----------+
-- 23 rows in set (0.00 sec)
-- 2) Using the SELECT FROM statement to query data from multiple columns example
SELECT
    lastName,
    firstName,
    jobTitle
FROM
    employees;

--     +-----------+-----------+----------------------+
-- | lastname  | firstname | jobtitle             |
-- +-----------+-----------+----------------------+
-- | Murphy    | Diane     | President            |
-- | Patterson | Mary      | VP Sales             |
-- | Firrelli  | Jeff      | VP Marketing         |
-- | Patterson | William   | Sales Manager (APAC) |
-- | Bondur    | Gerard    | Sale Manager (EMEA)  |
-- | Bow       | Anthony   | Sales Manager (NA)   |
-- | Jennings  | Leslie    | Sales Rep            |
-- | Thompson  | Leslie    | Sales Rep            |
-- | Firrelli  | Julie     | Sales Rep            |
-- | Patterson | Steve     | Sales Rep            |
-- | Tseng     | Foon Yue  | Sales Rep            |
-- | Vanauf    | George    | Sales Rep            |
-- | Bondur    | Loui      | Sales Rep            |
-- | Hernandez | Gerard    | Sales Rep            |
-- | Castillo  | Pamela    | Sales Rep            |
-- | Bott      | Larry     | Sales Rep            |
-- | Jones     | Barry     | Sales Rep            |
-- | Fixter    | Andy      | Sales Rep            |
-- | Marsh     | Peter     | Sales Rep            |
-- | King      | Tom       | Sales Rep            |
-- | Nishi     | Mami      | Sales Rep            |
-- | Kato      | Yoshimi   | Sales Rep            |
-- | Gerard    | Martin    | Sales Rep            |
-- +-----------+-----------+----------------------+
-- 23 rows in set (0.00 sec)


-- 3) Using the SELECT FROM statement to retrieve data from all columns example
mysql> select * from employees;
-- +----------------+-----------+-----------+-----------+---------------------------------+------------+-----------+----------------------+
-- | employeeNumber | lastName  | firstName | extension | email                           | officeCode | reportsTo | jobTitle             |
-- +----------------+-----------+-----------+-----------+---------------------------------+------------+-----------+----------------------+
-- |           1002 | Murphy    | Diane     | x5800     | dmurphy@classicmodelcars.com    | 1          |      NULL | President            |
-- |           1056 | Patterson | Mary      | x4611     | mpatterso@classicmodelcars.com  | 1          |      1002 | VP Sales             |
-- |           1076 | Firrelli  | Jeff      | x9273     | jfirrelli@classicmodelcars.com  | 1          |      1002 | VP Marketing         |
-- |           1088 | Patterson | William   | x4871     | wpatterson@classicmodelcars.com | 6          |      1056 | Sales Manager (APAC) |
-- |           1102 | Bondur    | Gerard    | x5408     | gbondur@classicmodelcars.com    | 4          |      1056 | Sale Manager (EMEA)  |
-- |           1143 | Bow       | Anthony   | x5428     | abow@classicmodelcars.com       | 1          |      1056 | Sales Manager (NA)   |
-- |           1165 | Jennings  | Leslie    | x3291     | ljennings@classicmodelcars.com  | 1          |      1143 | Sales Rep            |
-- |           1166 | Thompson  | Leslie    | x4065     | lthompson@classicmodelcars.com  | 1          |      1143 | Sales Rep            |
-- |           1188 | Firrelli  | Julie     | x2173     | jfirrelli@classicmodelcars.com  | 2          |      1143 | Sales Rep            |
-- |           1216 | Patterson | Steve     | x4334     | spatterson@classicmodelcars.com | 2          |      1143 | Sales Rep            |
-- |           1286 | Tseng     | Foon Yue  | x2248     | ftseng@classicmodelcars.com     | 3          |      1143 | Sales Rep            |
-- |           1323 | Vanauf    | George    | x4102     | gvanauf@classicmodelcars.com    | 3          |      1143 | Sales Rep            |
-- |           1337 | Bondur    | Loui      | x6493     | lbondur@classicmodelcars.com    | 4          |      1102 | Sales Rep            |
-- |           1370 | Hernandez | Gerard    | x2028     | ghernande@classicmodelcars.com  | 4          |      1102 | Sales Rep            |
-- |           1401 | Castillo  | Pamela    | x2759     | pcastillo@classicmodelcars.com  | 4          |      1102 | Sales Rep            |
-- |           1501 | Bott      | Larry     | x2311     | lbott@classicmodelcars.com      | 7          |      1102 | Sales Rep            |
-- |           1504 | Jones     | Barry     | x102      | bjones@classicmodelcars.com     | 7          |      1102 | Sales Rep            |
-- |           1611 | Fixter    | Andy      | x101      | afixter@classicmodelcars.com    | 6          |      1088 | Sales Rep            |
-- |           1612 | Marsh     | Peter     | x102      | pmarsh@classicmodelcars.com     | 6          |      1088 | Sales Rep            |
-- |           1619 | King      | Tom       | x103      | tking@classicmodelcars.com      | 6          |      1088 | Sales Rep            |
-- |           1621 | Nishi     | Mami      | x101      | mnishi@classicmodelcars.com     | 5          |      1056 | Sales Rep            |
-- |           1625 | Kato      | Yoshimi   | x102      | ykato@classicmodelcars.com      | 5          |      1621 | Sales Rep            |
-- |           1702 | Gerard    | Martin    | x2312     | mgerard@classicmodelcars.com    | 4          |      1102 | Sales Rep            |
-- +----------------+-----------+-----------+-----------+---------------------------------+------------+-----------+----------------------+


-- Summary
-- Use the SELECT FROM statement to select data from a table.
-- Use the SELECT * to select data from all columns of a table.