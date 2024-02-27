-- MySQL DROP TABLE statement to drop a table from the database
-- DROP [TEMPORARY] TABLE [IF EXISTS] table_name [, table_name] ...
-- [RESTRICT | CASCADE]
-- 1) Using MySQL DROP TABLE to drop a single table example
create table insurances(
	id int auto_increment primary key,
    title varchar(100) not null
);
drop table if exists insurances;
-- 0 row(s) affected

-- 2) Using MySQL DROP TABLE to drop multiple tables
CREATE TABLE CarAccessories (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DEC(10 , 2 ) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE CarGadgets (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DEC(10 , 2 ) NOT NULL,
    PRIMARY KEY(id)
);
drop table caraccessories, cargadgets

-- 3) Using MySQL DROP TABLE to drop a non-existing table
drop table nonExistingTable;
-- Error Code: 1051. Unknown table 'test.nonexistingtable'
drop table if exists nonExistingTable;
-- 0 row(s) affected, 1 warning(s): 1051 Unknown table 'test.nonexistingtable'

-- MySQL DROP TABLE based on a pattern
-- Suppose that you have many tables whose names start with test in your database and you want to remove all of them using a single DROP TABLE statement.
-- Unfortunately, MySQL does not have the DROP TABLE LIKE statement that can remove tables based on pattern matching:
-- DROP TABLE LIKE '%pattern%'
-- Code language: JavaScript (javascript)
-- However, there are some workarounds. We will discuss one of them here for your reference.
CREATE TABLE test1(
  id INT AUTO_INCREMENT,
  PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS test2 LIKE test1;
CREATE TABLE IF NOT EXISTS test3 LIKE test1;
-- declare two variables that accept database schema and a pattern that you want to the tables to match:
-- set table schema and pattern matching for tables
set @schema = 'test';
set @pattern = 'test%';
-- construct a dynamic DROP TABLE statement:
SELECT CONCAT('DROP TABLE ',GROUP_CONCAT(CONCAT(@schema,'.',table_name)),';')
into @droplike
from information_schema.tables
where @schema = database()
and table_name like @pattern;
-- The query instructs MySQL to go to the information_schema  table, which contains information on all tables in all databases, and concatenates all tables in the database @schema ( classicmodels ) that matches the pattern @pattern ( test% ) with the prefix DROP TABLE . The GROUP_CONCAT function creates a comma-separated list of tables.
-- Fourth, display the dynamic SQL to verify if it works correctly:
-- display the dynamic sql statement
SELECT @droplike;
-- DROP TABLE test.test1,test.test2,test.test3;

-- Fifth, execute the statement using a prepared statement  as shown in the following query:
-- execute dynamic sql
PREPARE stmt FROM @droplike;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
-- tables with the corresponding names were dropped successfully.