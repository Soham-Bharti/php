-- The INSERT statement allows you to insert one or more rows into a table. 
-- INSERT INTO table(column1, column2,...) 
-- VALUES 
--   (value1, value2,...), 
--   (value1, value2,...), 
--   ...
--   (value1, value2,...);

CREATE TABLE tasks (
  task_id INT AUTO_INCREMENT PRIMARY KEY, 
  title VARCHAR(255) NOT NULL, 
  start_date DATE, 
  due_date DATE, 
  priority TINYINT NOT NULL DEFAULT 3, 
  description TEXT
);
-- 1) Basic MySQL INSERT statement example
insert into tasks(title, priority) values('Learn PHP by Soham', 1);
-- done
SELECT * FROM tasks;
-- 1	Learn PHP by Soham	null null   1   null

-- 2) Inserting rows using default value example
insert into tasks(title, priority) values('Learn MySQL by Soham', default);
SELECT * FROM tasks;
-- 1	Learn PHP by Soham			    1
-- 2	Learn MySQL by Soham			3

-- 3) Inserting dates into the table example
insert into tasks(title, start_date, due_date) values('Insert into table by Soham', '2018-07-20', '2024-7-27');
SELECT * FROM tasks;
-- 1	Learn PHP by Soham			                        1
-- 2	Learn MySQL by Soham			                    3
-- 3	Insert into table by Soham	2018-07-20	2024-07-27	3

-- 4) Inserting multiple rows example
INSERT INTO tasks(title, priority)
VALUES
	('My first task', 1),
	('It is the second task',2),
	('This is the third task of the week',3);
-- done
SELECT * FROM tasks;
-- 1	Learn PHP by Soham			                        1
-- 2	Learn MySQL by Soham			                    3
-- 3	Insert into table by Soham	2018-07-20	2024-07-27	3
-- 4	My first task			                            1
-- 5	It is the second task			                    2
-- 6	This is the third task of the week			        3

-- 5) Dealing with auto-increment column
CREATE TABLE t(
   id INT AUTO_INCREMENT PRIMARY KEY
);
insert into t values();
-- done
-- +----+
-- | id |
-- +----+
-- |  1 |
-- +----+
-- 1 row in set (0.00 sec)

