-- In MySQL, views are not only queryable but also updatable. This implies that you can use the INSERT or UPDATE statement to add or modify rows of the base table through the updatable view.

-- Additionally, you can use the DELETE statement to remove rows of the underlying table via the view.

-- However, to create an updatable view, the SELECT statement defining the view must not contain any of the following elements:

-- Aggregate functions such as MIN, MAX, SUM, AVG, and COUNT.
-- DISTINCT
-- GROUP BY clause.
-- HAVING clause.
-- UNION or UNION ALL clause.
-- Left join or outer join.
-- Subquery in the SELECT clause or in the WHERE clause that refers to the table appeared in the FROM clause.
-- Reference non-updatable views in the FROM clause.
-- Use literal values.
-- Multiple references to any column of the base table.
-- If you create a view with the TEMPTABLE algorithm, the view is not updatable.

-- Note that it is possible to create updatable views based on multiple tables using an inner join.

-- MySQL updatable view example
CREATE VIEW officeInfo
 AS 
   SELECT officeCode, phone, city
   FROM offices;
-- done
SELECT * FROM officeInfo;
-- 1	+1 650 219 4782	San Francisco
-- 2	+1 215 837 0825	Boston
-- 3	+1 212 555 3000	NYC
-- 4	+33 14 723 4404	Paris
-- 5	+81 33 224 5000	Tokyo
-- 6	+61 2 9264 2451	Sydney
-- 7	+44 20 7877 2041	London
UPDATE officeInfo 
SET 
    phone = '+33 14 723 5555'
WHERE
    officeCode = 4;

SELECT * FROM officeInfo;
-- 1	+1 650 219 4782	San Francisco
-- 2	+1 215 837 0825	Boston
-- 3	+1 212 555 3000	NYC
-- 4	+33 14 723 5555	Paris
-- 5	+81 33 224 5000	Tokyo
-- 6	+61 2 9264 2451	Sydney
-- 7	+44 20 7877 2041	London

-- Checking updatable view information
SELECT 
    table_name, 
    is_updatable
FROM
    information_schema.views
WHERE
    table_schema = 'classicmodels';
-- aboveavgproducts	    NO
-- bigsales	            NO
-- customerorders	    NO
-- customerorderstats	NO
-- officeinfo	        YES
-- saleperorder	        NO

-- Removing rows through the view
CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(11 , 2 ) NOT NULL
);

INSERT INTO items(name,price) 
VALUES('Laptop',700.56),('Desktop',699.99),('iPad',700.50) ;

CREATE VIEW LuxuryItems AS
    SELECT 
        *
    FROM
        items
    WHERE
        price > 700;

SELECT 
    *
FROM
    LuxuryItems;
-- 1	Laptop	700.56
-- 3	iPad	700.50

DELETE FROM LuxuryItems 
WHERE id = 3;
-- done


SELECT 
    *
FROM
    LuxuryItems;
-- 1	Laptop	700.56

SELECT 
    *
FROM
    items;
-- 1	Laptop	700.56
-- 2	Desktop	699.99    