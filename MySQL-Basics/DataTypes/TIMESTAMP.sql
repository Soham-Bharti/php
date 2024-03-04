-- The MySQL TIMESTAMP is a temporal data type that holds the combination of date and time. The format of a TIMESTAMP is YYYY-MM-DD HH:MM:SS which is fixed at 19 characters.
-- The TIMESTAMP value has a range from '1970-01-01 00:00:01' UTC to '2038-01-19 03:14:07' UTC.
-- When you insert a TIMESTAMP value into a table, MySQL converts it from your connection’s time zone to UTC for storing.
-- When you query a TIMESTAMP value, MySQL converts the UTC value back to your connection’s time zone. This conversion does not occur for other temporal data types, such as DATETIME.
-- By default, the connection time zone is the MySQL Server’s time zone. You also have the option to use a different time zone when connecting to the MySQL Server.
-- When you retrieve a TIMESTAMP value that was inserted by a client in a different time zone, you will receive a value different from the one stored in the database.
-- However, as long as you don’t change the time zone, you can retrieve the originally stored TIMESTAMP value.
-- MySQL TIMESTAMP time zone example
CREATE table t(
	ts TIMESTAMP
);

set time_zone = '+00:00';

insert INTO t(ts) values('2023-07-27 00:00:01');

select ts from t;
-- 2023-07-27 00:00:01

set time_zone = '+03:00';
select ts from t;
-- 2023-07-27 03:00:01

-- Automatic initialization and updating for TIMESTAMP columns
alter table categories
add column updated_at timestamp default current_timestamp
			on update current_timestamp;
            
INSERT INTO categories(name)
VALUES('B');
UPDATE categories 
SET name = 'B++'
WHERE id = 2;
select * from categories;
-- 1	toys	2024-03-01 10:32:26	2024-03-01 10:35:10
-- 2	B++	2024-03-01 10:35:16	2024-03-01 10:38:11
-- Notice that the value in the updated_at column changed to the timestamp at the time the row was updated.

-- The ability of a TIMESTAMP column to be automatically updated to the current timestamp when the value in any other column in the row changes from its current value is called automatic updating.

