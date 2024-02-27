-- In MySQL, you use the AUTO_INCREMENT attribute to automatically generate unique numbers for a column each time you insert a new row into the table.
-- Typically, you use the AUTO_INCREMENT attribute for the primary key to ensure each row has a unique identifier.
-- Creating a table with MySQL AUTO_INCREMENT column
CREATE TABLE contacts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(320) NOT NULL
);
INSERT INTO contacts(name, email)
VALUES('John Doe', 'john.doe@mysqltutorial.org');
select * from contacts;
-- 1	John Doe	john.doe@mysqltutorial.org

select last_insert_id();
-- 1
-- The query returns the last auto-increment value generated for the ID column, which you can use for other purposes such as inserting it into a related table.

ALTER TABLE contacts AUTO_INCREMENT = 5;
select * from contacts;
-- 1	John Doe	john.doe@mysqltutorial.org
-- 2	John Doe	john.doe@mysqltutorial.org
-- 3	Jane Doe	jane.doe@mysqltutorial.org
-- 5	John Doe	john.doe@mysqltutorial.org
-- 6	Jane Doe	jane.doe@mysqltutorial.org

-- Adding an AUTO_INCREMENT column to an existing table
CREATE TABLE subscribers(
   email VARCHAR(320) NOT NULL UNIQUE
);

ALTER TABLE subscribers
ADD id INT AUTO_INCREMENT PRIMARY KEY;

