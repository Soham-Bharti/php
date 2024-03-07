-- A MySQL client program, such as MySQL Workbench or the mysql program, uses the default delimiter (;) to separate statements and execute each separately.

-- However, a stored procedure consists of multiple statements separated by a semicolon (;).

-- If you use a MySQL client program to define a stored procedure that contains semicolons, the MySQL client program will not treat the entire stored procedure as a single statement; instead, it will recognize it as multiple statements.

-- Therefore, it is necessary to temporarily redefine the delimiter so that you can pass the entire stored procedure to the server as a single statement.

-- To redefine the default delimiter, you use the DELIMITER command as follows:

DELIMITER delimiter_character

-- The delimiter_character may consist of a single character or multiple characters, such as // or $$. However, you should avoid using the backslash (\) because it’s the escape character in MySQL.

DELIMITER //

SELECT * FROM customers //

SELECT * FROM products //


-- example
DELIMITER $$

CREATE PROCEDURE CreatePersonTable()
BEGIN
	DROP TABLE IF EXISTS persons;
    
    CREATE TABLE persons(
		id int AUTO_INCREMENT primary key,
        first_name varchar(255) not null,
        last_name VARCHAR(255) not null
	);
    
    INSERT INTO persons(first_name, last_name)
    values('Soham', 'Bharti'), ('Chintu', 'Doe');
    
    SELECT * from persons;
END $$

DELIMITER ;
-- done

call CreatePersonTable;
-- id   first_name  last_name
-- 1	Soham	    Bharti
-- 2	Chintu	    Doe


-- First, change the default delimiter to $$.
-- Second, use the semicolon (;) in the body of the stored procedure and $$ after the END keyword to end the stored procedure.
-- Third, revert to the default delimiter(;).