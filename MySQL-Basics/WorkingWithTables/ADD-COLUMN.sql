-- MySQL ADD COLUMN statement
-- ALTER TABLE table_name
-- ADD COLUMN new_column_name data_type 
-- [FIRST | AFTER existing_column];
-- First, provide the table name to which you want to add a new column after the ALTER TABLE clause.
-- Second, define the new column and its attributes after the ADD COLUMN clause. Note that COLUMN keyword is optional so you can omit it.
-- Third, specify the position of the new column in the table.

-- ALTER TABLE table_name
-- ADD [COLUMN] new_column_name data_type [FIRST|AFTER existing_column],
-- ADD [COLUMN] new_column_name data_type [FIRST|AFTER existing_column],
-- ...;

create table vendors(
	id int auto_increment primary key,
    name varchar(255)
);
desc vendors;
-- id	int	NO	PRI
-- name	varchar(255)	YES	

-- 1) Adding one column example
alter table vendors
add column phone varchar(15) after name
desc vendors;
-- id	int	NO	PRI
-- name	varchar(255)	YES	
-- phone	varchar(15)	YES	

-- 2) Adding a column as the last column
alter table vendors 
add column vendor_group int not null
desc vendors;
-- id	int	NO	PRI
-- name	varchar(255)	YES	
-- phone	varchar(15)	YES	
-- vendor_group	int	NO	

-- 3) Adding two columns example
alter table vendors
add email varchar(100) not null,
add gender enum("male", "female", "other"),
add hourly_rate decimal(10,2);
desc vendors;
-- id	int	NO	PRI
-- name	varchar(255)	YES	
-- phone	varchar(15)	YES	
-- vendor_group	int	NO	
-- email	varchar(100)	NO	
-- gender	enum('male','female','other')	YES	
-- hourly_rate	decimal(10,2)	YES	

-- 4) Adding a column that already exists
alter table vendors
add email varchar(50)
-- Error Code: 1060. Duplicate column name 'email'

-- want to check whether a column exists in a table before adding it
-- However, there is no statement like ADD COLUMN IF NOT EXISTS available. Fortunately, you can get this information from the columns table of the information_schema database as the following query:
select 
	if(count(*), 'Exist', 'Not Exist') AS result
from 
	information_schema.columns
where 
	table_schema = 'test'
		and table_name = 'vendors'
        and column_name = 'phone';
-- result
-- Exist

-- 5) Adding an auto-increment column
-- MySQL allows a table to have up to one auto-increment column and that column must be defined as a key
create table if not exists contacts(
	name varchar(255) not null
);
insert into contacts(name)
values ('Soham'), ('Bharti');
select * from contacts
-- name
-- Soham
-- Bharti

-- add id column as the auto-increment primary key column to the contacts table
alter table contacts
add id int auto_increment primary key
desc contacts;
-- name	varchar(255)	NO			
-- id	int	            NO	    PRI		auto_increment

select * from contacts;
-- name    id
-- Soham	1
-- Bharti	2