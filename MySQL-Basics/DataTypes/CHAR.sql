-- The CHAR data type is a fixed-length character type in MySQL. You often declare the CHAR type with a length that specifies the maximum number of characters that you want to store. For example, CHAR(20) can hold up to 20 characters.
-- If the data that you want to store is a fixed size, then you should use the CHAR data type. You’ll get a better performance in comparison with VARCHAR this case.
-- The length of the CHAR data type can be any value from 0 to 255. When you store a CHAR value, MySQL pads its value with spaces to the length that you declared.
-- When you query the CHAR value, MySQL removes the trailing spaces.
CREATE TABLE mysql_char_test (
    status CHAR(3)
);
INSERT INTO mysql_char_test(status)
VALUES('Yes'),('No');
-- done
INSERT INTO mysql_char_test(status)
VALUES('Yes'),('Nooo');
-- data too long
SELECT 
    status, 
    LENGTH(status)
FROM
    mysql_char_test;
-- Yes	3
-- No	2

-- insert a CHAR value with the leading and trailing spaces.
INSERT INTO mysql_char_test(status)
VALUES(' Y ');
-- Finally, query the inserted values, and you will see that MySQL removes the trailing spaces.
-- Yes	3
-- No	2
-- Y	2


-- MySQL CHAR and UNIQUE index
-- If the CHAR column has a UNIQUE index and you insert a value that is different from an existing value in a number of trailing spaces, MySQL will reject the changes because of duplicate-key error.

CREATE UNIQUE INDEX uidx_status 
ON mysql_char_test(status);

INSERT INTO mysql_char_test(status)
VALUES('N');
-- done
INSERT INTO mysql_char_test(status)
VALUES('N ');
-- error (duplicate found)
INSERT INTO mysql_char_test(status)
VALUES(' N');
-- done