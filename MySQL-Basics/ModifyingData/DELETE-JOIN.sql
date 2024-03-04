-- A single DELETE statement on multiple tables.
-- A single DELETE statement on multiple related tables which the child table has an ON DELETE CASCADE referential action for the foreign key.
-- This tutorial introduces to you a more flexible way to delete data from multiple tables using INNER JOIN or LEFT JOIN clause with the DELETE statement.
-- MySQL DELETE JOIN with INNER JOIN
-- MySQL allows you to use the INNER JOIN clause in the DELETE statement to delete rows from one table that has matching rows in another table.
-- For example, to delete rows from both T1 and T2 tables that meet a specified condition, you use the following statement:

-- DELETE T1, T2
-- FROM T1
-- INNER JOIN T2 ON T1.key = T2.key
-- WHERE condition;

-- Notice that you place table names T1 and T2 between the DELETE and FROM keywords. If you omit T1 table, the DELETE statement only deletes rows in T2 table. Similarly, if you omit T2 table, the DELETE statement will delete only rows in T1 table.
-- The expression T1.key = T2.key specifies the condition for matching rows between T1 andT2 tables that will be deleted.
-- The condition of the  WHERE clause determines rows in the T1 and T2 that will be deleted.
-- MySQL DELETE JOIN with INNER JOIN example

DROP TABLE IF EXISTS t1, t2;

CREATE TABLE t1 (
    id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE t2 (
    id VARCHAR(20) PRIMARY KEY,
    ref INT NOT NULL
);

INSERT INTO t1 VALUES (1),(2),(3);

INSERT INTO t2(id,ref) VALUES('A',1),('B',2),('C',3);
-- all above done

DELETE t1,t2 FROM t1
        INNER JOIN
    t2 ON t2.ref = t1.id 
WHERE
    t1.id = 1;
-- done (2 rows affected)

-- MySQL DELETE JOIN with LEFT JOIN
-- We often use the LEFT JOIN clause in the SELECT statement to find rows in the left table that have or don’t have matching rows in the right table.

-- We can also use the LEFT JOIN clause in the DELETE statement to delete rows in a table (left table) that does not have matching rows in another table (right table).

-- The following syntax illustrates how to use DELETE statement with LEFT JOIN clause to delete rows from T1 table that does not have corresponding rows in the T2 table:

-- DELETE T1 
-- FROM T1
--         LEFT JOIN
--     T2 ON T1.key = T2.key 
-- WHERE
--     T2.key IS NULL;
-- Note that we only put T1 table after the DELETE keyword, not both T1 and T2 tables like we did with the INNER JOIN clause.

use classicmodels;
delete customers
from customers left join orders using(customerNumber)
where orderNumber is null;
-- 24 row(s) affected

select * from customers
inner join orders using (customerNumber)
where orderNumber is null
-- 0 row(s) returned
