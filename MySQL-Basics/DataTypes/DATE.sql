-- SHOW VARIABLES LIKE '%time_zone%'
-- system_time_zone	    India Standard Time
-- time_zone	        +03:00
-- MySQL uses yyyy-mm-dd format for storing a date value. This format is fixed and it is not possible to change it.

-- For example, you may prefer to use mm-dd-yyyy format but you can’t. Instead, you follow the standard date format and use the DATE_FORMAT function to format the date the way you want.

-- MySQL Date values with two-digit years
-- MySQL stores the year of the date value using four digits. In case you use two-digit year values, MySQL still accepts them with the following rules:

-- Year values in the range 00-69 are converted to 2000-2069.
-- Year values in the range 70-99 are converted to 1970 – 1999.
CREATE TABLE people (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL
);
INSERT INTO people(first_name,last_name,birth_date)
VALUES('John','Doe','1990-09-01');

select * from people;
-- 1	John	Doe	1990-09-01
INSERT INTO people(first_name,last_name,birth_date)
VALUES('Abhram','Doe','70-09-01'), ('Lara','Tendua','69-09-01');
-- 4	Abhram	Doe	    1970-09-01
-- 5	Lara	Tendua	2069-09-01

-- MySQL Date Functions
SELECT NOW();
-- 2024-03-01 14:25:24
SELECT DATE(NOW());
-- 2024-03-01
-- To get the current system date, you use  CURDATE() function as follows:
SELECT CURDATE();
-- 2024-03-01
SELECT date_format(curdate(), '%m - %d - %Y') as today;
-- today
-- 03 - 01 - 2024
-- To calculate the number of days between two date values, you use the DATEDIFF function as follows:
SELECT datediff('2024-01-01', '2024-02-29') days;
-- days
-- 59

SELECT DATEDIFF('2015-11-04','2014-11-04') days;
-- days
-- 365

-- To add a number of days, weeks, months, years, etc., to a date value, you use the DATE_ADD function:
select 
	'2024-01-01' start,
	date_add('2024-01-01', interval 1 day) as 'one day later',
    date_add('2024-01-01', interval 1 week) as 'one week later',
    date_add('2024-01-01', interval 1 month) as 'one month later',
    date_add('2024-01-01', interval 1 year) as 'one year later';
-- 2024-01-01	2024-01-02	2024-01-08	2024-02-01	2025-01-01
-- Similarly, you can subtract an interval from a date using the DATE_SUB function:
SELECT 
    '2015-01-01' start,
    DATE_SUB('2015-01-01', INTERVAL 1 DAY) 'one day before',
    DATE_SUB('2015-01-01', INTERVAL 1 WEEK) 'one week before',
    DATE_SUB('2015-01-01', INTERVAL 1 MONTH) 'one month before',
    DATE_SUB('2015-01-01', INTERVAL 1 YEAR) 'one year before';
-- 2015-01-01	2014-12-31	2014-12-25	2014-12-01	2014-01-01

SELECT DAY('2000-12-31') day, 
    MONTH('2000-12-31') month, 
    QUARTER('2000-12-31') quarter, 
    YEAR('2000-12-31') year;
-- +------+-------+---------+------+
-- | day  | month | quarter | year |
-- +------+-------+---------+------+
-- |   31 |    12 |       4 | 2000 |
-- +------+-------+---------+------+
-- 1 row in set (0.00 sec)
SELECT 
    WEEKDAY('2000-12-31') weekday,
    WEEK('2000-12-31') week,
    WEEKOFYEAR('2000-12-31') weekofyear;
-- +---------+------+------------+
-- | weekday | week | weekofyear |
-- +---------+------+------------+
-- |       6 |   53 |         52 |
-- +---------+------+------------+
-- 1 row in set (0.04 sec)

-- The week function returns the week number with the zero-based index if you don’t pass the second argument or if you pass 0. If you pass 1, it will return the week number with 1-indexed.

SELECT 
    WEEKDAY('2000-12-31') weekday,
    WEEK('2000-12-31',1) week,
    WEEKOFYEAR('2000-12-31') weekofyear;
-- +---------+------+------------+
-- | weekday | week | weekofyear |
-- +---------+------+------------+
-- |       6 |   52 |         52 |
-- +---------+------+------------+
-- 1 row in set (0.00 sec)