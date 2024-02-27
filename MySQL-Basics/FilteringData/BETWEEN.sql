--  BETWEEN operator to determine whether a value is in a range of values.
-- The BETWEEN operator is a logical operator that specifies whether a value is in a range or not. Here’s the syntax of the BETWEEN operator:
-- value BETWEEN low AND high;
-- Code language: SQL (Structured Query Language) (sql)
-- The BETWEEN operator returns 1 if:
-- value >= low AND value <= high
SELECT
    productCode,
    productName,
    buyPrice
FROM
    products
WHERE
    buyPrice BETWEEN 90
    AND 100;

-- +-------------+--------------------------------------+----------+
-- | productCode | productName                          | buyPrice |
-- +-------------+--------------------------------------+----------+
-- | S10_1949    | 1952 Alpine Renault 1300             |    98.58 |
-- | S10_4698    | 2003 Harley-Davidson Eagle Drag Bike |    91.02 |
-- | S12_1099    | 1968 Ford Mustang                    |    95.34 |
-- | S12_1108    | 2001 Ferrari Enzo                    |    95.59 |
-- | S18_1984    | 1995 Honda Civic                     |    93.89 |
-- | S18_4027    | 1970 Triumph Spitfire                |    91.92 |
-- | S24_3856    | 1956 Porsche 356A Coupe              |    98.30 |
-- +-------------+--------------------------------------+----------+
-- 7 rows in set (0.00 sec)
SELECT
    productCode,
    productName,
    buyPrice
FROM
    products
WHERE
    buyPrice NOT BETWEEN 20
    AND 100;

-- +-------------+-------------------------------------+----------+
-- | productCode | productName                         | buyPrice |
-- +-------------+-------------------------------------+----------+
-- | S10_4962    | 1962 LanciaA Delta 16V              |   103.42 |
-- | S18_2238    | 1998 Chrysler Plymouth Prowler      |   101.51 |
-- | S24_2840    | 1958 Chevy Corvette Limited Edition |    15.91 |
-- | S24_2972    | 1982 Lamborghini Diablo             |    16.24 |
-- +-------------+-------------------------------------+----------+
-- 4 rows in set (0.00 sec)
SELECT
    productCode,
    productName,
    buyPrice
FROM
    products
WHERE
    buyPrice < 20
    OR buyPrice > 100;

-- +-------------+-------------------------------------+----------+
-- | productCode | productName                         | buyPrice |
-- +-------------+-------------------------------------+----------+
-- | S10_4962    | 1962 LanciaA Delta 16V              |   103.42 |
-- | S18_2238    | 1998 Chrysler Plymouth Prowler      |   101.51 |
-- | S24_2840    | 1958 Chevy Corvette Limited Edition |    15.91 |
-- | S24_2972    | 1982 Lamborghini Diablo             |    16.24 |
-- +-------------+-------------------------------------+----------+
-- 4 rows in set (0.00 sec)
-- 2) Using MySQL BETWEEN operator with dates example
SELECT
    orderNumber,
    requiredDate,
    status
FROM
    orders
WHERE
    requireddate BETWEEN CAST('2003-01-01' AS DATE)
    AND CAST('2003-01-31' AS DATE);
-- +-------------+--------------+---------+
-- | orderNumber | requiredDate | status  |
-- +-------------+--------------+---------+
-- |       10100 | 2003-01-13   | Shipped |
-- |       10101 | 2003-01-18   | Shipped |
-- |       10102 | 2003-01-18   | Shipped |
-- +-------------+--------------+---------+
-- 3 rows in set (0.00 sec)