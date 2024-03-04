-- MySQL DATETIME data type allows you to store a value that contains both date and time.

-- When you query data from a DATETIME column, MySQL displays the DATETIME value in the following format:

-- 'YYYY-MM-DD HH:MM:SS'
-- Code language: SQL (Structured Query Language) (sql)
-- When you insert a value into a DATETIME column, you use the same format. For example:

-- INSERT INTO table_name(datetime_column)
-- VALUES('2023-12-31 15:30:45');

CREATE table events(
	id int AUTO_INCREMENT PRIMARY KEY,
    event_name varchar(255) not null,
    started_at DATETIME not null DEFAULT now()
);
-- or
CREATE table events(
	id int AUTO_INCREMENT PRIMARY KEY,
    event_name varchar(255) not null,
    started_at DATETIME not null DEFAULT current_timestamp
);

INSERT INTO events(event_name)
VALUES('Connected to MySQL Server');

SELECT * FROM events;
+----+---------------------------+---------------------+
| id | event_name                | started_at          |
+----+---------------------------+---------------------+
|  1 | Connected to MySQL Server | 2024-03-01 11:35:06 |
+----+---------------------------+---------------------+
1 row in set (0.00 sec)

-- By default, DATETIME values range from 1000-01-01 00:00:00 to 9999-12-31 23:59:59. MySQL uses 5 bytes to store a DATETIME value.

-- In addition, a DATETIME value can include a trailing fractional second up to microseconds with the format YYYY-MM-DD HH:MM:SS[.fraction] e.g., 2015-12-20 10:01:00.999999.

-- DATETIME vs.TIMESTAMP
-- TIMESTAMP values range from 1970-01-01 00:00:01 UTC to 2038-01-19 03:14:07 UTC. If you want to store temporal values that are beyond 2038, you should use DATETIME instead of TIMESTAMP.

-- MySQL stores TIMESTAMP in UTC value. However, MySQL stores the DATETIME value as is without timezone. Let’s see the following example.

-- First, set the timezone of the current connection to +00:00.

SET SESSION time_zone = '+00:00';
-- done
CREATE TABLE timestamp_n_datetime (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ts TIMESTAMP,
    dt DATETIME
);
-- done

INSERT INTO timestamp_n_datetime(ts,dt)
VALUES(NOW(),NOW());
-- done
SELECT * from timestamp_n_datetime;
-- id  ts                      dt
-- 1   2024-03-01 11:44:47     2024-03-01 11:44:47

SET SESSION time_zone = '+03:00';

SELECT 
    ts, 
    dt
FROM
    timestamp_n_datetime;
-- 2024-03-01 09:14:47     2024-03-01 11:44:47

-- MySQL DATETIME functions
set @dt = now();
select @dt;
-- 2024-03-01 12:14:48

SELECT DATE(@dt);
-- 2024-03-01
select * from test_dt where created_at = '2024-7-27';
-- 1	2024-07-27 00:00:00
insert into test_dt(created_at)
values ('2024-7-28 14:20:58');
select * from test_dt where (created_at) = '2024-7-28';
-- nothing returned
-- This is because the created_at column contains not only the date but also the time. 
select * from test_dt where DATE(created_at) = '2024-7-28';
-- 2	2024-07-28 14:20:58

-- MySQL TIME function
select time(@dt);
-- 12:14:48.000000


-- MySQL YEAR, QUARTER, MONTH, WEEK, DAY, HOUR, MINUTE and SECOND functions
-- To get the year, quarter, month, week, day, hour, minute, and second from a DATETIME value, you use the functions as shown in the following statement:
select 
	HOUR(@dt),
    MINUTE(@dt),
    SECOND(@dt),
    DAY(@dt),
    WEEK(@dt),
    MONTH(@dt),
    QUARTER(@dt),
    YEAR(@dt);
-- 12	14	48	1	8	3	1	2024

