-- INSERT INTO table_name (column_list) 
-- VALUES 
--   (value_list_1), 
--   (value_list_2),
--    ... 
--   (value_list_n);

-- MySQL INSERT multiple rows limit
-- In theory, you can insert any number of rows using a single INSERT statement.

-- However, when the MySQL server receives an INSERT statement whose size is bigger than the value specified by the max_allowed_packet option, it issues a packet too large error and terminates the connection.

-- This statement shows the current value of the max_allowed_packet variable:

SHOW VARIABLES LIKE 'max_allowed_packet';
-- max_allowed_packet	67108864

-- The number in the Value column is the number of bytes. Note that the value in your database server may be different.

-- To set a new value for the max_allowed_packet variable, you use the SET GLOBAL statement:

SET GLOBAL max_allowed_packet=size;

-- 1) Insert multiple rows into a table
CREATE TABLE projects(
  project_id INT AUTO_INCREMENT, 
  name VARCHAR(100) NOT NULL, 
  start_date DATE, 
  end_date DATE, 
  PRIMARY KEY(project_id)
);
-- done
INSERT INTO projects(name, start_date, end_date) 
VALUES 
  ('AI for Marketing', '2019-08-01', '2019-12-31'), 
  ('ML for Sales', '2019-05-15', '2019-11-20');
  -- done

SELECT * FROM projects;
-- 1	AI for Marketing	2019-08-01	2019-12-31
-- 2	ML for Sales	2019-05-15	2019-11-20

-- 2) Using the LAST_INSERT_ID() function
INSERT INTO projects(name, start_date, end_date) 
VALUES 
  ('NeuroSynthIQ', '2023-12-01', '2024-12-31'), 
  ('QuantumMind Explorer', '2023-05-15', '2024-12-20'), 
  ('SentientBot Assistant', '2023-05-15','2024-10-20'); 
SELECT last_insert_id();
-- 3
-- The output shows that the LAST_INSERT_ID() returns the id of the first row in the three rows, not the id of the last row.
SELECT * FROM projects;
-- +------------+-----------------------+------------+------------+
-- | project_id | name                  | start_date | end_date   |
-- +------------+-----------------------+------------+------------+
-- |          1 | AI for Marketing      | 2019-08-01 | 2019-12-31 |
-- |          2 | ML for Sales          | 2019-05-15 | 2019-11-20 |
-- |          3 | NeuroSynthIQ          | 2023-12-01 | 2024-12-31 |
-- |          4 | QuantumMind Explorer  | 2023-05-15 | 2024-12-20 |
-- |          5 | SentientBot Assistant | 2023-05-15 | 2024-10-20 |
-- +------------+-----------------------+------------+------------+
-- 5 rows in set (0.00 sec)