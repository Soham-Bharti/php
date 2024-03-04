-- JSON stands for “JavaScript Object Notation”. JSON is a lightweight data-interchange format that is easy for humans to read and write and simple for computers to parse and generate.
-- JSON is built on two data structures: objects and arrays.
-- Objects
-- An object is an unordered collection of key-value pairs enclosed in curly braces {}. Each key is a string, followed by a colon (:), and then the associated value. For example:
-- {
--     "name": "John Doe",
--     "age": 22
-- }  

-- Note that you must enclose the key in a JSON document with double quotes (").

-- Arrays
-- An array is an ordered list of values closed in square brackets []. An array may contain values of any valid JSON data type, including objects and other arrays. For example:
-- ["John Doe", 22]

-- JSON supports several data types, including:
-- String: “JSON”
-- Number: 10, 12.25
-- Boolean: true and false.
-- Null: null

-- we use JSON in web development for:
-- Configuration files
-- Data exchange between a client and a server

-- MySQL validates the JSON documents stored in the JSON column and issues an error if they are invalid.
-- MySQL stores the JSON documents in a binary format optimized for quick searches.
-- 1) Creating a table with a JSON column
CREATE TABLE our_products(
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   price DECIMAL(10,2) NOT NULL,
   properties JSON
);

-- 2) Inserting JSON data into the table
INSERT INTO our_products(name, price, properties)
VALUES('T-Shirt', 25.99, 
'{"sizes":["S","M","L","XL"], "colors": ["white","black"]}');

-- And we place the JSON document inside a single quote (‘).
-- When the statement executes, MySQL performs the following steps:
-- First, validate the JSON document for validity.
-- Second, convert the JSON string into binary format and store it in the JSON column.

-- 3) Querying JSON data from the table
SELECT name, properties 
FROM our_products;
-- T-Shirt	{"sizes": ["S", "M", "L", "XL"], "colors": ["white", "black"]}

-- If the output is difficult to read, you can use the JSON_PRETTY() function to format it.
SELECT JSON_PRETTY(properties)
FROM our_products;
-- {
--    "sizes": [
--      "S",
--      "M",
--      "L",
--      "XL"
--    ],
--    "colors": [
--      "white",
--      "black"
--    ]
--  }

-- 4) Getting the keys of a JSON document
SELECT JSON_KEYS(properties)
FROM our_products;
-- ["sizes", "colors"]

-- 5) Extracting data from a JSON document
-- To specify a location within a JSON document, you use a JSON path expression. A path expression allows you to navigate through the structure of a JSON document to access specific data.
-- Use the dollar sign ($) to represent the current document.
-- Use a key or array index to specify the exact location.
SELECT JSON_EXTRACT(properties, "$.colors[0]")
FROM our_products;
-- "white"