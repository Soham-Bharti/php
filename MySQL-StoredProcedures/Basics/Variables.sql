-- To declare a variable inside a stored procedure, you use the DECLARE  statement as follows:

-- DECLARE variable_name datatype(size) [DEFAULT default_value];

-- Variable scopes
-- A variable has its own scope, which determines its lifetime. If you declare a variable inside a stored procedure, it will be out of scope when the END statement of the stored procedure is reached.

-- When you declare a variable inside the BEGIN...END block, it goes out of scope once the END is reached.

-- MySQL allows you to declare two or more variables that share the same name in different scopes because a variable is only effective within its scope.

-- However, declaring variables with the same name in different scopes is not considered good programming practice.

-- A variable whose name begins with the @ sign is a session variable, available and accessible until the session ends.
delimiter $$

create procedure getTotalOrders()
begin
	declare totalOrder int default 0;
    
	select 
		count(*)
	into totalOrder
    from orders;
    
    select totalOrder;
end$$

delimiter ;
-- done

call getTotalOrders();
-- totalOrders
-- 326
