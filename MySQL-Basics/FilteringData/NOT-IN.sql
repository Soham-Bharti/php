-- The NOT operator negates the IN operator:
-- value NOT IN (value1, value2, value2)
-- Code language: SQL (Structured Query Language) (sql)
-- The NOT IN operator returns one if the value doesn’t equal any value in the list. Otherwise, it returns 0.
mysql >
SELECT
    1 NOT IN (1, 2, 3);

-- +------------------+
-- | 1 NOT IN (1,2,3) |
-- +------------------+
-- |                0 |
-- +------------------+
-- 1 row in set (0.00 sec)
mysql >
SELECT
    12 NOT IN (1, 2, 3);

-- +-------------------+
-- | 12 NOT IN (1,2,3) |
-- +-------------------+
-- |                 1 |
-- +-------------------+
-- 1 row in set (0.00 sec)


SELECT 
    officeCode, 
    city, 
    phone
FROM
    offices
WHERE
    country NOT IN ('USA' , 'France')
ORDER BY 
    city;

-- +------------+--------+------------------+
-- | officecode | city   | phone            |
-- +------------+--------+------------------+
-- | 7          | London | +44 20 7877 2041 |
-- | 6          | Sydney | +61 2 9264 2451  |
-- | 5          | Tokyo  | +81 33 224 5000  |
-- +------------+--------+------------------+
-- 3 rows in set (0.00 sec)