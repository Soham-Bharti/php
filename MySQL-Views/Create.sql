-- CREATE [OR REPLACE] VIEW [db_name.]view_name [(column_list)]
-- AS
--   select-statement;

-- 1) Creating a simple view example
use classicmodels;
CREATE VIEW classicmodels.salePerOrder
as
select
	orderNumber,
	sum(priceEach * quantityOrdered) as `Total Sale`
from orderDetails
group by orderNumber
order by `Total Sale`;

show tables;
-- ...
-- projects
-- rooms
-- s
-- saleperorder
-- stats
-- subscribers
-- suppliers
-- ...
show full TABLES;
-- ...
-- projects	    BASE TABLE
-- rooms	    BASE TABLE
-- s	        BASE TABLE
-- saleperorder	VIEW
-- stats	    BASE TABLE
-- subscribers	BASE TABLE
-- ...
select * from saleperorder;
-- 10408	615.45
-- 10144	1128.20
-- 10158	1491.38
-- 10116	1627.56
-- 10345	1676.14
-- 10242	1679.92
-- 10364	1834.56
-- 10286	1960.80
-- ...

-- 2) Creating a view based on another view example
CREATE view bigSales
as
select *
from salePerOrder
where `Total sale` > 60000;

select * from bigSales;
-- Order Number     Total Sale
-- 10310	        61234.67
-- 10287	        61402.00
-- 10165	        67392.85

-- 3) Creating a view with join example
create view customerOrders
as
SELECT	
	orderNumber,
	customerName,
    sum(quantityOrdered * priceEach) as `Total sale`
from orderdetails
inner join orders using (orderNumber)
inner join customers using (customerNumber)
group by orderNumber;

select * from customerOrders;
-- 10123	Atelier graphique	14571.44
-- 10298	Atelier graphique	6066.78
-- 10345	Atelier graphique	1676.14
-- 10124	Signal Gift Stores	32641.98
-- 10278	Signal Gift Stores	33347.88
-- 10346	Signal Gift Stores	14191.12
-- 10120	Australian Collectors, Co.	45864.03
-- 10125	Australian Collectors, Co.	7565.08
-- 10223	Australian Collectors, Co.	44894.74
-- 10342	Australian Collectors, Co.	40265.60
-- ...

-- 4) Creating a view with a subquery example
create view aboveAvgProducts
as
select 
	productCode,
    productName,
    buyPrice
from products
where buyPrice > (
					select 
						avg(buyPrice)
					from products
				 )
order by buyPrice desc;


SELECT * FROM aboveAvgProducts;
-- S10_4962	1962 LanciaA Delta 16V	103.42
-- S18_2238	1998 Chrysler Plymouth Prowler	101.51
-- S10_1949	1952 Alpine Renault 1300	98.58
-- S24_3856	1956 Porsche 356A Coupe	98.30
-- S12_1108	2001 Ferrari Enzo	95.59
-- S12_1099	1968 Ford Mustang	95.34
-- S18_1984	1995 Honda Civic	93.89
-- S18_4027	1970 Triumph Spitfire	91.92
-- S10_4698	2003 Harley-Davidson Eagle Drag Bike	91.02
-- S12_3148	1969 Corvair Monza	89.14
-- S18_1749	1917 Grand Touring Sedan	86.70
-- S10_4757	1972 Alfa Romeo GTA	85.68
-- S18_4600	1940s Ford truck	84.76
-- ...


-- 5) Creating a view with explicit view columns example
create view customerOrderStats(
	customerName,
    orderCount
)
as 
	select 
		customerName,
        count(orderNumber)
	from customers
    inner join orders using (customerNumber)
	GROUP BY customerName;
    
select * from customerOrderStats;
-- Atelier graphique	3
-- Signal Gift Stores	3
-- Australian Collectors, Co.	5
-- La Rochelle Gifts	4
-- Baane Mini Imports	4
-- Mini Gifts Distributors Ltd.	17
-- Blauer See Auto, Co.	4
-- Mini Wheels Co.	3
-- Land of Toys Inc.	4
-- Euro+ Shopping Channel	26
-- Volvo Model Replicas, Co	4
-- Danish Wholesale Imports	5
-- Saveley & Henriot, Co.	3
-- Dragon Souveniers, Ltd.	5
-- ...