-- a temporary table is a special type of table that allows you to store a temporary result set, which you can reuse several times in a single session
-- MySQL CREATE TEMPORARY TABLE statement
-- CREATE TEMPORARY TABLE table_name(
--    column1 datatype constraints,
--    column1 datatype constraints,
--    ...,
--    table_constraints
-- );
-- or,
-- CREATE TEMPORARY TABLE temp_table_name
-- SELECT * FROM original_table
-- LIMIT 0;

-- 1) Creating a temporary table example
use classicmodels;
create temporary table credits(
	customerNumber INT PRIMARY KEY,
    creditLimit DEC(10,2)
);
INSERT INTO credits(customerNumber, creditLimit)
SELECT 
  customerNumber, 
  creditLimit 
FROM 
  customers 
WHERE 
  creditLimit > 0;

select * from credits;
-- 103	21000.00
-- 112	71800.00
-- 114	117300.00
-- 119	118200.00
-- 121	81700.00
-- 124	210500.00
-- 128	59700.00
-- 129	64600.00
-- 131	114900.00
-- 141	227600.00
-- 144	53100.00

-- 2) Creating a temporary table whose structure is based on a query example
-- The following example creates a temporary table that stores the top 10 customers by revenue. The structure of the temporary table is derived from a SELECT statement
create temporary table top_customers
select
	customerNumber,
	customerName,
    ROUND(sum(amount),2) as sales
from payments
inner join customers using(customerNumber)
group by customerNumber
order by sales desc
limit 10;

select * from top_customers order by sales;
-- 146	Saveley & Henriot, Co.	130305.35
-- 321	Corporate Gift Ideas Co.	132340.78
-- 276	Anna's Decorations, Ltd	137034.22
-- 187	AV Stores, Co.	148410.09
-- 323	Down Under Souveniers, Inc	154622.08
-- 148	Dragon Souveniers, Ltd.	156251.03
-- 151	Muscle Machine Inc	177913.95
-- 114	Australian Collectors, Co.	180585.07
-- 124	Mini Gifts Distributors Ltd.	584188.24
-- 141	Euro+ Shopping Channel	715738.98

-- Dropping a temporary table
-- DROP TEMPORARY TABLE table_name;
-- or
-- DROP TABLE table_name;

drop temporary table top_customers;
-- the temporary table top_customers was deleted

-- MySQL automatically deletes all temporary tables once the session is ended