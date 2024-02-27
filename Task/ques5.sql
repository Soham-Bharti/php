-- uses the GROUP BY clause to get order numbers, the number of items sold per order, and total sales for each from the orderdetails table:

select
    orderNumber,
    sum(quantityOrdered) as `Items sold`,
    sum(quantityOrdered * priceEach) as `Total sales`
from
    orderdetails
group by
    orderNumber;

-- 10100	151	10223.83
-- 10101	142	10549.01
-- 10102	80	5494.78
-- 10103	541	50218.95
-- 10104	443	40206.20
-- 10105	545	53959.21
-- 10106	675	52151.81
-- 10107	229	22292.62
-- 10108	561	51001.22
-- 10109	212	25833.14
-- 10110	570	48425.69
-- 10111	217	16537.85
-- 10112	52	7674.94
-- 10113	143	11044.30
-- 10114	351	33383.14