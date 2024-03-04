-- In MySQL, INT stands for the integer that represents the whole numbers. An integer can be written without a fractional component such as 1, 100, 4, -10, and it cannot be 1.2, 5/3, etc. An integer can be zero, positive, and negative.
-- MySQL supports all standard SQL integer types INTEGER or INT and SMALLINT. Additionally, MySQL provides TINYINT MEDIUMINT, and BIGINT as extensions to the SQL standard.
-- MySQL INT data type can be signed and unsigned. The following table illustrates the characteristics of each integer type including storage in bytes, minimum value, and maximum value.

-- 1) Using INT for a column example
CREATE TABLE items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_text VARCHAR(255)
);
-- done
INSERT INTO 
    items(item_text)
VALUES
    ('laptop'), 
    ('mouse'),
    ('headphone');
-- done
select * from items;
-- +---------+-----------+
-- | item_id | item_text |
-- +---------+-----------+
-- |       1 | laptop    |
-- |       2 | mouse     |
-- |       3 | headphone |
-- +---------+-----------+
-- 3 rows in set (0.00 sec)
INSERT INTO items(item_id,item_text)
VALUES(10,'Server');
-- done

INSERT INTO items(item_text)
VALUES('Lays');
-- done

select * from items;
-- +---------+-----------+
-- | item_id | item_text |
-- +---------+-----------+
-- |       1 | laptop    |
-- |       2 | mouse     |
-- |       3 | headphone |
-- |      10 | Server    |
-- |      11 | Lays      |
-- +---------+-----------+
-- 5 rows in set (0.00 sec)

-- 2) Using INT UNSIGNED example
CREATE TABLE classes (
    class_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    total_member INT UNSIGNED,
    PRIMARY KEY (class_id)
);
-- done
INSERT INTO classes(name, total_member)
VALUES('Weekend',100);
-- done
INSERT INTO classes(name, total_member)
VALUES('Fly',-50);
-- Error Code: 1264. Out of range value for column 'total_member' at row 1
-- on phpMyAdmin
-- 2   Fly 0

-- INT represents the integer type.
-- MySQL offers various variants of the INT type including TINYINT, SMALLINT, MEDIUMINT, and BIGINT.