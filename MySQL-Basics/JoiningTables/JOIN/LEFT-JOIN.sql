-- The left join selects data starting from the left table. For each row in the left table, the left join compares with every row in the right table.
-- If the values in the two rows satisfy the join condition, the left join clause creates a new row whose columns contain all columns of the rows in both tables and includes this row in the result set.
-- If the values in the two rows are not matched, the left join clause still creates a new row whose columns contain columns of the row in the left table and NULL for columns of the row in the right table.
-- In other words, the left join selects all data from the left table whether there are matching rows exist in the right table or not.
-- In case there are no matching rows from the right table found, the left join uses NULLs for columns of the row from the right table in the result set.
-- Here is the basic syntax of a left join clause that joins two tables:
-- SELECT column_list 
-- FROM table_1 
-- LEFT JOIN table_2 ON join_condition;
-- Code language: SQL (Structured Query Language) (sql)
-- The left join also supports the USING clause if the column used for matching in both tables is the same:
-- SELECT column_list 
-- FROM table_1 
-- LEFT JOIN table_2 USING (column_name);
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    LEFT JOIN committees c USING(name);

-- +-----------+---------+--------------+-----------+
-- | member_id | member  | committee_id | committee |
-- +-----------+---------+--------------+-----------+
-- |         1 | Soham   |            1 | Soham     |
-- |         2 | Aman    |         NULL | NULL      |
-- |         3 | Mary    |            2 | Mary      |
-- |         4 | Sonu    |         NULL | NULL      |
-- |         5 | Amaresh |            3 | Amaresh   |
-- +-----------+---------+--------------+-----------+
-- 5 rows in set (0.00 sec)
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    LEFT JOIN committees c ON m.name = c.name;

-- To find members who are not the committee members, you add a WHERE clause and IS NULL operator as follows:
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    LEFT JOIN committees c ON m.name = c.name
WHERE
    c.committee_id IS NULL;

-- +-----------+-------------+--------------+----------------+
-- | member_id | member_name | committee_id | committee_name |
-- +-----------+-------------+--------------+----------------+
-- |         2 | Aman        |         NULL | NULL           |
-- |         4 | Sonu        |         NULL | NULL           |
-- +-----------+-------------+--------------+----------------+
-- 2 rows in set (0.00 sec)