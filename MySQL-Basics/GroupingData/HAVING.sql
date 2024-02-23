-- The HAVING clause is used in conjunction with the GROUP BY clause to filter the groups based on a specified condition.
-- The HAVING clause allows you to apply a condition to the groups returned by the GROUP BY clause and only include groups that meet the specified condition.
-- SELECT 
--     select_list
-- FROM 
--     table_name
-- WHERE 
--     search_condition
-- GROUP BY 
--     group_by_expression
-- HAVING 
--     group_condition;
SELECT
    ordernumber,
    SUM(quantityOrdered) AS itemsCount,
    SUM(priceeach * quantityOrdered) AS total
FROM
    orderdetails
GROUP BY
    ordernumber
HAVING
    total < 3000;

-- 10116	27	1627.56
-- 10132	36	2880.00
-- 10144	20	1128.20
-- 10158	22	1491.38
-- 10242	46	1679.92
-- 10277	28	2611.84
-- 10286	38	1960.80
-- 10317	35	2434.25
-- 10345	43	1676.14
-- 10364	48	1834.56
-- 10408	15	615.45
-- 10409	67	2326.18
SELECT
    ordernumber,
    SUM(quantityOrdered) AS itemsCount,
    SUM(priceeach * quantityOrdered) AS total
FROM
    orderdetails
GROUP BY
    ordernumber
HAVING
    total < 3000
    and itemsCount > 50;

-- 10409	67	2326.18
SELECT
    a.ordernumber,
    status,
    SUM(priceeach * quantityOrdered) total
FROM
    orderdetails a
    INNER JOIN orders b ON b.ordernumber = a.ordernumber
GROUP BY
    ordernumber,
    status
HAVING
    status = 'cancelled'
    AND total > 1500;

-- 10167	Cancelled	44167.09
-- 10179	Cancelled	22963.60
-- 10248	Cancelled	41445.21
-- 10253	Cancelled	45443.54
-- 10260	Cancelled	37769.38
-- 10262	Cancelled	47065.36