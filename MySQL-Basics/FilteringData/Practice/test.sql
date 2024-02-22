-- write a sql query to list customername, country, state, creditlimit who resides in USA or France and whose creditlimit is between 21000 and 30000 and also remove null states 
select
    customername,
    country,
    state,
    creditlimit
from
    customers
where
    country IN ('USA', 'France')
    AND creditlimit between 21000
    and 30000
    and state is not null;

-- +-------------------------+---------+-------+-------------+
-- | customername            | country | state | creditlimit |
-- +-------------------------+---------+-------+-------------+
-- | Auto-Moto Classics Inc. | USA     | MA    |    23000.00 |
-- +-------------------------+---------+-------+-------------+
-- 1 row in set (0.00 sec)

select
    customername,
    country,
    state,
    creditlimit
from
    customers
where
    state is not null
    and (
        country IN ('USA', 'France')
        or (
            creditlimit between 21000
            and 30000
        )
    );

-- +------------------------------+---------+-------+-------------+
-- | customername                 | country | state | creditlimit |
-- +------------------------------+---------+-------+-------------+
-- | Signal Gift Stores           | USA     | NV    |    71800.00 |
-- | Mini Gifts Distributors Ltd. | USA     | CA    |   210500.00 |
-- | Mini Wheels Co.              | USA     | CA    |    64600.00 |
-- | Land of Toys Inc.            | USA     | NY    |   114900.00 |
-- | Muscle Machine Inc           | USA     | NY    |   138500.00 |
-- | Diecast Classics Inc.        | USA     | PA    |   100600.00 |
-- | Technics Stores Inc.         | USA     | CA    |    84600.00 |
-- | American Souvenirs Inc       | USA     | CT    |        0.00 |
-- | Cambridge Collectables Co.   | USA     | MA    |    43400.00 |
-- | Gift Depot Inc.              | USA     | CT    |    84300.00 |
-- | Vitachrome Inc.              | USA     | NY    |    76400.00 |
-- | Auto-Moto Classics Inc.      | USA     | MA    |    23000.00 |
-- | Online Mini Collectables     | USA     | MA    |    68700.00 |
-- | Toys4GrownUps.com            | USA     | CA    |    90700.00 |
-- | Boards & Toys Co.            | USA     | CA    |    11000.00 |
-- | Collectable Mini Designs Co. | USA     | CA    |   105000.00 |
-- | Marta's Replicas Co.         | USA     | MA    |   123700.00 |
-- | Mini Classics                | USA     | NY    |   102700.00 |
-- | Mini Creations Ltd.          | USA     | MA    |    94500.00 |
-- | Corporate Gift Ideas Co.     | USA     | CA    |   105000.00 |
-- | Tekni Collectables Inc.      | USA     | NJ    |    43000.00 |
-- | Classic Gift Ideas, Inc      | USA     | PA    |    81100.00 |
-- | Men 'R' US Retailers, Ltd.   | USA     | CA    |    57700.00 |
-- | Gifts4AllAges.com            | USA     | MA    |    41900.00 |
-- | Online Diecast Creations Co. | USA     | NH    |   114200.00 |
-- | Collectables For Less Inc.   | USA     | MA    |    70700.00 |
-- | Classic Legends Inc.         | USA     | NY    |    67500.00 |
-- | Gift Ideas Corp.             | USA     | CT    |    49700.00 |
-- | The Sharp Gifts Warehouse    | USA     | CA    |    77600.00 |
-- | Super Scale Inc.             | USA     | CT    |    95400.00 |
-- | Microscale Inc.              | USA     | NY    |    39800.00 |
-- | FunGiftIdeas.com             | USA     | MA    |    85800.00 |
-- | West Coast Collectables Co.  | USA     | CA    |    55400.00 |
-- | Motor Mint Distributors Inc. | USA     | PA    |    72600.00 |
-- | Signal Collectibles Ltd.     | USA     | CA    |    60300.00 |
-- | Diecast Collectables         | USA     | MA    |    85100.00 |
-- +------------------------------+---------+-------+-------------+
-- 36 rows in set (0.00 sec)