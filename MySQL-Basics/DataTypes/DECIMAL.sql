-- The MySQL DECIMAL data type allows you to store exact numeric values in the database. In practice, you often use the DECIMAL data type for columns that preserve exact precision e.g., monetary data in financial systems.
-- To define a column whose data type is DECIMAL, you use the following syntax:
-- column_name DECIMAL(P,D);
-- In this syntax:
-- P is the precision that represents the number of significant digits. The range of P is 1 to 65.
-- D is the scale that represents the number of digits after the decimal point. The range of D is 0 and 30. MySQL requires that D is less than or equal to (<=) P.
-- The DECIMAL(P,D) means that the column can store up to P digits with D decimals. The actual range of the decimal column depends on the precision and scale.
-- Besides the DECIMAL keyword, you can also use DEC, FIXED, or NUMERIC because they are synonyms for DECIMAL.
-- The following example defines the amount column with DECIMAL data type.
-- amount DECIMAL(6,2);
-- In this example, the amount column can store 6 digits with 2 decimal places; therefore, the range of the amount column is from 9999.99 to -9999.99.

-- column_name DECIMAL(10,0);
-- or
-- column_name DECIMAL;
CREATE TABLE materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    cost DECIMAL(19,4) NOT NULL
);
-- done
-- The cost column can store up to 19 digits with 4 decimal places.
INSERT INTO materials(description, cost) 
VALUES 
  ('Bicycle', 500.34), 
  ('Seat', 10.23), 
  ('Break', 5.21);  
SELECT 
    *
FROM
    materials;
-- +----+-------------+----------+
-- | id | description | cost     |
-- +----+-------------+----------+
-- |  1 | Bicycle     | 500.3400 |
-- |  2 | Seat        |  10.2300 |
-- |  3 | Break       |   5.2100 |
-- +----+-------------+----------+
-- 3 rows in set (0.00 sec)

-- Use MySQL DECIMAL data type to store exact numeric values such as financial data in the database.
-- Use column_name DECIMAL (P, D) to define a column with the DECIMAL data type that has up to P digits and D decimal places.
-- The DECIMAL(P) is equivalent to DECIMAL(P,0) and DECIMAL is equivalent to DECIMAL(P, 0).