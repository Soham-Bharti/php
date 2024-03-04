-- ques: list of such customerName who customers but haven't ordered yet
SELECT
    customerNumber,
    contactFirstName,
    contactLastName,
    state,
    orderDate,
    orderNumber,
    status
from
    customers
    left join orders using(customerNumber)
where
    orderNumber is null;

-- 125	Zbyszek 	Piestrzeniewicz				
-- 168	Keith	Franco	CT			
-- 169	Isabel 	de Castro				
-- 206	Brydey	Walker				
-- 223	Horst 	Kloss				
-- 237	Alejandra 	Camino				
-- 247	Renate 	Messner				
-- 273	Peter 	Franken				
-- 293	Ed	Harrison				
-- 303	Bradley	Schuyler				
-- 307	Mel	Andersen				
-- 335	Philip 	Cramer				
-- 348	Patricia 	McKenna	Co. Cork			
-- 356	Armand	Kuger	Pretoria			
-- 361	Karin	Josephs				
-- 369	Lino 	Rodriguez				
-- 376	Braun	Urs				
-- 409	Rita 	M├╝ller				
-- 443	Alexander 	Feuer				
-- 459	Sven 	Ottlieb				
-- 465	Carmen	Anton				
-- 477	Hanna 	Moos				
-- 480	Alexander 	Semenov				
-- 481	Raanan	Altagar,G M
SELECT
    employeeNumber,
    email,
    salesRepEmployeeNumber,
    customerName,
    amount
from
    employees
    left join customers on employeeNumber = salesRepEmployeeNumber
    left join payments using(customerNumber)
where
    amount is not null
order by
    employeeNumber;

-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	101244.59
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	85410.87
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	11044.30
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	83598.04
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	47142.70
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	55639.66
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	111654.40
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	43369.30
-- 1165	ljennings@classicmodelcars.com	1165	Mini Gifts Distributors Ltd.	45084.38
-- 1165	ljennings@classicmodelcars.com	1165	Mini Wheels Co.	26248.78
-- 1165	ljennings@classicmodelcars.com	1165	Mini Wheels Co.	23923.93
-- 1165	ljennings@classicmodelcars.com	1165	Mini Wheels Co.	16537.85
-- 1165	ljennings@classicmodelcars.com	1165	Technics Stores Inc.	2434.25
