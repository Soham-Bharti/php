-- INSERT INTO SELECT statement to insert data into a table, where data comes from the result of a SELECT statement.
-- INSERT INTO table_name(column_list)
-- SELECT 
--    select_list 
-- FROM 
--    another_table
-- WHERE
--    condition;
-- The INSERT INTO SELECT statement can very useful when you want to copy data from other tables to a table or to summarize data from multiple tables into a table.
-- Please note that it’s possible to select rows in a table and insert them into the same table. In other words, the table_name and another_table in the INSERT INTO ... SELECT statement can reference the same table.
-- MySQL INSERT INTO SELECT example
CREATE TABLE suppliers (
    supplierNumber INT AUTO_INCREMENT,
    supplierName VARCHAR(50) NOT NULL,
    phone VARCHAR(50),
    addressLine1 VARCHAR(50),
    addressLine2 VARCHAR(50),
    city VARCHAR(50),
    state VARCHAR(50),
    postalCode VARCHAR(50),
    country VARCHAR(50),
    customerNumber INT,
    PRIMARY KEY (supplierNumber)
);

SELECT
    customerNumber,
    customerName,
    phone,
    addressLine1,
    addressLine2,
    city,
    state,
    postalCode,
    country
FROM
    customers
WHERE
    country = 'USA'
    AND state = 'CA';

-- 124	Mini Gifts Distributors Ltd.	4155551450	5677 Strong St.		San Rafael	CA	97562	USA
-- 129	Mini Wheels Co.	6505555787	5557 North Pendale Street		San Francisco	CA	94217	USA
-- 161	Technics Stores Inc.	6505556809	9408 Furth Circle		Burlingame	CA	94217	USA
-- 205	Toys4GrownUps.com	6265557265	78934 Hillside Dr.		Pasadena	CA	90003	USA
-- 219	Boards & Toys Co.	3105552373	4097 Douglas Av.		Glendale	CA	92561	USA
-- 239	Collectable Mini Designs Co.	7605558146	361 Furth Circle		San Diego	CA	91217	USA
-- 321	Corporate Gift Ideas Co.	6505551386	7734 Strong St.		San Francisco	CA	94217	USA
-- 347	Men 'R' US Retailers, Ltd.	2155554369	6047 Douglas Av.		Los Angeles	CA	91003	USA
-- 450	The Sharp Gifts Warehouse	4085553659	3086 Ingle Ln.		San Jose	CA	94217	USA
-- 475	West Coast Collectables Co.	3105553722	3675 Furth Circle		Burbank	CA	94019	USA
-- 487	Signal Collectibles Ltd.	4155554312	2793 Furth Circle		Brisbane	CA	94217	USA
-- Suppose all customers in California, USA become the company’s suppliers. The following query finds all customers who are located in California, USA:
insert into
    suppliers(
        supplierName,
        phone,
        addressLine1,
        addressLine2,
        city,
        state,
        postalCode,
        country,
        customerNumber
    )
select
    customerName,
    phone,
    addressLine1,
    addressLine2,
    city,
    state,
    postalCode,
    country,
    customerNumber
from
    customers
where
    country = 'USA'
    and state = 'CA';
-- done
    select * from suppliers
--     1	Mini Gifts Distributors Ltd.	4155551450	5677 Strong St.		San Rafael	CA	97562	USA	124
-- 2	Mini Wheels Co.	6505555787	5557 North Pendale Street		San Francisco	CA	94217	USA	129
-- 3	Technics Stores Inc.	6505556809	9408 Furth Circle		Burlingame	CA	94217	USA	161
-- 4	Toys4GrownUps.com	6265557265	78934 Hillside Dr.		Pasadena	CA	90003	USA	205
-- 5	Boards & Toys Co.	3105552373	4097 Douglas Av.		Glendale	CA	92561	USA	219
-- 6	Collectable Mini Designs Co.	7605558146	361 Furth Circle		San Diego	CA	91217	USA	239
-- 7	Corporate Gift Ideas Co.	6505551386	7734 Strong St.		San Francisco	CA	94217	USA	321
-- 8	Men 'R' US Retailers, Ltd.	2155554369	6047 Douglas Av.		Los Angeles	CA	91003	USA	347
-- 9	The Sharp Gifts Warehouse	4085553659	3086 Ingle Ln.		San Jose	CA	94217	USA	450
-- 10	West Coast Collectables Co.	3105553722	3675 Furth Circle		Burbank	CA	94019	USA	475
-- 11	Signal Collectibles Ltd.	4155554312	2793 Furth Circle		Brisbane	CA	94217	USA	487

-- Using SELECT statement in the VALUES list
CREATE TABLE stats (
    totalProduct INT,
    totalCustomer INT,
    totalOrder INT
);
INSERT INTO stats(totalProduct, totalCustomer, totalOrder)
VALUES(
	(SELECT COUNT(*) FROM products),
	(SELECT COUNT(*) FROM customers),
	(SELECT COUNT(*) FROM orders)
);
-- done

select * from stats;
-- totalProduct totalCustomer  totalOrder
-- 110	        122	            326