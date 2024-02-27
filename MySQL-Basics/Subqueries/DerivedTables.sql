-- A derived table is a virtual table returned from a SELECT statement. A derived table is similar to a temporary table, but using a derived table in the SELECT statement is much simpler than a temporary table because it does not require creating a temporary table.
-- The term derived table and subquery is often used interchangeably. When a stand-alone subquery is used in the FROM clause of a SELECT statement, it is also called a derived table.
-- SELECT 
--     select_list
-- FROM
--     (SELECT 
--         select_list
--     FROM
--         table_1) derived_table_name
-- WHERE 
--     derived_table_name.c1 > 0;
-- top five products by sales revenue in 2003 from the orders and orderdetails tables in the sample database:
use classicmodels;

select
    productCode,
    round(sum(quantityOrdered * priceEach)) as total_sales
from
    orderDetails
    inner join orders using (orderNumber)
where
    year(shippedDate) = 2003
group by
    productCode
order by
    total_sales
limit
    5 
    
    -- S24_1937	10186
    -- S24_2840	10523
    -- S32_2206	10678
    -- S24_2972	10790
    -- S72_1253	11802
    -- alternative using derived table

select
    productName,
    total_sales
from
    (
        select
            productCode,
            round(sum(quantityOrdered * priceEach)) as total_sales
        from
            orderDetails
            inner join orders using (orderNumber)
        where
            year(shippedDate) = 2003
        group by
            productCode
        order by
            total_sales
        limit
            5
    ) as any_derived_table_name
    inner join products using (productCode) 
    
    -- 1939 Chevrolet Deluxe Coupe	10186
    -- 1958 Chevy Corvette Limited Edition	10523
    -- 1982 Ducati 996 R	10678
    -- 1982 Lamborghini Diablo	10790
    -- Boeing X-32A JSF	11802
