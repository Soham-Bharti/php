-- DROP INDEX index_name 
-- ON table_name
-- [algorithm_option | lock_option];


show INDEXES from employees;
--  employees	0	PRIMARY	1	employeeNumber	A	23				BTREE			YES	
-- employees	1	reportsTo	1	reportsTo	A	7			YES	BTREE			YES	
-- employees	1	officeCode	1	officeCode	A	7				BTREE			YES	
-- employees	1	jobTitle	1	jobTitle	A	7				BTREE			YES	


drop index jobTitle 
on employees;
-- done

show INDEXES from employees;
--  employees	0	PRIMARY	1	employeeNumber	A	23				BTREE			YES	
-- employees	1	reportsTo	1	reportsTo	A	7			YES	BTREE			YES	
-- employees	1	officeCode	1	officeCode	A	7				BTREE			YES	