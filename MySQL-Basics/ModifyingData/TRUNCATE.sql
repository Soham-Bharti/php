-- TRUNCATE TABLE statement allows you to delete all rows from a table.
-- TRUNCATE [TABLE] table_name;
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);
DELIMITER $$
CREATE PROCEDURE load_book_data(IN num INT(4))
BEGIN
	DECLARE counter INT(4) DEFAULT 0;
	DECLARE book_title VARCHAR(255) DEFAULT '';

	WHILE counter < num DO
	  SET book_title = CONCAT('Book title #',counter);
	  SET counter = counter + 1;

	  INSERT INTO books(title)
	  VALUES(book_title);
	END WHILE;
END$$

DELIMITER ;
-- done
CALL load_book_data(10000);
TRUNCATE TABLE books;
-- done
-- The TRUNCATE TABLE statement resets the AUTO_INCREMENT counter