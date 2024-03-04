-- MySQL does not have a dedicated Boolean data type. Instead, MySQL uses TINYINT(1) to represent the BOOLEAN data type.
-- To make it more convenient when defining BOOLEAN column, MySQL offers BOOLEAN or BOOL as the synonym for TINYINT(1).
-- So instead of defining a BOOLEAN column like this:
-- column_name TINYINT(1)
-- You can use the BOOL or BOOLEAN keyword as follows:
-- column_name BOOL
-- In MySQL, the convention is that zero is considered false, while a non-zero value is considered true.
-- When working with Boolean literals, you can use the constants true and false case-insensitively, which is equivalent to 1 and 0 respectively. For example:
-- SELECT true, false, TRUE, FALSE, True, False;
-- Output:
-- 1 0 1 0 1 0

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    completed BOOLEAN
);
-- done 

DESCRIBE tasks;
-- +-----------+--------------+------+-----+---------+----------------+
-- | Field     | Type         | Null | Key | Default | Extra          |
-- +-----------+--------------+------+-----+---------+----------------+
-- | id        | int          | NO   | PRI | NULL    | auto_increment |
-- | title     | varchar(255) | NO   |     | NULL    |                |
-- | completed | tinyint(1)   | YES  |     | NULL    |                |
-- +-----------+--------------+------+-----+---------+----------------+
-- 3 rows in set (0.00 sec)

INSERT INTO tasks(title, completed) 
VALUES 
  ('Master MySQL Boolean type', true), 
  ('Design database table', false);
-- done
SELECT 
  id, 
  title, 
  completed 
FROM 
  tasks;
-- +----+---------------------------+-----------+
-- | id | title                     | completed |
-- +----+---------------------------+-----------+
-- |  1 | Master MySQL Boolean type |         1 |
-- |  2 | Design database table     |         0 |
-- +----+---------------------------+-----------+
-- 2 rows in set (0.00 sec)

-- The output indicates that MySQL converted the true and false to 1 and 0 respectively.

INSERT INTO tasks(title, completed) 
VALUES 
  ('Test Boolean with a number', 2);
-- Query OK, 1 row affected (0.01 sec)
-- because BOOLEAN is TINYINT(1), you can insert values other than 1 and 0 into the BOOLEAN column. 

SELECT * FROM tasks;
-- +----+----------------------------+-----------+
-- | id | title                      | completed |
-- +----+----------------------------+-----------+
-- |  1 | Master MySQL Boolean type  |         1 |
-- |  2 | Design database table      |         0 |
-- |  3 | Test Boolean with a number |         2 |
-- +----+----------------------------+-----------+
-- 3 rows in set (0.00 sec)

-- If you want to output the result as true and false, you can use the IF function as follows:
SELECT 
  id, 
  title, 
  IF(completed, 'true', 'false') completed 
FROM 
  tasks;
-- +----+----------------------------+-----------+
-- | id | title                      | completed |
-- +----+----------------------------+-----------+
-- |  1 | Master MySQL Boolean type  | true      |
-- |  2 | Design database table      | false     |
-- |  3 | Test Boolean with a number | true      |
-- +----+----------------------------+-----------+
-- 3 rows in set (0.00 sec)

-- insert NULL into the completed column:
INSERT INTO tasks(title, completed) 
VALUES 
  ('Test Boolean with NULL', NULL);
-- done

SELECT * FROM tasks;
-- +----+----------------------------+-----------+
-- | id | title                      | completed |
-- +----+----------------------------+-----------+
-- |  1 | Master MySQL Boolean type  |         1 |
-- |  2 | Design database table      |         0 |
-- |  3 | Test Boolean with a number |         2 |
-- |  4 | Test Boolean with NULL     |      NULL |
-- +----+----------------------------+-----------+
-- 4 rows in set (0.00 sec)

-- MySQL BOOLEAN operators
-- To retrieve all completed tasks from the tasks table, you might come up with the following query:
SELECT * FROM `tasks` WHERE id = true
-- +----+---------------------------+-----------+
-- | id | title                     | completed |
-- +----+---------------------------+-----------+
-- |  1 | Master MySQL Boolean type |         1 |
-- +----+---------------------------+-----------+
-- 1 row in set (0.00 sec)
-- The query returned the task with completed value 1. It does not show the task with the completed value 2 because TRUE is 1, not 2.

-- To fix it, you can use the IS operator:
SELECT * FROM `tasks` WHERE completed is true;
-- +----+----------------------------+-----------+
-- | id | title                      | completed |
-- +----+----------------------------+-----------+
-- |  1 | Master MySQL Boolean type  |         1 |
-- |  3 | Test Boolean with a number |         2 |
-- +----+----------------------------+-----------+
-- 2 rows in set (0.00 sec)

SELECT * FROM `tasks` WHERE completed is not true;
-- +----+------------------------+-----------+
-- | id | title                  | completed |
-- +----+------------------------+-----------+
-- |  2 | Design database table  |         0 |
-- |  4 | Test Boolean with NULL |      NULL |
-- +----+------------------------+-----------+
-- 2 rows in set (0.00 sec)

-- MySQL has no dedicated BOOLEAN data type. Instead, it uses TINYINT(1) to represent the BOOLEAN type.
-- Use the BOOLEAN keyword to declare a column with the BOOLEAN type. The BOOLEAN and TINYINT(1) are synonyms.
-- By convention, zero is false while non-zero is true.