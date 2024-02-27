-- The GROUP BY clause groups a set of rows into a set of summary rows based on column values or expressions. It returns one row for each group and reduces the number of rows in the result set.
-- If you use the GROUP BY clause in the SELECT statement without using aggregate functions, the GROUP BY clause behaves like the DISTINCT clause.
-- The SQL standard does not allow you to use an alias in the GROUP BY clause whereas MySQL supports this.

-- 1) Basic MySQL GROUP BY example
select
    status
from
    orders
GROUP BY
    status;

-- status
-- Shipped
-- Resolved
-- Cancelled
-- On Hold
-- Disputed
-- In Process
-- #### alter method
select
    DISTINCT status
from
    orders;

-- 2) Using MySQL GROUP BY with aggregate functions
SELECT
    status,
    COUNT(*)
FROM
    orders
GROUP BY
    status;

-- Shipped	303
-- Resolved	4
-- Cancelled	6
-- On Hold	4
-- Disputed	3
-- In Process	6
select
    status,
    sum(priceEach * quantityOrdered) as Sum
from
    orders
    inner join orderDetails using(orderNumber)
GROUP BY
    status;

-- Shipped	8865094.64
-- Resolved	134235.88
-- Cancelled	238854.18
-- On Hold	169575.61
-- Disputed	61158.78
-- In Process	135271.52
-- 3) MySQL GROUP BY with expression example
SELECT
    YEAR(orderDate) as years,
    sum(quantityOrdered * priceEach) AS total
from
    orders
    inner join orderdetails using(orderNumber)
where
    status = 'Shipped'
GROUP BY
    years;

-- 2003	3223095.80
-- 2004	4300602.99
-- 2005	1341395.85
-- 4) Using MySQL GROUP BY with HAVING clause example
SELECT
    YEAR(orderDate) AS year,
    SUM(quantityOrdered * priceEach) AS total
FROM
    orders
    INNER JOIN orderdetails USING (orderNumber)
WHERE
    status = 'Shipped'
GROUP BY
    year
HAVING
    year > 2003;

-- 2004	4300602.99
-- 2005	1341395.85
-- 5) Grouping by multiple columns
SELECT
    YEAR(orderDate) AS year,
    status,
    SUM(quantityOrdered * priceEach) AS total
FROM
    orders
    INNER JOIN orderdetails USING (orderNumber)
GROUP BY
    year,
    status
ORDER BY
    year;

-- 2003	Cancelled	67130.69
-- 2003	Resolved	27121.90
-- 2003	Shipped	3223095.80
-- 2004	Cancelled	171723.49
-- 2004	On Hold	23014.17
-- 2004	Resolved	20564.86
-- 2004	Shipped	4300602.99
-- 2005	Disputed	61158.78
-- 2005	In Process	135271.52
-- 2005	On Hold	146561.44
-- 2005	Resolved	86549.12
-- 2005	Shipped	1341395.85