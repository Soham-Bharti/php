-- When you use the INSERT statement to add multiple rows to a table and if an error occurs during the processing, MySQL terminates the statement and returns an error. Consequently, the table remains unchanged with no inserted rows.
-- The INSERT IGNORE statement allows you to disregard rows containing invalid data that would otherwise trigger an error and insert only rows that contain valid data.

-- INSERT IGNORE INTO table(column_list)
-- VALUES(value_list),
--       (value_list),
--       ...;

-- MySQL INSERT IGNORE example
CREATE TABLE subscribers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(130) NOT NULL UNIQUE
);
-- done
INSERT INTO subscribers(email)
VALUES('john.doe@gmail.com');
-- done

INSERT INTO subscribers(email)
VALUES('john.doe@gmail.com'), 
      ('jane.smith@ibm.com');
-- Error Code: 1062. Duplicate entry 'john.doe@gmail.com' for key 'subscribers.email'

INSERT IGNORE INTO subscribers(email)
VALUES('john.doe@gmail.com'), 
      ('jane.smith@ibm.com');
-- 1 row(s) affected, 1 warning(s): 1062 Duplicate entry 'john.doe@gmail.com' for key 'subscribers.email' Records: 2  Duplicates: 1  Warnings: 1

select * from subscribers;
-- 4	jane.smith@ibm.com
-- 1	john.doe@gmail.com

-- HERE DATA IS NOT INSERTED BUT THE AUTO_INCREMENT IS INCREMENTING everytime

-- MySQL INSERT IGNORE and STRICT mode
-- When the strict mode is on, MySQL returns an error and aborts the INSERT statement if you try to insert invalid values into a table.
-- However, if you use the INSERT IGNORE statement, MySQL will issue a warning instead of an error. In addition, it will try to adjust the values to make them valid before adding the value to the table.

CREATE TABLE tokens (
    s VARCHAR(6)
);
-- done
INSERT INTO tokens VALUES('abcdefg');
-- Error Code: 1406. Data too long for column 's' at row 1
INSERT IGNORE INTO tokens VALUES('abcdefg');
-- 1 row(s) affected, 1 warning(s): 1265 Data truncated for column 's' at row 1
