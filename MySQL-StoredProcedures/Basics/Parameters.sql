-- A parameter in a stored procedure has one of three modes: IN, OUT, or INOUT.

-- IN parameters
-- IN is the default mode. When defining an IN parameter in a stored procedure, the calling program must pass an argument to the stored procedure.

-- Additionally, the value of an IN parameter is protected. This means that even if you change the value of the IN parameter inside the stored procedure, its original value remains unchanged after the stored procedure ends. In other words, the stored procedure works only on the copy of the IN parameter.

-- OUT parameters
-- The value of an OUT parameter can be modified within the stored procedure, and its updated value is then passed back to the calling program.

-- Note that stored procedures cannot access the initial value of the OUT parameter when they begin.

-- INOUT parameters
-- An INOUT  parameter is a combination of IN and OUT parameters. This means that the calling program may pass the argument, and the stored procedure can modify the INOUT parameter and pass the new value back to the calling program.

-- Defining a parameter
-- Here is the basic syntax for defining a parameter in stored procedures:

[IN | OUT | INOUT] parameter_name datatype[(length)]
-- In this syntax,

-- First, specify the parameter mode, which can be IN , OUT or INOUT depending on the purpose of the parameter in the stored procedure.
-- Second, provide the name of the parameter. The parameter name must follow the naming rules of the column name in MySQL.
-- Third, define the data type and maximum length of the parameter.


-- EXAMPLE IN 

delimiter //

create procedure getOfficeByCountry(
	IN countryName varchar(255)
)
BEGIN
	SELECT * from offices
    where country = countryName;
END //

delimiter ;
-- done

call getOfficeByCountry('USA');
-- 1	San Francisco	+1 650 219 4782	100 Market Street	Suite 300	CA	USA	94080	NA
-- 2	Boston	+1 215 837 0825	1550 Court Place	Suite 102	MA	USA	02107	NA
-- 3	NYC	+1 212 555 3000	523 East 53rd Street	apt. 5A	NY	USA	10022	NA

call getOfficebycountry();
-- Error Code: 1318. Incorrect number of arguments for PROCEDURE classicmodels.getOfficebycountry; expected 1, got 0


-- EXAMPLE OUT
delimiter $$

CREATE procedure GetOrderCountByStatus(
	IN order_status varchar(25),
    OUT total int
)
BEGIN
	select count(orderNumber)
    INTO total
    from orders
    where status = order_status;
END $$

delimiter ;
-- done
-- The stored procedure GetOrderCountByStatus() has two parameters:

-- The orderStatus is the IN parameter specifies the status of orders to return.
-- The total is the OUT parameter that stores the number of orders in a specific status.
-- To find the number of orders that already shipped, you call GetOrderCountByStatus and pass the order status as of Shipped, and also pass a session variable ( @total ) to receive the return value.
call GetOrderCountByStatus('Shipped', @total);
select @total as total_count;
-- total_count
-- 303


-- EXAMPLE INOUT

delimiter $%$

create procedure setCounter(
	INOUT counter int,
    IN increment int
)
BEGIN 
	set counter = counter + increment;
END $%$

delimiter ;
-- done

set @counter = 1;
call setCounter(@counter, 1);
call setCounter(@counter, 1);
select @counter;
-- `@counter
-- 2

call setCounter(@counter, 5);
select @counter;
-- `@counter
-- 7