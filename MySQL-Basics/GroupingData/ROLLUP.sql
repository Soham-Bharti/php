-- As clearly shown in the output, the ROLLUP clause generates not only the subtotals but also the grand total of the order values.
-- uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table:
use classicmodels;

select
    orderNumber,
    sum(quantityOrdered) as `Items sold`,
    sum(quantityOrdered * priceEach) as `Total sales`
from
    orderdetails
group by
    orderNumber with rollup -- ....
    -- 10423	111	    8597.73
    -- 10424	269	    29310.30
    -- 10425	427	    41623.44
    -- null     105516(total)	9604190.61 (total)
select
    orderNumber,
    sum(quantityOrdered) as sold,
    sum(priceEach)
from
    orderdetails
group by
    orderNumber,
    priceEach with ROLLUP -- 10100	49	35.29
    -- 10100	50	55.09
    -- 10100	22	75.46
    -- 10100	30	136.00
    -- 10100	151	301.84
    -- 10101	45	32.53
    -- 10101	46	44.35
    -- 10101	25	108.06
    -- 10101	26	167.06
    -- 10101	142	352.00
    -- 10102	41	43.13
    -- 10102	39	95.55
    -- 10102	80	138.68

    -- The GROUPING() function
    -- To check whether NULL in the result set represents the subtotals or grand totals, you use the GROUPING() function.
    -- The GROUPING() function returns 1 when NULL occurs in a supper-aggregate row, otherwise, it returns 0.
    -- The GROUPING() function can be used in the select list, HAVING clause, and (as of MySQL 8.0.12 ) ORDER BY clause.
select
    orderNumber,
    sum(quantityOrdered) as sold,
    sum(priceEach),
    grouping (priceEach)
from
    orderdetails
group by
    orderNumber,
    priceEach with ROLLUP 
    -- The GROUPING(priceEach) returns 1 when NULL in the orderYear column occurs in a super-aggregate row, 0 otherwise.
    -- 10100	49	35.29	0
    -- 10100	50	55.09	0
    -- 10100	22	75.46	0
    -- 10100	30	136.00	0
    -- 10100	151	301.84	1
    -- 10101	45	32.53	0
    -- 10101	46	44.35	0
    -- 10101	25	108.06	0
    -- 10101	26	167.06	0
    -- 10101	142	352.00	1

    select 
IF(grouping(orderNumber), 'Total', orderNumber) AS orderNumber,
sum(quantityOrdered) as sold, 
sum(priceEach)
from orderdetails
group by orderNumber with ROLLUP
-- 10422	76	138.88
-- 10423	111	403.05
-- 10424	269	612.75
-- 10425	427	1231.98
-- Total	105516	271945.42

SELECT 
    IF(grouping(orderNumber), 'Total', orderNumber) AS orderNumber,
    IF(grouping(priceEach), 'All Price', priceEach) AS priceEach,
    SUM(quantityOrdered) AS sold,
    SUM(quantityOrdered * priceEach) AS totalSales
FROM 
    orderdetails
GROUP BY 
    orderNumber, priceEach 
WITH ROLLUP;


-- 10424	201.44	50	10072.00
-- 10424	All Price	269	29310.30
-- 10425	31.82	31	986.42
-- 10425	48.62	19	923.78
-- 10425	50.32	11	553.52
-- 10425	53.75	55	2956.25
-- 10425	83.79	41	3435.39
-- 10425	94.92	18	1708.56
-- 10425	95.99	33	3167.67
-- 10425	107.76	38	4094.88
-- 10425	117.82	38	4477.16
-- 10425	127.79	49	6261.71
-- 10425	131.49	38	4996.62
-- 10425	140.55	28	3935.40
-- 10425	147.36	28	4126.08
-- 10425	All Price	427	41623.44
-- Total	All Price	105516	9604190.61