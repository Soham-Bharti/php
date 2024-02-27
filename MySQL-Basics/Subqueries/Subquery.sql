-- MySQL Subquery
-- A MySQL subquery is a query nested within another query such as SELECT, INSERT, UPDATE or DELETE. Also, a subquery can be nested within another subquery.
-- A MySQL subquery is called an inner query whereas the query that contains the subquery is called an outer query. A subquery can be used anywhere that expression is used and must be closed in parentheses.
-- a subquery to return the employees who work in the offices located in the USA
SELECT
	lastName,
	firstName
from
	employees
where
	officeCode IN (
		select
			officeCode
		from
			offices
		WHERE
			country = 'USA'
	);

-- Murphy	Diane
-- Patterson	Mary
-- Firrelli	Jeff
-- Bow	Anthony
-- Jennings	Leslie
-- Thompson	Leslie
-- Firrelli	Julie
-- Patterson	Steve
-- Tseng	Foon Yue
-- Vanauf	George
-- Using a MySQL subquery in the WHERE clause
SELECT
	concat_ws(' ', contactFirstName, contactLastName) as `Name`,
	customerNumber
FROM
	customers
WHERE
	customerNumber = (
		SELECT
			customerNumber
		FROM
			payments
		group by
			customerNumber
		having
			MAX(amount)
		order by
			MAX(amount) desc
		limit
			1
	) -- Diego  Freyre	141
	-- // alter
SELECT
	customerNumber,
	checkNumber,
	amount
FROM
	payments
WHERE
	amount = (
		SELECT
			MAX(amount)
		FROM
			payments
	);

-- 141	JE105477	120166.58
-- find customers whose payments are greater than the average payment using a subquery:
use classicmodels;

select
	contactFirstName,
	customerNumber,
	min(amount)
from
	customers
	inner join payments using (customerNumber)
where
	amount > (
		SELECT
			avg(amount)
		from
			payments
	)
group by
	customerNumber -- Jean	112	32641.98
	-- Peter	114	44894.74
	-- Janine 	119	47924.19
	-- Jonas 	121	34638.14
	-- Susan	124	43369.30
	-- Roland	128	33820.62
	-- Kwai	131	35321.97
	-- Diego 	141	35420.74
	-- Christina 	144	36005.71
	-- Jytte 	145	53959.21
	-- Mary 	146	39712.10
	-- Eric	148	44380.15
	-- ...
	-- use a subquery with NOT IN operator to find the customers who have not placed any orders as follows:
	use classicmodels;

select
	contactFirstName,
	customerNumber,
	customerName
from
	customers
where
	customerNumber NOT IN (
		select
			DISTINCT customerNumber
		from
			orders
		where
			orderNumber is not null
	);

-- alter
use classicmodels;

select
	contactFirstName,
	customerNumber,
	customerName
from
	customers
where
	customerNumber NOT IN (
		select
			DISTINCT customerNumber
		from
			orders
	);

-- Zbyszek 	125	Havel & Zbyszek Co
-- Keith	168	American Souvenirs Inc
-- Isabel 	169	Porto Imports Co.
-- Brydey	206	Asian Shopping Network, Co
-- Horst 	223	Nat├╝rlich Autos
-- Alejandra 	237	ANG Resellers
-- Renate 	247	Messner Shopping Network
-- ...
-- MySQL subquery in the FROM clause
-- When you use a subquery in the FROM clause, the result set returned from a subquery is used as a temporary table. This table is referred to as a derived table or materialized subquery.
-- finds the maximum, minimum, and average number of items in sale orders:
select
	max(items),
	min(items),
	avg(items)
from
	(
		select
			orderNumber,
			count(orderNumber) as items
		from
			orderdetails
		GROUP BY
			orderNumber
	) as lineitems -- 18	1	9.1902
	-- MySQL correlated subquery
	-- Unlike a standalone subquery, a correlated subquery is a subquery that uses the data from the outer query. In other words, a correlated subquery depends on the outer query. A correlated subquery is evaluated once for each row in the outer query.
SELECT
	productname,
	buyprice
FROM
	products AS p1
WHERE
	buyprice > (
		SELECT
			AVG(buyprice)
		FROM
			products
		where
			productline = p1.productline
	);

-- 1952 Alpine Renault 1300	98.58
-- 1996 Moto Guzzi 1100i	68.99
-- 2003 Harley-Davidson Eagle Drag Bike	91.02
-- 1972 Alfa Romeo GTA	85.68
-- 1962 LanciaA Delta 16V	103.42
-- 1968 Ford Mustang	95.34
-- 2001 Ferrari Enzo	95.59
-- 1958 Setra Bus	77.90
-- 2002 Suzuki XREO	66.27
-- ...
-- MySQL subquery with EXISTS and NOT EXISTS
-- When a subquery is used with the EXISTS or NOT EXISTS operator, a subquery returns a Boolean value of TRUE or FALSE.  The following query illustrates a subquery used with the EXISTS operator:
-- SELECT 
--     *
-- FROM
--     table_name
-- WHERE
--     EXISTS( subquery );
-- finds sales orders whose total values are greater than 60K.
use classicmodels;

SELECT
	orderNumber,
	sum(quantityOrdered * priceEach) total
FROM
	orderdetails
group by
	orderNumber
having
	sum(quantityOrdered * priceEach) > 60000 -- 10165	67392.85
	-- 10287	61402.00
	-- 10310	61234.67
	-- find customers who placed at least one sales order with a total value greater than 60K by using the EXISTS operator
SELECT
	customerNumber,
	customerName
FROM
	customers
WHERE
	EXISTS(
		SELECT
			orderNumber,
			SUM(priceEach * quantityOrdered)
		FROM
			orderdetails
			INNER JOIN orders USING (orderNumber)
		WHERE
			customerNumber = customers.customerNumber
		GROUP BY
			orderNumber
		HAVING
			SUM(priceEach * quantityOrdered) > 60000
	);

-- 148	Dragon Souveniers, Ltd.
-- 259	Toms Spezialit├ñten, Ltd
-- 298	Vida Sport, Ltd