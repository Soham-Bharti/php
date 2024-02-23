-- MySQL INNER JOIN clause
-- The following shows the basic syntax of the inner join clause that joins two tables table_1 and table_2:
-- SELECT column_list
-- FROM table_1
-- INNER JOIN table_2 ON join_condition;
-- Code language: SQL (Structured Query Language) (sql)
-- The inner join clause joins two tables based on a condition which is known as a join predicate.
-- The inner join clause compares each row from the first table with every row from the second table.
-- If values from both rows satisfy the join condition, the inner join clause creates a new row whose column contains all columns of the two rows from both tables and includes this new row in the result set. In other words, the inner join clause includes only matching rows from both tables.
-- If the join condition uses the equality operator (=) and the column names in both tables used for matching are the same, and you can use the USING clause instead:
-- SELECT column_list
-- FROM table_1
-- INNER JOIN table_2 USING (column_name);
-- +-----------+---------+
-- | member_id | name    |
-- +-----------+---------+
-- |         1 | Soham   |
-- |         2 | Aman    |
-- |         3 | Mary    |
-- |         4 | Sonu    |
-- |         5 | Amaresh |
-- +-----------+---------+
-- +--------------+---------+
-- | committee_id | name    |
-- +--------------+---------+
-- |            1 | Soham   |
-- |            2 | Mary    |
-- |            3 | Amaresh |
-- |            4 | Joe     |
-- +--------------+---------+
select
    m.member_id,
    m.name
from
    members AS m
    INNER JOIN committees c ON c.name = m.name;

-- +-----------+---------+
-- | member_id | name    |
-- +-----------+---------+
-- |         1 | Soham   |
-- |         3 | Mary    |
-- |         5 | Amaresh |
-- +-----------+---------+
-- 3 rows in set (0.01 sec)
-- Because both tables use the same column to match, you can use the USING clause as shown in the following query:
SELECT
    m.member_id,
    m.name AS member,
FROM
    members m
    INNER JOIN committees c USING(name);

-- or
select
    member_id,
    name
from
    members
    INNER JOIN committees USING(name);

-- +-----------+---------+
-- | member_id | name    |
-- +-----------+---------+
-- |         1 | Soham   |
-- |         3 | Mary    |
-- |         5 | Amaresh |
-- +-----------+---------+
-- 3 rows in set (0.00 sec)
select
    m.member_id,
    m.name,
    c.committee_id,
    c.name
from
    members AS m
    INNER JOIN committees c ON c.committee_id = m.member_id;

-- +-----------+-------+--------------+---------+
-- | member_id | name  | committee_id | name    |
-- +-----------+-------+--------------+---------+
-- |         1 | Soham |            1 | Soham   |
-- |         2 | Aman  |            2 | Mary    |
-- |         3 | Mary  |            3 | Amaresh |
-- |         4 | Sonu  |            4 | Joe     |
-- +-----------+-------+--------------+---------+
SELECT
    m.member_id,
    m.name AS member,
    c.committee_id,
    c.name AS committee
FROM
    members m
    INNER JOIN committees c USING(name);

-- +-----------+---------+--------------+-----------+
-- | member_id | member  | committee_id | committee |
-- +-----------+---------+--------------+-----------+
-- |         1 | Soham   |            1 | Soham     |
-- |         3 | Mary    |            2 | Mary      |
-- |         5 | Amaresh |            3 | Amaresh   |
-- +-----------+---------+--------------+-----------+
-- 3 rows in set (0.00 sec)
SELECT
    orderNumber,
    status,
    customerNumber,
    productCode,
    buyPrice,
    textDescription
from
	orders
inner join orderdetails using(orderNumber)
inner join customers using(customerNumber)
inner join products using(productCode)
inner join productlines using(productline)

-- 10100	Shipped	363	S18_1749	86.70	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10100	Shipped	363	S18_2248	33.30	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10100	Shipped	363	S18_4409	43.26	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10100	Shipped	363	S24_3969	21.75	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10101	Shipped	128	S18_2325	58.48	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10101	Shipped	128	S18_2795	72.56	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10101	Shipped	128	S24_1937	22.57	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10101	Shipped	128	S24_2022	20.61	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10102	Shipped	181	S18_1342	60.62	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10102	Shipped	181	S18_1367	24.26	Our Vintage Car models realistically portray automobiles produced from the early 1900s through the 1940s. Materials used include Bakelite, diecast, plastic and wood. Most of the replicas are in the 1:18 and 1:24 scale sizes, which provide the optimum in ...
-- 10103	Shipped	121	S10_1949	98.58	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...
-- 10103	Shipped	121	S10_4962	103.42	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...
-- 10103	Shipped	121	S12_1666	77.90	The Truck and Bus models are realistic replicas of buses and specialized trucks produced from the early 1920s to present. The models range in size from 1:12 to 1:50 scale and include numerous limited edition and several out-of-production vehicles. Materi...
-- 10103	Shipped	121	S18_1097	58.33	The Truck and Bus models are realistic replicas of buses and specialized trucks produced from the early 1920s to present. The models range in size from 1:12 to 1:50 scale and include numerous limited edition and several out-of-production vehicles. Materi...
-- 10103	Shipped	121	S18_2432	24.92	The Truck and Bus models are realistic replicas of buses and specialized trucks produced from the early 1920s to present. The models range in size from 1:12 to 1:50 scale and include numerous limited edition and several out-of-production vehicles. Materials used include tin, diecast and plastic. All models include a certificate of authenticity from their manufacturers and are a perfect ornament for the home and office.