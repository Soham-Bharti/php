-- The LIMIT clause is used in the SELECT statement to constrain the number of rows to return. The LIMIT clause accepts one or two arguments. The values of both arguments must be zero or positive integers.
-- The following illustrates the LIMIT clause syntax with two arguments:
-- SELECT 
--     select_list
-- FROM
--     table_name
-- LIMIT [offset,] row_count;
-- Code language: SQL (Structured Query Language) (sql)
-- In this syntax:
-- The offset specifies the offset of the first row to return. The offset of the first row is 0, not 1.
-- The row_count specifies the maximum number of rows to return.
-- SELECT 
--     select_list
-- FROM 
--     table_name
-- ORDER BY 
--     sort_expression
-- LIMIT offset, row_count;
select
    customerNumber,
    customerName,
    creditLimit
from
    customers
order by
    creditlimit desc
limit
    5;

--  +----------------+------------------------------+-------------+
-- | customerNumber | customerName                 | creditLimit |
-- +----------------+------------------------------+-------------+
-- |            141 | Euro+ Shopping Channel       |   227600.00 |
-- |            124 | Mini Gifts Distributors Ltd. |   210500.00 |
-- |            298 | Vida Sport, Ltd              |   141300.00 |
-- |            151 | Muscle Machine Inc           |   138500.00 |
-- |            187 | AV Stores, Co.               |   136800.00 |
-- +----------------+------------------------------+-------------+
-- 5 rows in set (0.00 sec)
select
    customerNumber,
    customerName,
    creditLimit
from
    customers
order by
    creditlimit
limit
    5;

-- +----------------+----------------------------+-------------+
-- | customerNumber | customerName               | creditLimit |
-- +----------------+----------------------------+-------------+
-- |            223 | Nat├╝rlich Autos           |        0.00 |
-- |            168 | American Souvenirs Inc     |        0.00 |
-- |            169 | Porto Imports Co.          |        0.00 |
-- |            206 | Asian Shopping Network, Co |        0.00 |
-- |            125 | Havel & Zbyszek Co         |        0.00 |
-- +----------------+----------------------------+-------------+
-- 5 rows in set (0.00 sec)
-- 2) Using MySQL LIMIT clause for pagination
-- When you display data on the screen, you often want to divide rows into pages, where each page contains a limited number of rows like 10 or 20.
-- To calculate the number of pages, you take the total rows divided by the number of rows per page. For fetching rows of a specific page, you can use the LIMIT clause.
-- This query uses the COUNT(*) aggregate function to get the total rows from the customers table:
select
    count(*)
from
    customers;

-- +----------+
-- | count(*) |
-- +----------+
-- |      122 |
-- +----------+
-- 1 row in set (0.03 sec)
-- Suppose that each page has 10 rows; to display 122 customers, you have 13 pages. The last 13th page contains two rows only.
-- This query uses the LIMIT clause to get rows of page 1 which contains the first 10 customers sorted by the customer name:
select
    customerNumber,
    customerName
from
    customers
order by
    customerName
limit
    10;

-- +----------------+------------------------------+
-- | customerNumber | customerName                 |
-- +----------------+------------------------------+
-- |            242 | Alpha Cognac                 |
-- |            168 | American Souvenirs Inc       |
-- |            249 | Amica Models & Co.           |
-- |            237 | ANG Resellers                |
-- |            276 | Anna's Decorations, Ltd      |
-- |            465 | Anton Designs, Ltd.          |
-- |            206 | Asian Shopping Network, Co   |
-- |            348 | Asian Treasures, Inc.        |
-- |            103 | Atelier graphique            |
-- |            471 | Australian Collectables, Ltd |
-- +----------------+------------------------------+
-- 10 rows in set (0.00 sec)
-- This query uses the LIMIT clause to get the rows of the second page that include rows 11 – 20:
select
    customerNumber,
    customerName
from
    customers
order by
    customerName
limit
    10, 10;

-- +----------------+------------------------------------+
-- | customerNumber | customerName                       |
-- +----------------+------------------------------------+
-- |            114 | Australian Collectors, Co.         |
-- |            333 | Australian Gift Network, Co        |
-- |            256 | Auto Associ├®s & Cie.              |
-- |            406 | Auto Canal+ Petit                  |
-- |            198 | Auto-Moto Classics Inc.            |
-- |            187 | AV Stores, Co.                     |
-- |            121 | Baane Mini Imports                 |
-- |            415 | Bavarian Collectables Imports, Co. |
-- |            293 | BG&E Collectables                  |
-- |            128 | Blauer See Auto, Co.               |
-- +----------------+------------------------------------+
-- 10 rows in set (0.00 sec)
-- 3) Using MySQL LIMIT to get the nth highest or lowest value
-- For example, the following finds the customer who has the second-highest credit:
SELECT
    customerName,
    creditLimit
FROM
    customers
ORDER BY
    creditLimit DESC
LIMIT
    1, 1;

-- +------------------------------+-------------+
-- | customerName                 | creditLimit |
-- +------------------------------+-------------+
-- | Mini Gifts Distributors Ltd. |   210500.00 |
-- +------------------------------+-------------+
-- 1 row in set (0.00 sec)
-- MySQL LIMIT & DISTINCT clauses
select
    distinct state
from
    customers
where
    state is not null
limit
    9;

-- +----------+
-- | state    |
-- +----------+
-- | NV       |
-- | Victoria |
-- | CA       |
-- | NY       |
-- | PA       |
-- | CT       |
-- | MA       |
-- | Osaka    |
-- | BC       |
-- +----------+
-- 9 rows in set (0.00 sec)
select
    distinct state
from
    customers
where
    state is not null
limit
    900;

-- +---------------+
-- | state         |
-- +---------------+
-- | NV            |
-- | Victoria      |
-- | CA            |
-- | NY            |
-- | PA            |
-- | CT            |
-- | MA            |
-- | Osaka         |
-- | BC            |
-- | Qu├®bec       |
-- | Isle of Wight |
-- | NSW           |
-- | NJ            |
-- | Queensland    |
-- | Co. Cork      |
-- | Pretoria      |
-- | NH            |
-- | Tokyo         |
-- +---------------+
-- 18 rows in set (0.00 sec)