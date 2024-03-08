-- The LOOP statement allows you to execute one or more statements repeatedly.
-- Here is the basic syntax of the LOOP statement:
-- [begin_label:] LOOP
--     statements;
-- END LOOP [end_label]
-- The LOOP can have optional labels at the beginning and end of the block.
-- Typically, you terminate the loop when a condition is true by using IF and LEAVE statements as follows:
[label]: LOOP...-- terminate the loop
IF condition THEN LEAVE [label];

END IF;

...
END LOOP;

-- The loop exits when the LEAVE statement is reached.
-- Additionally, you can use the ITERATE statement to skip the current iteration and start a new one:
[label]: LOOP...-- terminate the loop
IF condition THEN ITERATE [label];

END IF;

...
END LOOP;

-- Note that the LEAVE statement functions similarly to the break statement while the ITERATE statement works equivalently to the continue statement in other programming languages like PHP, C#, and Java.

-- my example
delimiter $$

create procedure printNumbers(
	In from_num int,
    In to_num int
)
begin
	drop table if exists numbers;
	create table numbers(
        num int
    );
	
	print_loop: loop
		insert into numbers(num) values(from_num);
        set from_num = from_num + 1;
        
		if from_num > to_num then
			leave print_loop;
		end if;
    end loop print_loop;
    select * from numbers;
end$$

delimiter ;

call printNumbers(10,20);
-- num
-- 10
-- 11
-- 12
-- 13
-- 14
-- 15
-- 16
-- 17
-- 18
-- 19
-- 20




CREATE TABLE calendars (
    date DATE PRIMARY KEY,
    month INT NOT NULL,
    quarter INT NOT NULL,
    year INT NOT NULL
);
-- done
DELIMITER //

CREATE PROCEDURE fillDates(
	IN startDate DATE,
    IN endDate DATE
)
BEGIN
	DECLARE currentDate DATE DEFAULT startDate;
    
	insert_date: LOOP
		-- increase date by one day
		SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
        
        -- leave the loop if the current date is after the end date
        IF currentDate > endDate THEN
			LEAVE insert_date;
        END IF;
        
        -- insert date into the table
        INSERT INTO calendars(date, month, quarter, year)
        VALUES(currentDate, MONTH(currentDate), QUARTER(currentDate), YEAR(currentDate));
		
    END LOOP;
END //

DELIMITER ;

CALL fillDates('2024-01-01','2024-12-31');
select * from calendars;
-- 2024-01-02	1	1	2024
-- 2024-01-03	1	1	2024
-- 2024-01-04	1	1	2024
-- 2024-01-05	1	1	2024
-- 2024-01-06	1	1	2024
-- 2024-01-07	1	1	2024
-- 2024-01-08	1	1	2024
-- 2024-01-09	1	1	2024
-- 2024-01-10	1	1	2024
-- 2024-01-11	1	1	2024
-- 2024-01-12	1	1	2024
-- 2024-01-13	1	1	2024
-- 2024-01-14	1	1	2024
-- 2024-01-15	1	1	2024
-- 2024-01-16	1	1	2024
-- 2024-01-17	1	1	2024
-- 2024-01-18	1	1	2024
-- 2024-01-19	1	1	2024
-- 2024-01-20	1	1	2024
-- 2024-01-21	1	1	2024
-- 2024-01-22	1	1	2024
-- 2024-01-23	1	1	2024
-- 2024-01-24	1	1	2024
-- 2024-01-25	1	1	2024
-- 2024-01-26	1	1	2024
-- 2024-01-27	1	1	2024
-- 2024-01-28	1	1	2024
-- 2024-01-29	1	1	2024
-- 2024-01-30	1	1	2024
-- 2024-01-31	1	1	2024
-- 2024-02-01	2	1	2024
-- 2024-02-02	2	1	2024
-- 2024-02-03	2	1	2024
-- 2024-02-04	2	1	2024
-- 2024-02-05	2	1	2024
-- 2024-02-06	2	1	2024
-- 2024-02-07	2	1	2024
-- 2024-02-08	2	1	2024
-- 2024-02-09	2	1	2024
-- 2024-02-10	2	1	2024
-- 2024-02-11	2	1	2024
-- 2024-02-12	2	1	2024
-- 2024-02-13	2	1	2024
-- 2024-02-14	2	1	2024
-- 2024-02-15	2	1	2024
-- 2024-02-16	2	1	2024
-- 2024-02-17	2	1	2024
-- 2024-02-18	2	1	2024
-- 2024-02-19	2	1	2024
-- 2024-02-20	2	1	2024
-- 2024-02-21	2	1	2024
-- 2024-02-22	2	1	2024
-- 2024-02-23	2	1	2024
-- 2024-02-24	2	1	2024
-- 2024-02-25	2	1	2024
-- 2024-02-26	2	1	2024
-- 2024-02-27	2	1	2024
-- 2024-02-28	2	1	2024
-- 2024-02-29	2	1	2024
-- 2024-03-01	3	1	2024
-- 2024-03-02	3	1	2024
-- 2024-03-03	3	1	2024
-- 2024-03-04	3	1	2024
-- 2024-03-05	3	1	2024
-- 2024-03-06	3	1	2024
-- 2024-03-07	3	1	2024
-- ...
SELECT COUNT(*) FROM calendars;
-- 365