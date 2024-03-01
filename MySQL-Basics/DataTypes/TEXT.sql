-- Besides CHAR and VARCHAR character types, MySQL supports the TEXT type that provides more features.
-- The TEXT is useful for storing long-form text strings that can take from 1 byte to 4GB. In practice, you often use the TEXT data type for storing articles in news sites, and product descriptions in e-commerce sites.
-- Unlike CHAR and VARCHAR type, you don’t have to specify a storage length when you use a TEXT type for a column.
-- Also, MySQL does not remove or pad spaces when retrieving or inserting text data like CHAR and VARCHAR.
-- Note that the TEXT data is not stored in the database server’s memory. Therefore, when you query TEXT data, MySQL has to read from it from the disk, which is much slower in comparison with CHAR and VARCHAR.
-- MySQL provides four TEXT types:
-- TINYTEXT
-- TEXT
-- MEDIUMTEXT
-- LONGTEXT

-- TINYTEXT – 255 Bytes (255 characters)
create table articles(
	id int AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    summary TINYTEXT
); 

-- TEXT – 64KB (65,535 characters)
alter table articles
add column body text not null
after summary;

-- MEDIUMTEXT – 16MB (16,777,215 characters)
CREATE TABLE whitepapers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    body MEDIUMTEXT NOT NULL,
    published_on DATE NOT NULL
); 

-- LONGTEXT – 4GB (4,294,967,295 characters)
-- The LONGTEXT can store text data up to 4GB, which is quite big in common scenarios. It has 4 bytes overhead.