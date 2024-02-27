-- The EXISTS operator is a boolean operator that returns either true or false. The EXISTS operator is often used to test for the existence of rows returned by the subquery.
-- SELECT 
--     select_list
-- FROM
--     a_table
-- WHERE
--     [NOT] EXISTS(subquery);
-- In addition, the EXISTS operator terminates further processing immediately once it finds a matching row, which can help improve the performance of the query.
-- The NOT operator negates the EXISTS operator. In other words, the NOT EXISTS returns true if the subquery returns no row, otherwise it returns false.
-- Note that you can use SELECT *, SELECT column, SELECT a_constant, or anything in the subquery. The results are the same because MySQL ignores the select list that appeared in the SELECT clause.

-- EXISTS operator to find the customer who has at least one order:
use classicmodels;

select customerNumber, customerName
from customers
where 
EXISTS(
	select 1 
    from orders 
    where orders.customernumber = customers.customernumber
)

-- 103	Atelier graphique
-- 112	Signal Gift Stores
-- 114	Australian Collectors, Co.
-- 119	La Rochelle Gifts
-- 121	Baane Mini Imports
-- 124	Mini Gifts Distributors Ltd.
-- 128	Blauer See Auto, Co.
-- 129	Mini Wheels Co.
-- 131	Land of Toys Inc.
-- 141	Euro+ Shopping Channel
-- 144	Volvo Model Replicas, Co

-- EXISTS operator to find the customer who has no order:
SELECT 
    customerNumber, 
    customerName
FROM
    customers
WHERE
    NOT EXISTS(
	SELECT 
            1
        FROM
            orders
        WHERE
            orders.customernumber 
		= customers.customernumber);

-- 125	Havel & Zbyszek Co
-- 168	American Souvenirs Inc
-- 169	Porto Imports Co.
-- 206	Asian Shopping Network, Co
-- 223	Nat├╝rlich Autos
-- 237	ANG Resellers
-- 247	Messner Shopping Network
-- 273	Franken Gifts, Co
-- 293	BG&E Collectables
-- 303	Schuyler Imports
-- 307	Der Hund Imports
-- 335	Cramer Spezialit├ñten, Ltd

-- MySQL UPDATE EXISTS examples
-- Suppose that you have to update the phone extensions of the employees who work at the office in San Francisco.
-- finds employees who work at the office in San Franciso:
select employeeNumber, firstName, lastName, extension
from employees
where
exists (
select * 
from offices
where employees.officeCode = offices.officeCode and city = 'San Francisco'
)
-- 1002	Diane	Murphy	x5800
-- 1056	Mary	Patterson	x4611
-- 1076	Jeff	Firrelli	x9273
-- 1143	Anthony	Bow	x5428
-- 1165	Leslie	Jennings	x3291
-- 1166	Leslie	Thompson	x4065

--  example adds the number 1 to the phone extension of employees who work at the office in San Francisco:
update employees
set
	extension = concat(extension, 1)
where
exists (
select * 
from offices
where employees.officeCode = offices.officeCode and city = 'San Francisco'
)


-- MySQL INSERT EXISTS example
-- Suppose that you want to archive customers who don’t have any sales orders in a separate table. To do this, you use these steps:
-- create a new table for archiving the customers by copying the structure from the customers table:
CREATE TABLE customers_archive 
LIKE customers;

--  insert customers who do not have any sales orders into the customers_archive table using the following INSERT statement.

insert into customers_archive
select *
from customers
where
not exists(
select *
from orders
where orders.customerNumber = customers.customerNumber
)

-- seeing data
-- 125	Havel & Zbyszek Co	Piestrzeniewicz	Zbyszek 	(26) 642-7555	ul. Filtrowa 68		Warszawa		01-012	Poland		0.00
-- 168	American Souvenirs Inc	Franco	Keith	2035557845	149 Spinnaker Dr.	Suite 101	New Haven	CT	97823	USA	1286	0.00
-- 169	Porto Imports Co.	de Castro	Isabel 	(1) 356-5555	Estrada da sa├║de n. 58		Lisboa		1756	Portugal		0.00
-- 206	Asian Shopping Network, Co	Walker	Brydey	+612 9411 1555	Suntec Tower Three	8 Temasek	Singapore		038988	Singapore		0.00
-- 223	Nat├╝rlich Autos	Kloss	Horst 	0372-555188	Taucherstra├ƒe 10		Cunewalde		01307	Germany		0.00
-- 237	ANG Resellers	Camino	Alejandra 	(91) 745 6555	Gran V├¡a, 1		Madrid		28001	Spain		0.00
-- 247	Messner Shopping Network	Messner	Renate 	069-0555984	Magazinweg 7		Frankfurt		60528	Germany		0.00
-- 273	Franken Gifts, Co	Franken	Peter 	089-0877555	Berliner Platz 43		M├╝nchen		80805	Germany		0.00
-- 293	BG&E Collectables	Harrison	Ed	+41 26 425 50 01	Rte des Arsenaux 41 		Fribourg		1700	Switzerland		0.00
-- 303	Schuyler Imports	Schuyler	Bradley	+31 20 491 9555	Kingsfordweg 151		Amsterdam		1043 GR	Netherlands		0.00
-- 307	Der Hund Imports	Andersen	Mel	030-0074555	Obere Str. 57		Berlin		12209	Germany		0.00
-- 335	Cramer Spezialit├ñten, Ltd	Cramer	Philip 	0555-09555	Maubelstr. 90		Brandenburg		14776	Germany		0.00
-- 348	Asian Treasures, Inc.	McKenna	Patricia 	2967 555	8 Johnstown Road		Cork	Co. Cork		Ireland		0.00
-- 356	SAR Distributors, Co	Kuger	Armand	+27 21 550 3555	1250 Pretorius Street		Hatfield	Pretoria	0028	South Africa		0.00
-- 361	Kommission Auto	Josephs	Karin	0251-555259	Luisenstr. 48		M├╝nster		44087	Germany		0.00
-- 369	Lisboa Souveniers, Inc	Rodriguez	Lino 	(1) 354-2555	Jardim das rosas n. 32		Lisboa		1675	Portugal		0.00
-- 376	Precious Collectables	Urs	Braun	0452-076555	Hauptstr. 29		Bern		3012	Switzerland	1702	0.00
-- 409	Stuttgart Collectable Exchange	M├╝ller	Rita 	0711-555361	Adenauerallee 900		Stuttgart		70563	Germany		0.00
-- 443	Feuer Online Stores, Inc	Feuer	Alexander 	0342-555176	Heerstr. 22		Leipzig		04179	Germany		0.00

-- MySQL DELETE EXISTS example
-- One final task in archiving the customer data is to delete the customers that exist in the customers_archive table from the customers table.
