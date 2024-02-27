-- EXISTS vs IN
EXPLAIN
SELECT
    customerNumber,
    customerName
FROM
    customers
WHERE
    EXISTS(
        SELECT
            1
        FROM
            orders
        WHERE
            orders.customernumber = customers.customernumber
    );

-- 1	SIMPLE	customers		ALL	PRIMARY				98	100.00	
-- 1	SIMPLE	orders		ref	customerNumber	customerNumber	4	classicmodels.customers.customerNumber	3	100.00	Using index; FirstMatch(customers)
EXPLAIN
SELECT
    customerNumber,
    customerName
FROM
    customers
WHERE
    customerNumber IN (
        SELECT
            customerNumber
        FROM
            orders
    );

-- 1	SIMPLE	customers		ALL	PRIMARY				98	100.00	
-- 1	SIMPLE	orders		ref	customerNumber	customerNumber	4	classicmodels.customers.customerNumber	3	100.00	Using index; FirstMatch(customers)

-- #############################################################################
-- The query that uses the EXISTS operator is much faster than the one that uses the IN operator.
-- The reason is that the EXISTS operator works based on the “at least found” principle. The EXISTS stops scanning the table when a matching row is found.
-- On the other hand, when the IN operator is combined with a subquery, MySQL must process the subquery first and then use the result of the subquery to process the whole query.
-- The general rule of thumb is that if the subquery contains a large volume of data, the EXISTS operator provides better performance.
-- However, the query that uses the IN operator will perform faster if the result set returned from the subquery is very small.