use classicmodels;

SELECT
    employeeNumber,
    customerNumber
from
    customers
    right join employees on employeeNumber = salesRepEmployeeNumber
where
    customerNumber is null
order by
    employeeNumber;

-- employeeNumber   customerNumber
-- 1002	            null
-- 1056	            null
-- 1076	            null
-- 1088	            null
-- 1102	            null
-- 1143	            null
-- 1619	            null
-- 1625	            null

use classicmodels;
SELECT
	employeeNumber,
    customerNumber,
    territory
from 
	customers
right join employees
	on employeeNumber = salesRepEmployeeNumber
right join offices
	using(officeCode)
where customerNumber is null
order by employeeNumber;

-- 1002		NA
-- 1056		NA
-- 1076		NA
-- 1088		APAC
-- 1102		EMEA
-- 1143		NA
-- 1619		APAC
-- 1625		Japan