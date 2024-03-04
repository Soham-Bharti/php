CREATE TABLE Employee (
    employee_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female', 'Other'),
    date_of_birth DATE,
    hire_date DATETIME,
    salary DECIMAL(10, 2),
    department_id TINYINT,
    email VARCHAR(100) NOT NULL,
    address TEXT,
    profile_picture BLOB
);

INSERT INTO Employee (
    first_name,
    last_name,
    gender,
    date_of_birth,
    hire_date,
    salary,
    department_id,
    email,
    address,
    profile_picture
) VALUES (
    'Soham',
    'Bharti',
    'Male',
    '2001-02-15',
    '2022-01-15 09:00:00',
    55000.00,
    7,
    'soham.silversky@gmail.com',
    'SilverSky technology, Iskon Emporio Near Star Bazaar',
    NULL
);
-- 1	Soham	Bharti	Male	2001-02-15	2022-01-15 09:00:00	55000.00	7	soham.silversky@gmail.com	SilverSky technology, Iskon Emporio Near Star Bazaar
	
-- MySQL numeric data types:
-- TINYINT - represents BOOLEAN value - users' subscription - BOOLEAN and BOOL are synonyms for TINYINT(1)
-- SMALLINT - items in cart
-- MEDIUMINT - views on an article
-- INT - stores primary keys or auto-incremented IDs
-- BIGINT - tracking transactions or stores account balances
-- DECIMAL - stores prices with decimal precision
-- FLOAT - temperature readings, sensor data or physical measurements
-- DOUBLE - currency exchange rates or stock prices
-- BIT - store boolean values compactly - 0,BIT(1) (admin access)

-- MySQL String data types:
-- CHAR - stores fixed length data like "EMP001" 
-- VARCHAR - stores variable length customer names like "Soham Bharti"
-- BINARY - stores binary data like encryption keys
-- VARBINARY - stores variable length binary data such as file attachments in an email system
-- TINYBLOB - stores small binary objects like profile pictures
-- BLOB - stores larger binary objects like documents and images
-- MEDIUMBLOB - stores medium sized binary data like audio 
-- LONGBLOB - stores very large binary objects like HD videos
-- TINYTEXT - stores small text like comments or short description
-- TEXT - stores larger textual data like blog posts or articles
-- MEDIUMTEXT - stores medium sized textual data like product descriptuions in an e-commerce platfrormn
-- LONGTEXT - stores very large textual data like legal documents or books
-- ENUM - stores data with a predfined set of possible values like the status of an order ("pending", "processing", "shipped", "delivered")
-- SET - stores data multiple options that can be selected simultaneoulsy, such as  a user's preferences for email notifications (e.g., "newsletters", "product updates", "promotions")

-- MySQL date and time data types:
-- DATE - CCYY-MM-DD - stores DoB
-- TIME - hh:mm:ss - Recording the time when a customer service call starts or ends
-- DATETIME - CCYY-MM-DD hh:mm:ss - Logging the timestamp of when a user makes a purchase
-- TIMESTAMP - CCYYMMDDhhmmss - Automatically updating a "last modified" timestamp in a database table whenever a record is updated
-- YEAR - CCYY or YY -  Storing the year when a company was founded in a business directory

-- MySQL spatial data types:
-- GEOMETRY	- a spatial value of any type
-- POINT	- a point (a pair of X-Y coordinates)
-- LINESTRING	- a curve (one or more POINT values)
-- POLYGON	- a polygon
-- GEOMETRYCOLLECTION	- a collection of GEOMETRY values
-- MULTILINESTRING	- a collection of LINESTRING values
-- MULTIPOINT	- a collection of POINT values
-- MULTIPOLYGON	- a collection of POLYGON values

-- JSON data type:
-- MySQL supported a native JSON datatype since version 5.7.8 which allows you to store and manage JSON documents more effectively.
-- The native JSON data type provides automatic validation of JSON documents and optimal storage format.