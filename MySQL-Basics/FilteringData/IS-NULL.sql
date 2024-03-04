-- IS NULL operator to test whether a value is NULL or not
SELECT
    1 IS NULL,
    -- 0
    0 IS NULL,
    -- 0
    NULL IS NULL;

-- 1
SELECT
    1 IS NOT NULL,
    -- 1
    0 IS NOT NULL,
    -- 1
    NULL IS NOT NULL;

-- 0
SELECT
    customerName,
    country,
    salesRepEmployeeNumber
FROM
    customers
WHERE
    salesrepemployeenumber IS NULL
ORDER BY
    customerName;

-- +--------------------------------+--------------+------------------------+
-- | customerName                   | country      | salesRepEmployeeNumber |
-- +--------------------------------+--------------+------------------------+
-- | ANG Resellers                  | Spain        |                   NULL |
-- | Anton Designs, Ltd.            | Spain        |                   NULL |
-- | Asian Shopping Network, Co     | Singapore    |                   NULL |
-- | Asian Treasures, Inc.          | Ireland      |                   NULL |
-- | BG&E Collectables              | Switzerland  |                   NULL |
-- | Cramer Spezialit├ñten, Ltd     | Germany      |                   NULL |
-- | Der Hund Imports               | Germany      |                   NULL |
-- | Feuer Online Stores, Inc       | Germany      |                   NULL |
-- | Franken Gifts, Co              | Germany      |                   NULL |
-- | Havel & Zbyszek Co             | Poland       |                   NULL |
-- | Kommission Auto                | Germany      |                   NULL |
-- | Kremlin Collectables, Co.      | Russia       |                   NULL |
-- | Lisboa Souveniers, Inc         | Portugal     |                   NULL |
-- | Messner Shopping Network       | Germany      |                   NULL |
-- | Mit Vergn├╝gen & Co.           | Germany      |                   NULL |
-- | Nat├╝rlich Autos               | Germany      |                   NULL |
-- | Porto Imports Co.              | Portugal     |                   NULL |
-- | Raanan Stores, Inc             | Israel       |                   NULL |
-- | SAR Distributors, Co           | South Africa |                   NULL |
-- | Schuyler Imports               | Netherlands  |                   NULL |
-- | Stuttgart Collectable Exchange | Germany      |                   NULL |
-- | Warburg Exchange               | Germany      |                   NULL |
-- +--------------------------------+--------------+------------------------+
-- 22 rows in set (0.01 sec)
SELECT
    customerName,
    country,
    salesRepEmployeeNumber
FROM
    customers
WHERE
    salesrepemployeenumber IS NOT NULL
ORDER BY
    customerName
LIMIT
    10;

-- +------------------------------+-----------+------------------------+
-- | customerName                 | country   | salesRepEmployeeNumber |
-- +------------------------------+-----------+------------------------+
-- | Alpha Cognac                 | France    |                   1370 |
-- | American Souvenirs Inc       | USA       |                   1286 |
-- | Amica Models & Co.           | Italy     |                   1401 |
-- | Anna's Decorations, Ltd      | Australia |                   1611 |
-- | Atelier graphique            | France    |                   1370 |
-- | Australian Collectables, Ltd | Australia |                   1611 |
-- | Australian Collectors, Co.   | Australia |                   1611 |
-- | Australian Gift Network, Co  | Australia |                   1611 |
-- | Auto Associ├®s & Cie.        | France    |                   1370 |
-- | Auto Canal+ Petit            | France    |                   1337 |
-- +------------------------------+-----------+------------------------+
-- 10 rows in set (0.00 sec)

-- Use the IS NULL operator to test if a value is NULL or not. The IS NOT NULL operator negates the result of the IS NULL operator.
-- The value IS NULL returns true if the value is NULL or false if the value is not NULL.
-- The value IS NOT NULL returns true if the value is not NULL or false if the value is NULL.