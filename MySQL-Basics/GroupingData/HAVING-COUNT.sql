-- In MySQL, the GROUP BY clause organizes rows into groups. When you combine the GROUP BY clause with the COUNT function, you will get both the groups and the number of items in each group.
-- To filter the groups based on the number of items in each group, you use the HAVING clause and the COUNT function.
-- Note that you cannot assign an alias to the COUNT(column_2) in the SELECT clause 
-- The reason is that MySQL evaluates the HAVING clause before the SELECT clause. Therefore, at the time MySQL evaluated the HAVING clause, it doesn’t know the column alias count_c2 because it has not evaluated the SELECT clause yet.
-- 1) Simple HAVING COUNT example
-- The query shows the product names and the number of sales for each product:
select
    product_name,
    count(id) as no_of_sales_per_product
from
    sales
group by
    product_name -- Product A	2
    -- Product B	2
    -- Product C	1
select
    product_name,
    count(id) as no_of_sales_per_product
from
    sales
group by
    product_name
HAVING
    count(id) = 2;

-- Product A	2
-- Product B	2
-- 2) Practical HAVING with COUNT example
select
    customerName,
    count(*) order_count
from
    orders
    inner join customers using(customerNumber)
group by
    customerName
having
    count(*) > 4
order by
    order_count;

-- Australian Collectors, Co.	5
-- Danish Wholesale Imports	5
-- Dragon Souveniers, Ltd.	5
-- Down Under Souveniers, Inc	5
-- Reims Collectables	5
-- Mini Gifts Distributors Ltd.	17
-- Euro+ Shopping Channel	26
select
    city as x,
    count(EmployeeNumber) as empCount
from
    offices
    inner join employees using (officeCode)
group by
    x
having
    empCount > 2;

-- San Francisco	6
-- Paris	5
-- Sydney	4