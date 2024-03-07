-- The IF statement allows you to evaluate one or more conditions and execute the corresponding code block if the condition is true.

-- The IF statement has three forms:

-- IF...THEN statement: Evaluate one condition and execute a code block if the condition is true.
-- IF...THEN...ELSE statement: Evaluate one condition and execute a code block if the condition is true; otherwise, execute another code block.
-- IF...THEN...ELSEIF...ELSE statement: Evaluate multiple conditions and execute a code block if a condition is true. If all conditions are false, execute the code block in the ELSE branch.

delimiter $$

create procedure GetCustomerLevel(
	IN pCustomerNumber int,
    OUT pCustomerLevel varchar(20)
)
begin
	declare credit decimal default 0;
    
	select creditLimit 
    into credit
    from customers
    where customerNumber = pCustomerNumber;
    
    if credit > 50000 then 
		set pCustomerLevel = 'PLATINUM';
	elseif credit <= 50000 and credit > 10000 then
		set pCustomerLevel = 'GOLD';
	else 
		set pCustomerLevel = 'SILVER';
	end if;
end $$

delimiter ;

call GetCustomerLevel(114, @level);
select @level; -- PLATINUM

call GetCustomerLevel(103, @level);
select @level; -- GOLD

call GetCustomerLevel(219, @level);
select @level; -- SILVER


-- Use IF...THEN statement to conditionally execute a block of statements based on the evaluation of a specified condition.
-- Use IF...THEN...ELSE statement to execute a block of statements if a specified condition is true and an alternative block of statements if the condition is false.
-- Use IF...THEN...ELSEIF...ELSE statement to evaluate multiple conditions sequentially and execute corresponding blocks of statements based on the first true condition, with an optional block of statements to execute if none of the conditions is true.