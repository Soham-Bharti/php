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