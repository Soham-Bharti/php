-- state  not null
-- country = usa, germany
-- (cus from first 10 and last 10) apply at end
-- credit limit 50k to 2L
-- print cus no., full name, country ,state ,limit

(select 
	customerNumber, 
	concat(contactFirstName, ' ', contactLastName) AS `Full Name`,
    country,
    state,
    creditLimit
from
	customers
where
	country IN ('USA', 'Germany') and (creditLimit between 50000 and 200000) and state is not null
LIMIT 10)
union all
(select 
	customerNumber, 
	concat(contactFirstName, ' ', contactLastName) AS `Full Name`,
    country,
    state,
    creditLimit
from
	customers
where
	country IN ('USA', 'Germany') and (creditLimit between 50000 and 200000) and state is not null ORDER BY customerNumber desc
LIMIT 10)