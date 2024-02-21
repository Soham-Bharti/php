-- SELECT – learn how to use the SELECT statement without referencing a table.
-- SELECT select_list;
SELECT
    1 + 1;

-- +-------+
-- | 1 + 1 |
-- +-------+
-- |     2 |
-- +-------+
-- 1 row in set (0.00 sec)    
-- MySQL has many built-in functions like string functions, date functions, and math functions. You can use the SELECT statement to execute one of these functions.
SELECT
    NOW();

-- +---------------------+
-- | now()               |
-- +---------------------+
-- | 2024-02-21 11:23:59 |
-- +---------------------+
-- 1 row in set (0.00 sec)
-- The CONCAT() function accepts one or more strings and concatenates them into a single string.
select
    concat('soham', ' ', 'bharti');

-- +--------------------------------+
-- | concat('soham', ' ', 'bharti') |
-- +--------------------------------+
-- | soham bharti                   |
-- +--------------------------------+
-- 1 row in set (0.00 sec)
select
    concat('soham', '--', 'bharti', '--');

-- +--------------------------------------+
-- | concat('soham','--', 'bharti', '--') |
-- +--------------------------------------+
-- | soham--bharti--                      |
-- +--------------------------------------+
-- 1 row in set (0.00 sec)
-- Column alias
-- SELECT expression AS column_alias;
select
    concat('soham', '--', 'bharti', '--') AS Name;

-- +-----------------+
-- | Name            |
-- +-----------------+
-- | soham--bharti-- |
-- +-----------------+
-- 1 row in set (0.00 sec)
select
    city AS CITIES
from
    customers
limit
    5;

-- +-----------+
-- | CITIES    |
-- +-----------+
-- | Nantes    |
-- | Las Vegas |
-- | Melbourne |
-- | Nantes    |
-- | Stavern   |
-- +-----------+
-- 5 rows in set (0.00 sec)

