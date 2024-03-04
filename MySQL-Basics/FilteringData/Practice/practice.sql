use classicmodels;

select
    concat(firstName, ' ', lastName) AS Full_Name,
    officeCode
from
    employees
where
    concat(firstName, ' ', lastName) like '%a%'
    and officeCode IN (1, 3);

-- +----------------+------------+
-- | Full_Name      | officeCode |
-- +----------------+------------+
-- | Diane Murphy   | 1          |
-- | Mary Patterson | 1          |
-- | Anthony Bow    | 1          |
-- | George Vanauf  | 3          |
-- +----------------+------------+
-- 4 rows in set (0.01 sec)
select
    productName,
    avg(buyPrice) as AVG_PRICE
from
    products
group by
    productName
order by
    productName desc
limit
    20;

-- +--------------------------------------+-----------+
-- | productName                          | AVG_PRICE |
-- +--------------------------------------+-----------+
-- | The USS Constitution Ship            | 33.970000 |
-- | The Titanic                          | 51.090000 |
-- | The Schooner Bluenose                | 34.000000 |
-- | The Queen Mary                       | 53.630000 |
-- | The Mayflower                        | 43.300000 |
-- | Pont Yacht                           | 33.300000 |
-- | P-51-D Mustang                       | 49.000000 |
-- | HMS Bounty                           | 39.830000 |
-- | F/A 18 Hornet 1/72                   | 54.400000 |
-- | Diamond T620 Semi-Skirted Tanker     | 68.290000 |
-- | Corsair F4U ( Bird Cage)             | 29.340000 |
-- | Collectable Wooden Train             | 67.560000 |
-- | Boeing X-32A JSF                     | 32.770000 |
-- | ATA: B757-300                        | 59.330000 |
-- | American Airlines: MD-11S            | 36.270000 |
-- | American Airlines: B767-300          | 51.150000 |
-- | America West Airlines B757-200       | 68.800000 |
-- | 2003 Harley-Davidson Eagle Drag Bike | 91.020000 |
-- | 2002 Yamaha YZR M1                   | 34.170000 |
-- | 2002 Suzuki XREO                     | 66.270000 |
-- +--------------------------------------+-----------+
-- 20 rows in set (0.00 sec)