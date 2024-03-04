-- MySQL ENUM data type
-- In MySQL, an ENUM is a string object whose value is chosen from a list of permitted values defined at the time of column creation.
-- To define an ENUM column, you use the following syntax:
-- column_name ENUM('value1', 'value2', ..., 'valueN')
-- MySQL ENUM data type example
CREATE TABLE tickets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    priority ENUM('Low', 'Medium', 'High') NOT NULL
);

INSERT INTO
    tickets(title, priority)
VALUES
('Scan virus for computer A', 'High');

-- DONE
INSERT INTO
    tickets(title, priority)
VALUES
('Upgrade Windows OS for all computers', 1);
-- LOW TAKEN
INSERT INTO
    tickets(title, priority)
VALUES
('Install Google Chrome for Mr. John', 'Medium'),
    (
        'Create a new user for the new employee David',
        'High'
    );

-- Because we define the priority as a NOT NULL column, when you insert a new row without specifying the value for the priority column, MySQL will use the first enumeration member as the default value. For example:
INSERT INTO
    tickets(title)
VALUES
('Refresh the computer of Ms. Lily');   
-- DONE
SELECT * FROM tickets;
-- +----+----------------------------------------------+----------+
-- | id | title                                        | priority |
-- +----+----------------------------------------------+----------+
-- |  1 | Scan virus for computer A                    | High     |
-- |  2 | Upgrade Windows OS for all computers         | Low      |
-- |  3 | Install Google Chrome for Mr. John           | Medium   |
-- |  4 | Create a new user for the new employee David | High     |
-- |  5 | Refresh the computer of Ms. Lily             | Low      |
-- +----+----------------------------------------------+----------+
-- 5 rows in set (0.00 sec)

INSERT INTO tickets(title, priority)
VALUES('Invalid ticket',-1);
-- ERROR 1265 (01000): Data truncated for column 'priority' at row 1

-- Filtering MySQL ENUM values
SELECT 
  * 
FROM 
  tickets 
WHERE 
  priority = 'High';
-- +----+----------------------------------------------+----------+
-- | id | title                                        | priority |
-- +----+----------------------------------------------+----------+
-- |  1 | Scan virus for computer A                    | High     |
-- |  4 | Create a new user for the new employee David | High     |
-- +----+----------------------------------------------+----------+


SELECT 
  * 
FROM 
  tickets 
WHERE 
  priority = 3;
  -- +----+----------------------------------------------+----------+
-- | id | title                                        | priority |
-- +----+----------------------------------------------+----------+
-- |  1 | Scan virus for computer A                    | High     |
-- |  4 | Create a new user for the new employee David | High     |
-- +----+----------------------------------------------+----------+

  SELECT 
  * 
FROM 
  tickets 
WHERE 
  priority = 4;
-- null

-- Sorting MySQL ENUM values
-- MySQL sorts ENUM values based on their index numbers.
SELECT 
  title, 
  priority 
FROM 
  tickets 
ORDER BY 
  priority DESC;
-- Scan virus for computer A	                    High
-- Create a new user for the new employee David	    High
-- Install Google Chrome for Mr. John	            Medium
-- Upgrade Windows OS for all computers	            Low
-- Refresh the computer of Ms. Lily	                Low