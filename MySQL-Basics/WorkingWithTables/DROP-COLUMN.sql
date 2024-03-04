-- MySQL DROP COLUMN statement
-- ALTER TABLE table_name
-- DROP COLUMN column_name;
-- or
-- ALTER TABLE table_name
-- DROP column_name;
-- There are some important points you should remember before removing a column from a table:
-- Removing a column from a table makes all database objects such as stored procedures, views, and triggers that referencing the dropped column invalid. For example, you may have a stored procedure that refers to a column. When you remove the column, the stored procedure becomes invalid. To fix it, you have to manually change the stored procedure’s code.
-- The code from other applications that depends on the dropped column must be also changed, which takes time and efforts.
-- Dropping a column from a large table can impact the performance of the database during the removal time.
use test;
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    excerpt VARCHAR(400),
    content TEXT,
    created_at DATETIME,
    updated_at DATETIME
);
desc posts;
-- id	int	NO	PRI
-- title	varchar(255)	NO	
-- excerpt	varchar(400)	YES	
-- content	text	YES	
-- created_at	datetime	YES	
-- updated_at	datetime	YES	

alter table posts
drop excerpt;
des posts;
-- id	int	NO	PRI
-- title	varchar(255)	NO	
-- content	text	YES	
-- created_at	datetime	YES	
-- updated_at	datetime	YES	

-- dropping multiple columns 
alter table posts
drop created_at,
drop updated_at
desc posts;
-- id	int	NO	PRI
-- title	varchar(255)	NO	
-- content	text	YES	

-- MySQL drop a column which is a foreign key example
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);
alter table posts
add column category_id int not null;
-- make the category_id column as a foreign key column of that references to the id column of the categories table
alter table posts
add constraint fk_cat
foreign key (category_id)
references categories (id)
desc posts;
-- filed        type            null    key 
-- id	        int	            NO	    PRI
-- title        varchar(255)	NO	
-- content	    text	        YES	
-- category_id	int	            NO	    MUL

alter table posts
drop category_id
-- Error Code: 1828. Cannot drop column 'category_id': needed in a foreign key constraint 'fk_cat'

-- To avoid this error, you must remove the foreign key constraint before dropping the column.
alter table posts
drop FOREIGN KEY fk_cat

alter table posts
drop category_id
-- done this time