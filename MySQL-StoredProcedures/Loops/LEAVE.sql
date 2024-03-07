The following shows the basic syntax of the LEAVE statement:

LEAVE label;
Code language: SQL (Structured Query Language) (sql)
In this syntax, you specify the label of the block that you want to exit after the LEAVE keyword.

Using the LEAVE statement to exit a stored procedure
If the label is the outermost of the stored procedure  or function block, LEAVE terminates the stored procedure or function.

The following statement shows how to use the LEAVE statement to exit a stored procedure:

CREATE PROCEDURE sp_name()
sp: BEGIN
    IF condition THEN
        LEAVE sp;
    END IF;
    -- other statement
END$$


DELIMITER $$

CREATE PROCEDURE LeaveDemo(OUT result VARCHAR(100))
BEGIN
    DECLARE counter INT DEFAULT 1;
    DECLARE times INT;
    -- generate a random integer between 4 and 10
    SET times  = FLOOR(RAND()*(10-4+1)+4);
    SET result = '';
    disp: LOOP
        -- concatenate counters into the result
        SET result = concat(result,counter,',');
        
        -- exit the loop if counter equals times
        IF counter = times THEN
            LEAVE disp; 
        END IF;
        SET counter = counter + 1;
    END LOOP;
END$$

DELIMITER ;

CALL LeaveDemo(@result);
SELECT @result;
-- 1,2,3,4,5,6,7,8,
CALL LeaveDemo(@result);
SELECT @result;
-- 1,2,3,4,
CALL LeaveDemo(@result);
SELECT @result;
-- 1,2,3,4,5,6