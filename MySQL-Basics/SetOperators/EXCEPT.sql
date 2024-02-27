-- EXCEPT operator to find the set difference between two sets of data
-- query1
-- EXCEPT [ALL | DISTINCT]
-- query2;
-- 1) Simple MySQL EXCEPT operator example
SELECT
    id
FROM
    t2
EXCEPT
SELECT
    id
FROM
    t1;

-- id
-- 4
-- 5
-- 2) Practical MySQL EXCEPT operator example
-- find the first names that appear in the employees table but do not appear in the customers table:
select
    firstName
from
    employees
except
select
    contactFirstName
from
    customers -- Diane
    -- Gerard
    -- Anthony
    -- Foon Yue
    -- George
    -- Loui
    -- Pamela
    -- Larry
    -- Barry
    -- Andy
    -- Tom
    -- Mami
    -- Yoshimi
    -- Martin
    -- 3) Using the EXCEPT operator with the ORDER BY clause example
select
    firstName
from
    employees
except
select
    contactFirstName
from
    customers
order by
    firstName -- Andy
    -- Anthony
    -- Barry
    -- Diane
    -- Foon Yue
    -- George
    -- Gerard
    -- Larry
    -- Loui
    -- Mami
    -- Martin
    -- Pamela
    -- Tom
    -- Yoshimi
    -- 4) Using the EXCEPT operator with the ALL option
select
    firstName
from
    employees
except
    all
select
    contactFirstName
from
    customers
order by
    firstName 
    -- Andy
    -- Anthony
    -- Barry
    -- Diane
    -- Foon Yue
    -- George
    -- Gerard
    -- Gerard
    -- Larry
    -- Loui
    -- Mami
    -- Martin
    -- Pamela
    -- Tom
    -- Yoshimi