-- MySQL DATE_FORMAT function
-- To format a DATETIME value, you use the DATE_FORMAT function. For example, the following statement formats a DATETIME value based on the %H:%i:%s - %W %M %Y format:

SELECT DATE_FORMAT(@dt, '%H:%i:%s - %W %M %Y');
-- 12:24:13 - Friday March 2024

-- MySQL DATE_ADD function
-- DATE_ADD(start_date, INTERVAL expr unit);
SELECT @dt start, 
       DATE_ADD(@dt, INTERVAL 1 SECOND) '1 second later',
       DATE_ADD(@dt, INTERVAL 1 MINUTE) '1 minute later',
       DATE_ADD(@dt, INTERVAL 1 HOUR) '1 hour later',
       DATE_ADD(@dt, INTERVAL 1 DAY) '1 day later',
       DATE_ADD(@dt, INTERVAL 1 WEEK) '1 week later',
       DATE_ADD(@dt, INTERVAL 1 MONTH) '1 month later',
       DATE_ADD(@dt, INTERVAL 1 YEAR) '1 year later';
-- 2024-03-01 12:24:13	2024-03-01 12:24:14	2024-03-01 12:25:13	2024-03-01 13:24:13	2024-03-02 12:24:13	2024-03-08 12:24:13	2024-04-01 12:24:13	2025-03-01 12:24:13

-- MySQL DATE_SUB function
SELECT @dt start, 
       DATE_SUB(@dt, INTERVAL 1 SECOND) '1 second before',
       DATE_SUB(@dt, INTERVAL 1 MINUTE) '1 minute before',
       DATE_SUB(@dt, INTERVAL 1 HOUR) '1 hour before',
       DATE_SUB(@dt, INTERVAL 1 DAY) '1 day before',
       DATE_SUB(@dt, INTERVAL 1 WEEK) '1 week before',
       DATE_SUB(@dt, INTERVAL 1 MONTH) '1 month before',
       DATE_SUB(@dt, INTERVAL 1 YEAR) '1 year before';
-- 2024-03-01 12:24:13	2024-03-01 12:24:12	2024-03-01 12:23:13	2024-03-01 11:24:13	2024-02-29 12:24:13	2024-02-23 12:24:13	2024-02-01 12:24:13	2023-03-01 12:24:13

-- MySQL DATE_DIFF function
-- To calculate a difference in days between two DATETIME values, you use the DATEDIFF function. Notice that the DATEDIFF function only considers the date part of a DATETIME value in the calculation.
CREATE TABLE datediff_test (
    dt DATETIME
);
INSERT INTO datediff_test(dt)
VALUES('2010-04-30 07:27:39'),
	('2010-05-17 22:52:21'),
	('2010-05-18 01:19:10'),
	('2010-05-22 14:17:16'),
	('2010-05-26 03:26:56'),
	('2010-06-10 04:44:38'),
	('2010-06-13 13:55:53');
-- done
SELECT 
    dt, 
    DATEDIFF(NOW(), dt)
FROM
    datediff_test;
-- 2010-04-30 07:27:39	5054
-- 2010-05-17 22:52:21	5037
-- 2010-05-18 01:19:10	5036
-- 2010-05-22 14:17:16	5032
-- 2010-05-26 03:26:56	5028
-- 2010-06-10 04:44:38	5013
-- 2010-06-13 13:55:53	5010

    SELECT 
    dt, 
    now(),
    DATEDIFF(NOW(), dt)
FROM
    datediff_test
order by dt;
-- 2010-04-30 07:27:39	2024-03-01 12:30:47	5054
-- 2010-05-17 22:52:21	2024-03-01 12:30:47	5037
-- 2010-05-18 01:19:10	2024-03-01 12:30:47	5036
-- 2010-05-22 14:17:16	2024-03-01 12:30:47	5032
-- 2010-05-26 03:26:56	2024-03-01 12:30:47	5028
-- 2010-06-10 04:44:38	2024-03-01 12:30:47	5013
-- 2010-06-13 13:55:53	2024-03-01 12:30:47	5010