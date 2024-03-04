-- A NOT NULL constraint ensures that values stored in a column are not NULL.
-- Synatax
-- column_name data_type NOT NULL;
-- A column may have only one NOT NULL constraint, which enforces the rule that the column must not contain any NULL values.
-- In other words, if you attempt to update or insert a NULL value into a NOT NULL column, MySQL will issue an error.

create table tasks (
	id int AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) not null,
    start_date DATE NOT NULL,
    end_date DATE
);

desc tasks
-- id           int	            NO	    PRI		auto_increment
-- title	    varchar(255)	NO			
-- start_date	date	        NO			
-- end_date	    date	        YES		

-- It’s a good practice to have the NOT NULL constraint in every column of a table unless you have a specific reason not to.

-- Generally, NULL values may complicate your queries because you need to use NULL-related functions such as ISNULL(), IFNULL(), and NULLIF() to handle them.

-- Adding a NOT NULL constraint to an existing column
INSERT INTO tasks(title ,start_date, end_date)
VALUES('Learn MySQL NOT NULL constraint', '2017-02-01','2017-02-02'),
      ('Check and update NOT NULL constraint to your database', '2017-02-01',NULL);
-- done

alter table tasks
change end_date 
		end_date DATE NOT NULL;
-- Error Code: 1138. Invalid use of NULL value
UPDATE tasks 
SET 
    end_date = start_date + 7
WHERE
    end_date IS NULL;
-- done
select * from tasks
-- 1	Learn MySQL NOT NULL constraint	                        2017-02-01	2017-02-02
-- 2	Check and update NOT NULL constraint to your database	2017-02-01	2017-02-08

alter table tasks
change end_date 
		end_date DATE NOT NULL;
-- 0 row(s) affected Records: 0  Duplicates: 0  Warnings: 0
-- or
alter table tasks
modify end_date DATE Not null ;
-- 0 row(s) affected Records: 0  Duplicates: 0  Warnings: 0

desc tasks
-- id	        int	            NO	    PRI		auto_increment
-- title	    varchar(255)	NO			
-- start_date	date	        NO			
-- end_date	    date	        NO			

-- Removing a NOT NULL constraint
-- ALTER TABLE table_name
-- MODIFY column_name column_definition;

alter table tasks
modify end_date DATE
-- 0 row(s) affected Records: 0  Duplicates: 0  Warnings: 0
--  or 
alter table tasks
change end_date 
end_date DATE;
-- 0 row(s) affected Records: 0  Duplicates: 0  Warnings: 0

desc tasks
-- id	        int	            NO	    PRI		auto_increment
-- title	    varchar(255)	NO			
-- start_date	date	        NO			
-- end_date	    date	        YES			

-- Use NOT NULL constraint to ensure that a column does not contain any NULL values.
-- Use ALTER TABLE ... CHANGE statement to add a NOT NULL constraint to an existing column.
-- Use ALTER TABLE ... MODIFY to drop a NOT NULL constraint from a column.