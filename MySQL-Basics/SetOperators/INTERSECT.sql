--  INTERSECT operator - to find the common rows of multiple queries
-- query1
-- INTERSECT [ALL | DISTINCT]
-- query2;
-- To use the INTERSECT operator for the queries, follow these rules:
-- The order and the number of columns in the select list of the queries must be the same.
-- The data types of the corresponding columns must be compatible.
-- 1) MySQL INTERSECT operator example
select
    id
from
    t1
intersect
select
    id
from
    t2 
    -- id
    -- 1
    -- 3
    -- 4
    -- 2) A practical MySQL INTERSECT example
    -- find the common first names of customers and employees:
SELECT
    contactFirstName
from
    customers
intersect
select
    firstname
from
    employees 
    -- Peter
    -- Julie
    -- Jeff
    -- Leslie
    -- Mary
    -- Steve
    -- William
    -- 3) Using INTERSECT operator with ORDER BY clause
SELECT
    contactFirstName
from
    customers
intersect
select
    firstname
from
    employees
order by
    contactFirstName 
    -- Jeff
    -- Julie
    -- Leslie
    -- Mary
    -- Peter
    -- Steve
    -- William
    -- 4) Using INTERSECT operator with ALL option example
SELECT
    contactFirstName
from
    customers
intersect
all
select
    firstname
from
    employees
order by
    contactFirstName 
    -- Jeff
    -- Julie
    -- Leslie
    -- Leslie
    -- Mary
    -- Peter
    -- Steve
    -- William