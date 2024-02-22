-- The cross join makes a Cartesian product of rows from the joined tables. The cross join combines each row from the first table with every row from the right table to make the result set.
-- Suppose the first table has n rows and the second table has m rows. The cross-join that joins the tables will return nxm rows.
-- The following shows the syntax of the cross-join clause:
-- SELECT select_list
-- FROM table_1
-- CROSS JOIN table_2;
SELECT
    m.member_id,
    m.name AS member,
    c.committee_id,
    c.name AS committee
FROM
    members m
    CROSS JOIN committees c;

-- +-----------+---------+--------------+-----------+
-- | member_id | member  | committee_id | committee |
-- +-----------+---------+--------------+-----------+
-- |         1 | Soham   |            4 | Joe       |
-- |         1 | Soham   |            3 | Amaresh   |
-- |         1 | Soham   |            2 | Mary      |
-- |         1 | Soham   |            1 | Soham     |
-- |         2 | Aman    |            4 | Joe       |
-- |         2 | Aman    |            3 | Amaresh   |
-- |         2 | Aman    |            2 | Mary      |
-- |         2 | Aman    |            1 | Soham     |
-- |         3 | Mary    |            4 | Joe       |
-- |         3 | Mary    |            3 | Amaresh   |
-- |         3 | Mary    |            2 | Mary      |
-- |         3 | Mary    |            1 | Soham     |
-- |         4 | Sonu    |            4 | Joe       |
-- |         4 | Sonu    |            3 | Amaresh   |
-- |         4 | Sonu    |            2 | Mary      |
-- |         4 | Sonu    |            1 | Soham     |
-- |         5 | Amaresh |            4 | Joe       |
-- |         5 | Amaresh |            3 | Amaresh   |
-- |         5 | Amaresh |            2 | Mary      |
-- |         5 | Amaresh |            1 | Soham     |
-- +-----------+---------+--------------+-----------+
-- 20 rows in set (0.00 sec)