-- AND – introduce you to the AND operator to combine Boolean expressions to form a complex condition for filtering data
SELECT
    1
    AND 1;

-- +---------+
-- | 1 AND 1 |
-- +---------+
-- |       1 |
-- +---------+
-- 1 row in set (0.00 sec)
SELECT
    customername,
    country,
    state
FROM
    customers
WHERE
    country = 'USA'
    AND state = 'CA';

-- +------------------------------+---------+-------+
-- | customername                 | country | state |
-- +------------------------------+---------+-------+
-- | Mini Gifts Distributors Ltd. | USA     | CA    |
-- | Mini Wheels Co.              | USA     | CA    |
-- | Technics Stores Inc.         | USA     | CA    |
-- | Toys4GrownUps.com            | USA     | CA    |
-- | Boards & Toys Co.            | USA     | CA    |
-- | Collectable Mini Designs Co. | USA     | CA    |
-- | Corporate Gift Ideas Co.     | USA     | CA    |
-- | Men 'R' US Retailers, Ltd.   | USA     | CA    |
-- | The Sharp Gifts Warehouse    | USA     | CA    |
-- | West Coast Collectables Co.  | USA     | CA    |
-- | Signal Collectibles Ltd.     | USA     | CA    |
-- +------------------------------+---------+-------+
-- 11 rows in set (0.00 sec)
SELECT
    customername,
    country,
    state,
    creditlimit
FROM
    customers
WHERE
    country = 'USA'
    AND state = 'CA'
    AND creditlimit > 100000;

-- +------------------------------+---------+-------+-------------+
-- | customername                 | country | state | creditlimit |
-- +------------------------------+---------+-------+-------------+
-- | Mini Gifts Distributors Ltd. | USA     | CA    |   210500.00 |
-- | Collectable Mini Designs Co. | USA     | CA    |   105000.00 |
-- | Corporate Gift Ideas Co.     | USA     | CA    |   105000.00 |
-- +------------------------------+---------+-------+-------------+
-- 3 rows in set (0.01 sec)

