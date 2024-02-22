-- The right join clause is similar to the left join clause except that the treatment of left and right tables is reversed. The right join starts selecting data from the right table instead of the left table.
-- The right join clause selects all rows from the right table and matches rows in the left table. If a row from the right table does not have matching rows from the left table, the column of the left table will have NULL in the final result set.
-- Here is the syntax of the right join:
-- SELECT column_list 
-- FROM table_1 
-- RIGHT JOIN table_2 ON join_condition;
-- Code language: SQL (Structured Query Language) (sql)
-- Similar to the left join clause, the right clause also supports the USING syntax:
-- SELECT column_list 
-- FROM table_1 
-- RIGHT JOIN table_2 USING (column_name);
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    RIGHT JOIN committees c USING(name);

-- +-----------+-------------+--------------+----------------+
-- | member_id | member_name | committee_id | committee_name |
-- +-----------+-------------+--------------+----------------+
-- |         1 | Soham       |            1 | Soham          |
-- |         3 | Mary        |            2 | Mary           |
-- |         5 | Amaresh     |            3 | Amaresh        |
-- |      NULL | NULL        |            4 | Joe            |
-- +-----------+-------------+--------------+----------------+
-- 4 rows in set (0.00 sec)
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    RIGHT JOIN committees c ON c.name = m.name;

-- +-----------+-------------+--------------+----------------+
-- | member_id | member_name | committee_id | committee_name |
-- +-----------+-------------+--------------+----------------+
-- |         1 | Soham       |            1 | Soham          |
-- |         3 | Mary        |            2 | Mary           |
-- |         5 | Amaresh     |            3 | Amaresh        |
-- |      NULL | NULL        |            4 | Joe            |
-- +-----------+-------------+--------------+----------------+
-- 4 rows in set (0.00 sec)
-- To find the committee members who are not in the members table, you use this query:
select
    m.member_id,
    m.name as member_name,
    c.committee_id,
    c.name AS committee_name
from
    members m
    RIGHT JOIN committees c ON c.name = m.name
WHERE
    m.name IS NULL;

-- +-----------+-------------+--------------+----------------+
-- | member_id | member_name | committee_id | committee_name |
-- +-----------+-------------+--------------+----------------+
-- |      NULL | NULL        |            4 | Joe            |
-- +-----------+-------------+--------------+----------------+
-- 1 row in set (0.00 sec)