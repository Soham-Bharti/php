-- SELECT DISTINCT – show you how to use the DISTINCT operator in the SELECT statement to eliminate duplicate rows in a result set
-- SELECT DISTINCT
--     select_list
-- FROM
--     table_name
-- WHERE 
--     search_condition
-- ORDER BY 
--     sort_expression;
SELECT
    lastName
from
    Employees
ORDER BY
    lastName;

-- +-----------+
-- | lastName  |
-- +-----------+
-- | Bondur    |
-- | Bondur    |
-- | Bott      |
-- | Bow       |
-- | Castillo  |
-- | Firrelli  |
-- | Firrelli  |
-- | Fixter    |
-- | Gerard    |
-- | Hernandez |
-- | Jennings  |
-- | Jones     |
-- | Kato      |
-- | King      |
-- | Marsh     |
-- | Murphy    |
-- | Nishi     |
-- | Patterson |
-- | Patterson |
-- | Patterson |
-- | Thompson  |
-- | Tseng     |
-- | Vanauf    |
-- +-----------+
-- 23 rows in set (0.01 sec)
SELECT
    DISTINCT lastName
from
    Employees
ORDER BY
    lastName;

-- +-----------+
-- | lastName  |
-- +-----------+
-- | Bondur    |
-- | Bott      |
-- | Bow       |
-- | Castillo  |
-- | Firrelli  |
-- | Fixter    |
-- | Gerard    |
-- | Hernandez |
-- | Jennings  |
-- | Jones     |
-- | Kato      |
-- | King      |
-- | Marsh     |
-- | Murphy    |
-- | Nishi     |
-- | Patterson |
-- | Thompson  |
-- | Tseng     |
-- | Vanauf    |
-- +-----------+
-- 19 rows in set (0.36 sec)
-- MySQL DISTINCT and NULL values
-- When you specify a column that has NULL values in the DISTINCT clause, the DISTINCT clause will keep only one NULL value because it considers all NULL values are the same.
SELECT
    DISTINCT state
FROM
    customers;

-- +---------------+
-- | state         |
-- +---------------+
-- | NULL          |
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
-- 19 rows in set (0.01 sec)
-- MySQL DISTINCT with multiple columns
-- When you specify multiple columns in the DISTINCT clause, the DISTINCT clause will use the combination of values in these columns to determine the uniqueness of the row in the result set.
mysql >
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state <> NULL
ORDER BY
    state,
    city;

Empty
set
    (0.00 sec) mysql >
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state != NULL
ORDER BY
    state,
    city;

Empty
set
    (0.00 sec) mysql >
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state is not NULL
ORDER BY
    state,
    city;

-- +---------------+----------------+
-- | state         | city           |
-- +---------------+----------------+
-- | BC            | Tsawassen      |
-- | BC            | Vancouver      |
-- | CA            | Brisbane       |
-- | CA            | Burbank        |
-- | CA            | Burlingame     |
-- | CA            | Glendale       |
-- | CA            | Los Angeles    |
-- | CA            | Pasadena       |
-- | CA            | San Diego      |
-- | CA            | San Francisco  |
-- | CA            | San Jose       |
-- | CA            | San Rafael     |
-- | Co. Cork      | Cork           |
-- | CT            | Bridgewater    |
-- | CT            | Glendale       |
-- | CT            | New Haven      |
-- | Isle of Wight | Cowes          |
-- | MA            | Boston         |
-- | MA            | Brickhaven     |
-- | MA            | Cambridge      |
-- | MA            | New Bedford    |
-- | NH            | Nashua         |
-- | NJ            | Newark         |
-- | NSW           | Chatswood      |
-- | NSW           | North Sydney   |
-- | NV            | Las Vegas      |
-- | NY            | NYC            |
-- | NY            | White Plains   |
-- | Osaka         | Kita-ku        |
-- | PA            | Allentown      |
-- | PA            | Philadelphia   |
-- | Pretoria      | Hatfield       |
-- | Qu├®bec       | Montr├®al      |
-- | Queensland    | South Brisbane |
-- | Tokyo         | Minato-ku      |
-- | Victoria      | Glen Waverly   |
-- | Victoria      | Melbourne      |
-- +---------------+----------------+
-- 37 rows in set (0.00 sec)
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state is not NULL
ORDER BY
    state,
    city;

-- or
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state <> 'NULL'
ORDER BY
    state,
    city;

-- or
SELECT
    DISTINCT state,
    city
FROM
    customers
WHERE
    state != 'NULL'
ORDER BY
    state,
    city;

-- +---------------+----------------+
-- | state         | city           |
-- +---------------+----------------+
-- | BC            | Tsawassen      |
-- | BC            | Vancouver      |
-- | CA            | Brisbane       |
-- | CA            | Burbank        |
-- | CA            | Burlingame     |
-- | CA            | Glendale       |
-- | CA            | Los Angeles    |
-- | CA            | Pasadena       |
-- | CA            | San Diego      |
-- | CA            | San Francisco  |
-- | CA            | San Jose       |
-- | CA            | San Rafael     |
-- | Co. Cork      | Cork           |
-- | CT            | Bridgewater    |
-- | CT            | Glendale       |
-- | CT            | New Haven      |
-- | Isle of Wight | Cowes          |
-- | MA            | Boston         |
-- | MA            | Brickhaven     |
-- | MA            | Cambridge      |
-- | MA            | New Bedford    |
-- | NH            | Nashua         |
-- | NJ            | Newark         |
-- | NSW           | Chatswood      |
-- | NSW           | North Sydney   |
-- | NV            | Las Vegas      |
-- | NY            | NYC            |
-- | NY            | White Plains   |
-- | Osaka         | Kita-ku        |
-- | PA            | Allentown      |
-- | PA            | Philadelphia   |
-- | Pretoria      | Hatfield       |
-- | Qu├®bec       | Montr├®al      |
-- | Queensland    | South Brisbane |
-- | Tokyo         | Minato-ku      |
-- | Victoria      | Glen Waverly   |
-- | Victoria      | Melbourne      |
-- +---------------+----------------+
-- 37 rows in set (0.01 sec)
SELECT
    DISTINCT state
FROM
    customers;

-- +---------------+
-- | state         |
-- +---------------+
-- | NULL          |
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
-- 19 rows in set (0.00 sec)