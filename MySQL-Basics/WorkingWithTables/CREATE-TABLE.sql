-- CREATE TABLE – show you how to create new tables in a database using the CREATE TABLE statement.
-- CREATE TABLE [IF NOT EXISTS] table_name(
--    column1 datatype constraints,
--    column1 datatype constraints,
-- ) ENGINE=storage_engine;

-- 1) Basic CREATE TABLE statement example
CREATE TABLE tasks (
id int PRIMARY KEY,
title varchar(30) NOT NULL,
start_date DATE,
`end date` DATE
);

desc tasks;
-- id	int	NO	PRI	
-- title	varchar(30)	NO		
-- start_date	date	YES		
-- end date	date	YES		

-- 2) Creating a table with a foreign key example
create table checklists (
id INT,
task_id INT,
title VARCHAR(255) not null,
is_completed BOOLEAN NOT NULL DEFAULT false,
PRIMARY KEY (id, task_id),
FOREIGN KEY(task_id)
	REFERENCES tasks (id)
    ON update RESTRICT
    on delete cascade
);
