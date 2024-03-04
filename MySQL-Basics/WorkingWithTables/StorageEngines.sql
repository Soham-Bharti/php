--  path where the database  is located locally:
  select @@datadir;
-- +---------------------------------------------+
-- | @@datadir                                   |
-- +---------------------------------------------+
-- | C:\ProgramData\MySQL\MySQL Server 8.0\Data\ |
-- +---------------------------------------------+

show engines;
-- +--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
-- | Engine             | Support | Comment                                                        | Transactions | XA   | Savepoints |
-- +--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
-- | MEMORY             | YES     | Hash based, stored in memory, useful for temporary tables      | NO           | NO   | NO         |
-- | MRG_MYISAM         | YES     | Collection of identical MyISAM tables                          | NO           | NO   | NO         |
-- | CSV                | YES     | CSV storage engine                                             | NO           | NO   | NO         |
-- | FEDERATED          | NO      | Federated MySQL storage engine                                 | NULL         | NULL | NULL       |
-- | PERFORMANCE_SCHEMA | YES     | Performance Schema                                             | NO           | NO   | NO         |
-- | MyISAM             | YES     | MyISAM storage engine                                          | NO           | NO   | NO         |
-- | InnoDB             | DEFAULT | Supports transactions, row-level locking, and foreign keys     | YES          | YES  | YES        |
-- | ndbinfo            | NO      | MySQL Cluster system information storage engine                | NULL         | NULL | NULL       |
-- | BLACKHOLE          | YES     | /dev/null storage engine (anything you write to it disappears) | NO           | NO   | NO         |
-- | ARCHIVE            | YES     | Archive storage engine                                         | NO           | NO   | NO         |
-- | ndbcluster         | NO      | Clustered, fault-tolerant tables                               | NULL         | NULL | NULL       |
-- +--------------------+---------+----------------------------------------------------------------+--------------+------+------------+
-- 11 rows in set (0.01 sec)

-- InnoDB (DEFAULT storage engine)
create table table_default_mem(id int, name varchar(20));
-- Query OK, 0 rows affected (0.51 sec)
-- c:\ProgramData\MySQL\MySQL Server 8.0\Data\classicmodels\table_default_mem.ibd

-- if we want to change the storage engine: define at end as engine = MyISAM
create table table_MyISAM_mem(id int, name varchar(20)) engine = MyISAM;
-- Query OK, 0 rows affected (0.02 sec)
-- c:\ProgramData\MySQL\MySQL Server 8.0\Data\classicmodels\table_myisam_mem.MYD 
-- c:\ProgramData\MySQL\MySQL Server 8.0\Data\classicmodels\table_myisam_mem.MYI 
-- c:\ProgramData\MySQL\MySQL Server 8.0\Data\classicmodels\table_myisam_mem_390.sdi

-- if we want to change the storage engine: define at end as engine = memory
-- data inside the table is deleted as the server restarts but the table schema is present
create table table_memory_engine(id int, name varchar(20)) engine = memory;
-- Query OK, 0 rows affected (0.12 sec)
-- c:\ProgramData\MySQL\MySQL Server 8.0\Data\classicmodels\table_memory_eng_391.sdi
mysql> insert into table_memory_engine values (1,'soham'), (2, 'monu');
-- Query OK, 2 rows affected (0.21 sec)
-- Records: 2  Duplicates: 0  Warnings: 0
mysql> select * from table_memory_engine;
-- +------+-------+
-- | id   | name  |
-- +------+-------+
-- |    1 | soham |
-- |    2 | monu  |
-- +------+-------+
-- 2 rows in set (0.00 sec)

mysql> exit
-- Bye
--  ************* server restarted *************
use classicmodels;
-- Database changed
mysql> select * from table_memory_engine;
-- Empty set (0.02 sec)