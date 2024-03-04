-- The IN operator allows you to determine if a value matches any value in a list of values. Here’s the syntax of the IN operator:
-- value IN (value1, value2, value3,...)
SELECT
    1 IN (1, 2, 3, 1, 1, 1, 1, 1, 1, 1);

-- +----------------------------+
-- | 1 IN (1,2,3,1,1,1,1,1,1,1) |
-- +----------------------------+
-- |                          1 |
-- +----------------------------+
-- 1 row in set (0.00 sec)
-- MySQL IN operator and NULL
mysql >
select
    null in (1, 2, 3, 4, 5, 6, 7, null);

-- +------------------------------+
-- | null in (1,2,3,4,5,6,7,null) |
-- +------------------------------+
-- |                         NULL |
-- +------------------------------+
-- 1 row in set (0.00 sec)
mysql >
select
    null in (1, 2, 3, 4, 5, 6, 7);

-- +-------------------------+
-- | null in (1,2,3,4,5,6,7) |
-- +-------------------------+
-- |                    NULL |
-- +-------------------------+
-- 1 row in set (0.00 sec)
SELECT
    officecode,
    city,
    phone,
    country
FROM
    offices
WHERE
    country IN ('USA', 'France');

-- +------------+---------------+-----------------+---------+
-- | officecode | city          | phone           | country |
-- +------------+---------------+-----------------+---------+
-- | 1          | San Francisco | +1 650 219 4782 | USA     |
-- | 2          | Boston        | +1 215 837 0825 | USA     |
-- | 3          | NYC           | +1 212 555 3000 | USA     |
-- | 4          | Paris         | +33 14 723 4404 | France  |
-- +------------+---------------+-----------------+---------+
-- 4 rows in set (0.00 sec)