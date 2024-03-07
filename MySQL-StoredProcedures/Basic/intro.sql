-- When you use MySQL Workbench or the mysql shell to execute a query on the MySQL Server, the server processes the query and returns the result set.

-- If you intend to save this query on the database server for later execution, one way to achieve this is by using a stored procedure.

-- The following CREATE PROCEDURE statement creates a new stored procedure encapsulating the query above:

DELIMITER $$

CREATE PROCEDURE GetCustomers()
BEGIN
	SELECT 
		customerName, 
		city, 
		state, 
		postalCode, 
		country
	FROM
		customers
	ORDER BY customerName;    
END$$
DELIMITER ;

-- By definition, a stored procedure is a set of declarative SQL statements stored within the MySQL Server. In this example, we have just created a stored procedure named GetCustomers().

-- After saving the stored procedure, you can invoke it by using the CALL statement:

CALL GetCustomers();

-- The statement returns the same result as the query.

-- The initial invocation of a stored procedure involves the following actions by MySQL:

-- First, find the stored procedure by its name in the database catalog.
-- Second, compile the code of the stored procedure.
-- Third, store the compiled stored procedure in a cache memory area.
-- Finally, execute the stored procedure.
-- If you invoke the same stored procedure again within the same session, MySQL will execute it from the cache without the need for recompilation.

-- A stored procedure can have parameters, allowing you to pass values to it and retrieve results.

-- For example, you can define a stored procedure that returns customers by country and city. In this case, the country and city are parameters of the stored procedure. Additionally, a stored procedure may incorporate control flow statements such as IF, CASE, and LOOP.

-- A stored procedure can call other stored procedures or stored functions, enabling you to organize your code more effectively.


-- advantages of stored procedures:
-- Reduce network traffic
-- Centralize business logic in the database
-- Make the database more secure

-- disadvantages
-- Resource usage
-- Troubleshooting
-- Maintenances 