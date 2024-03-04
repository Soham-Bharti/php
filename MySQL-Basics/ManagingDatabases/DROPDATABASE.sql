-- The DROP DATABASE statement drops all tables in the database and deletes the database permanently. Therefore, you need to be very careful when using this statement.
-- The following shows the syntax of the DROP DATABASE statement:
DROP DATABASE [IF EXISTS] database_name;
-- In MySQL schema is the synonym for the database
DROP SCHEMA [IF EXISTS] database_name;

DROP DATABASE testdb;
-- Query OK, 0 rows affected (0.03 sec)