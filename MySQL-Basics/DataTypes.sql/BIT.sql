-- MySQL BIT data type and how to store BIT data in a column of a table
-- syntax
-- column_name BIT(n)
-- The BIT(n) can store up to n-bit values. The n can range from 1 to 64. The default value of n is 1 if you skip it.

-- So the following syntaxes are equivalent:
-- column_name BIT(1);
-- and
-- column_name BIT;
-- BIT literals
-- To specify a bit value literal, you use b'val' or 0bval notation, which val is a binary value that contains only 0 and 1.

-- The leading b can be written as B, for example, the following are valid bit literals:
-- b01
-- B11
-- However, the leading 0b is case-sensitive. Therefore, you cannot use 0B
-- MySQL BIT data type examples
-- The following statement creates a new table named working_calendars that has the days column is BIT(7)

use test;

create table working_calender(
	year INT,
    week INT,
    days BIT(7),
    PRIMARY KEY (year,week)
);
-- done
-- The values in the column days indicate whether the day is a working day or day off i.e., 1: working day and 0: day off.

-- Suppose that Saturday and Friday of the first week of 2017 are not working days, you can insert a row into the working_calendars table:
insert into working_calender(year, week, days)
VALUES (2017,1,b'1111100');
-- done
insert into working_calender(year, week, days)
VALUES (2017,2,B'1111100');
-- done
select * from working_calender;
-- year     week    days
-- 2017	    1	    124
-- 2017	    2	    124
-- The output indicates that the bit value in the  days column is converted into an integer. To represent it as bit values, you use the BIN function:
select year,week,bin(days) from working_calender;
-- year     week    days
-- 2017	    1	    1111100
-- 2017	    2	    1111100

insert into working_calender(year, week, days)
values (2017,3,0b111100);
-- done
insert into working_calender(year, week, days)
values (2017,4,0B111100);
-- Error Code: 1054. Unknown column '0B111100' in 'field list'

select year, week, bin(days) from working_calender
-- year     week    bin(days)
-- 2017	    1	    1111100
-- 2017	    2	    1111100
-- 2017	    3	    111100

-- The output shows that MySQL removed the leading zeros before returning the result. To display it correctly, you can use the LPAD() function:
select year, week, lpad(bin(days),7,'0') from working_calender;
-- year     week    lpad(bin(days),7,'0')
-- 2017	    1	    1111100
-- 2017	    2	    1111100
-- 2017	    3	    0111100

-- Use MySQL BIT data type to store BIT data in a table.