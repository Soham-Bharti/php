-- To create a new database in MySQL, you use the CREATE DATABASE statement. The following illustrates the basic syntax of the CREATE DATABASE statement:
-- CREATE DATABASE [IF NOT EXISTS] database_name
-- [CHARACTER SET charset_name]
-- [COLLATE collation_name];
-- Code language: SQL (Structured Query Language) (sql)
-- In this syntax:
-- First, specify the name of the database after the CREATE DATABASE keywords. The database name must be unique within a MySQL server instance. If you attempt to create a database with an existing name, MySQL will issue an error.
-- Second, use the IF NOT EXISTS option to create a database if it doesn’t exist conditionally.
-- Third, specify the character set and collation for the new database. If you skip the CHARACTER SET and COLLATE clauses, MySQL will use the default character set and collation for the new database.

mysql> show databases;
-- +--------------------+
-- | Database           |
-- +--------------------+
-- | classicmodels      |
-- | information_schema |
-- | mydb1              |
-- | mydb2              |
-- | mydb3              |
-- | mysql              |
-- | performance_schema |
-- | sys                |
-- +--------------------+
-- 8 rows in set (0.00 sec)

mysql> create database testDB;
-- Query OK, 1 row affected (0.07 sec)

mysql> show databases;
-- +--------------------+
-- | Database           |
-- +--------------------+
-- | classicmodels      |
-- | information_schema |
-- | mydb1              |
-- | mydb2              |
-- | mydb3              |
-- | mysql              |
-- | performance_schema |
-- | sys                |
-- | testdb             |
-- +--------------------+
-- 9 rows in set (0.00 sec)
-- Finally, select the newly created database to work with by using the USE statement:
USE testdb;
-- Output:
-- Database changed
-- Now, you can start creating tables and other database objects within the  testdb database.
-- To quit the mysql program, type exit command:
exit
-- Output:
-- Bye