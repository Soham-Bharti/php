-- First, log in to MySQL using the root user account:
mysql -u root -p
-- MySQL will prompt you for a password:
Enter password: ****


SELECT database();
+------------+
| database() |
+------------+
| NULL       |
+------------+
1 row in set (0.00 sec)

USE classicmodels;
-- Database changed

SELECT database();
-- +---------------+
-- | database()    |
-- +---------------+
-- | classicmodels |
-- +---------------+
-- 1 row in set (0.00 sec)

show databases;
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
-- 8 rows in set (0.04 sec)

-- Selecting a database when you login
-- If you know which database you want to work with before you log in, you can use the -D flag. For example, the following command connects to the classicmodels database with the user account root:
mysql -u root -D classicmodels -p
Enter password: ****
select database();
-- +---------------+
-- | database()    |
-- +---------------+
-- | classicmodels |
-- +---------------+
-- 1 row in set (0.00 sec)