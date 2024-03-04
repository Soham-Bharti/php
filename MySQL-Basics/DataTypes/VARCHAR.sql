-- MySQL VARCHAR data type
-- MySQL VARCHAR is the variable-length string whose length can be up to 65,535. MySQL stores a VARCHAR value as a 1-byte or 2-byte length prefix plus actual data.
-- The length prefix specifies the number of bytes in the value. If a column requires less than 255 bytes, the length prefix is 1 byte. In case the column requires more than 255 bytes, the length prefix is two length bytes.
-- The maximum length, however, is subject to the maximum row size (65,535 bytes) and the character set used. It means that the total length of all columns should be less than 65,535 bytes.
-- Let’s take a look at an example.
-- We will create a new table that has two columns s1 and s2 with the length of 32765(+2 for length prefix) and 32766 (+2).Note that 32765+2+32766+2=65535, which is the maximum row size.

CREATE TABLE IF NOT EXISTS varchar_test (
    s1 VARCHAR(32765) NOT NULL,
    s2 VARCHAR(32766) NOT NULL
)  CHARACTER SET 'latin1' COLLATE LATIN1_DANISH_CI;
-- done
CREATE TABLE IF NOT EXISTS varchar_test_2 (
    s1 VARCHAR(32766) NOT NULL, -- error
    s2 VARCHAR(32766) NOT NULL
)  CHARACTER SET 'latin1' COLLATE LATIN1_DANISH_CI;
-- Error Code: 1118. Row size too large. The maximum row size for the used table type, not counting BLOBs, is 65535. This includes storage overhead, check the manual. You have to change some columns to TEXT or BLOBs 0.000 sec

CREATE TABLE items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(3)
);
-- done
INSERT INTO items(title)
VALUES('ABCD');
-- error

-- MySQL VARCHAR and spaces
INSERT INTO items(title)
VALUES('AB ');
-- done
SELECT 
    id, title, length(title)
FROM
    items;
-- 1	AB 	3

-- However, MySQL will truncate the trailing spaces when inserting a VARCHAR value that contains trailing spaces which cause the column length exceeded. In addition, MySQL issues a warning. Let’s see the following example:
insert into items(title) values ('ABC ');
-- 1 row(s) affected, 1 warning(s): 1265 Data truncated for column 'title' at row 1
SELECT 
    id, title, length(title)
FROM
    items;
-- 1	AB 	3
-- 2	ABC	3