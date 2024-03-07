-- Introduction to MySQL Stored Function
-- A stored function is a specialized type of stored program designed to return a single value. Typically, you use stored functions to encapsulate common formulas or business rules, making them reusable across SQL statements or other stored programs.
-- Unlike a stored procedure, you can use a stored function in SQL statements wherever you use an expression. This enhances the readability and maintainability of the procedural code.
-- To create a stored function, you use the CREATE FUNCTION statement. The following illustrates the basic syntax for creating a new stored function:
-- DELIMITER $$
-- CREATE FUNCTION function_name(
--     param1,
--     param2,…
-- )
-- RETURNS datatype
-- [NOT] DETERMINISTIC
-- BEGIN
--  -- statements
-- END $$
-- DELIMITER ;

-- In this syntax:
-- First, specify the name of the stored function that you want to create after CREATE FUNCTION keywords.
-- Second, list all parameters of the stored function inside the parentheses followed by the function name.
-- By default, stored functions consider all parameters as IN parameters. You cannot specify IN , OUT or INOUT modifiers to parameters
-- Third, specify the data type of the return value in the RETURNS statement, which can be any valid MySQL data types.
-- Fourth, determine whether a function is deterministic or not using the DETERMINISTIC keyword.
-- A deterministic function always returns the same result for the same input parameters, while a non-deterministic function produces different results for the same input parameters.
-- If you don’t use DETERMINISTIC or NOT DETERMINISTIC, MySQL defaults to the NOT DETERMINISTIC option.
-- Finally, write the code in the body of the stored function in the BEGIN...END block.

-- Inside the body section, you need to include at least one RETURN statement. The RETURN statement sends a value to the calling programs.
-- Upon reaching the RETURN statement, the stored function terminates the execution of the stored function immediately.

-- MySQL CREATE FUNCTION example
delimiter $$

create function CustomerLevel(
	credit decimal(10,2)
)
returns varchar(20)
DETERMINISTIC
begin
	declare customerLevel varchar(20);
    
    if credit > 50000 then
		set customerLevel = 'PLATINUM';
	ELSEIF (credit <= 50000 and credit >= 10000) then
		set customerLevel = 'GOLD';
	ELSEIF credit < 10000 then
		set customerLevel = 'SILVER';
	end if;
	
    return (customerLevel);
    
end$$

delimiter ;

SHOW FUNCTION STATUS WHERE db = 'classicmodels';

SELECT 
    customerName, 
    CustomerLevel(creditLimit),
    creditLimit
FROM
    customers
ORDER BY 
    customerName;

-- Alpha Cognac	PLATINUM	61100.00
-- Amica Models & Co.	PLATINUM	113000.00
-- Anna's Decorations, Ltd	PLATINUM	107800.00
-- Atelier graphique	GOLD	21000.00
-- Australian Collectables, Ltd	PLATINUM	60300.00
-- Australian Collectors, Co.	PLATINUM	117300.00
-- Australian Gift Network, Co	PLATINUM	51600.00
-- Auto Associés & Cie.	PLATINUM	77900.00
-- Auto Canal+ Petit	PLATINUM	95000.00
-- Auto-Moto Classics Inc.	GOLD	23000.00
-- AV Stores, Co.	PLATINUM	136800.00
-- Baane Mini Imports	PLATINUM	81700.00
-- Bavarian Collectables Imports, Co.	PLATINUM	77000.00
-- Blauer See Auto, Co.	PLATINUM	59700.00
-- Boards & Toys Co.	SILVER	9000.00
-- CAF Imports	PLATINUM	59600.00
-- ....

drop function CustomerLevel;


-- Calling a stored function in a stored procedure
-- The following statement creates a new stored procedure that calls the CustomerLevel() stored function:
delimiter $$

create procedure GetCustomerLevel(
	IN customerNo int,
    OUT customerLevel varchar(20)
)
begin
	declare credit decimal(10,2) default 0;
    
    select creditLimit
    into credit
    from customers
    where customerNo = customerNumber;
    
    set customerLevel = CustomerLevel(credit);
    
end$$

delimiter ;

call GetCustomerLevel(131, @level);
select @level; -- PLATINUM

call GetCustomerLevel(103, @level);
select @level; -- GOLD

drop procedure GetCustomerLevel;

-- A stored function is a reusable and encapsulated piece of code in a database that performs a specific task and returns a single value.
-- Use the CREATE FUNCTION statement to create a stored function.
-- Use stored functions to enhance the modularity and efficiency of SQL statements.