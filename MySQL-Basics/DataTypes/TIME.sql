-- MySQL uses the 'HH:MM:SS' format for querying and displaying a time value that represents a time of day, which is within 24 hours. 
-- To represent a time interval between two events, MySQL uses the 'HHH:MM:SS' format, which is larger than 24 hours.

-- A TIME value ranges from -838:59:59 to 838:59:59. In addition, a TIME value can have a fractional seconds part that is up to microseconds precision (6 digits). 

-- column_name TIME(N);
-- OR
-- column_name TIME;
-- MySQL TIME data type example
CREATE TABLE tests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    start_at TIME,
    end_at TIME
);
INSERT INTO tests(name,start_at,end_at)
VALUES('Test 1', '08:00:00','10:00:00');
SELECT 
    name, start_at, end_at
FROM
    tests;
-- +--------+----------+----------+
-- | name   | start_at | end_at   |
-- +--------+----------+----------+
-- | Test 1 | 08:00:00 | 10:00:00 |
-- +--------+----------+----------+
-- 1 row in set (0.00 sec)

-- MySQL TIME literals
INSERT INTO tests(name,start_at,end_at)
VALUES('Test 2','083000','101500');
select * from tests;
-- +--------+----------+----------+
-- | name   | start_at | end_at   |
-- +--------+----------+----------+
-- | Test 1 | 08:00:00 | 10:00:00 |
-- | Test 2 | 08:30:00 | 10:15:00 |
-- +--------+----------+----------+
-- 2 rows in set (0.00 sec)

-- However, 108000 is not a valid time value because 80 does not represent the correct minute. In this case, MySQL will raise an error if you try to insert an invalid time value into a table.

INSERT INTO tests(name,start_at,end_at)
VALUES('Test invalid','083000','108000');
-- Error Code: 1292. Incorrect time value: '108000' for column 'end_at' at row 1

-- For the time interval, you can use the 'D HH:MM:SS' format where D represents days with a range from 0 to 34. A more flexible syntax is 'HH:MM', 'D HH:MM', 'D HH', or 'SS'.

-- If you use the delimiter :, you can use one digit to represent hours, minutes, or seconds. For example, 9:5:0 can be used instead of '09:05:00'.

INSERT INTO tests(name,start_at,end_at)
VALUES('Test 4','9:5:0',100500);
-- +----+--------+----------+----------+
-- | id | name   | start_at | end_at   |
-- +----+--------+----------+----------+
-- |  1 | Test 1 | 08:00:00 | 10:00:00 |
-- |  2 | Test 2 | 08:30:00 | 10:15:00 |
-- |  3 | Test 3 | 08:20:00 | 10:20:00 |
-- |  4 | Test 4 | 09:05:00 | 10:05:00 |
-- +----+--------+----------+----------+
-- 4 rows in set (0.00 sec)

-- Useful MySQL TIME functions
-- 1) Getting the current time
SELECT 
    CURRENT_TIME() AS string_now,
    CURRENT_TIME() + 0 AS numeric_now;
-- 14:53:51	145351

-- 2) Adding and Subtracting time from a TIME value

select current_time(), 
    addtime(current_time(), 023000), 
    subtime(current_time(), 023000);
-- 14:55:38	    17:25:38	12:25:38

-- TIMEDIFF() function to get a difference between two TIME values.
select timediff(end_at, start_at)
from tests
-- 02:00:00
-- 92:50:00
-- 01:48:00

-- 3) Formatting MySQL TIME values
SELECT 
    name,
    TIME_FORMAT(start_at, '%h:%i %p') start_at,
    TIME_FORMAT(end_at, '%h:%i %p') end_at
FROM
    tests;
-- Test 1	08:00 AM	10:00 AM
-- Test 2	08:30 AM	05:20 AM
-- Test 2	08:30 AM	10:18 AM

-- %h means two-digit hours from 0 to 12.
-- i means two-digit minutes from 0 to 60.
-- p means AM or PM.

-- 4) Extracting hour, minute, and second from a TIME value
select 
	start_at,
	hour(start_at) hour,
    minute(start_at) minute,
    second(start_at) second
from 
	tests
-- 08:00:00	8	0	0
-- 08:30:00	8	30	0
-- 08:30:00	8	30	0

-- 5) Getting UTC time value
select current_time(), utc_time();
-- 15:01:05	09:31:05