-- UUID stands for Universally Unique IDentifier. UUID is defined based on RFC 4122, “a Universally Unique Identifier (UUID) URN Namespace”.
-- UUID is designed as a number that is unique globally in space and time. Two UUID values are expected to be distinct, even if they are generated on two independent servers.
-- In MySQL, a UUID value is a 128-bit number represented as a utf8 string of five hexadecimal numbers in the following format:
-- aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee
SELECT UUID();
-- 09e1cd1d-d7be-11ee-91db-24be051361b6

-- UUID_TO_BIN
-- BIN_TO_UUID
-- IS_UUID

select is_uuid('09e1cd1d-d7be-11ee-91db-24be051361b6');
-- 1
select is_uuid('09e1cd1d-d7be-11ee-91db-24be051361b60');
-- 0

-- 1) Basic MySQL UUID example
CREATE TABLE our_customers (
    id BINARY(16) PRIMARY KEY,
    name VARCHAR(255)
);
insert into our_customers(id, name)
values(UUID_TO_BIN(UUID()), 'Soham Bharti'),
(UUID_TO_BIN(UUID()), 'Amaresh Bharti');
-- done

select * from our_customers
-- ...(BLOB)	Soham Bharti 
-- ...(BLOB)	Amaresh Bharti

SELECT 
    BIN_TO_UUID(id) id, 
    name
FROM
    our_customers;   
-- 213f8847-d7bf-11ee-91db-24be051361b6	Soham Bharti
-- 213fab5b-d7bf-11ee-91db-24be051361b6	Amaresh Bharti


-- 2) Using UUID as the default value for the primary key
use classicmodels;
CREATE TABLE vendors(
    id BINARY(16) DEFAULT (UUID_TO_BIN(UUID())),
    name VARCHAR(255),
    PRIMARY KEY(id)
);
INSERT INTO vendors(name)
VALUES('ABC Inc.');
SELECT 
    BIN_TO_UUID(id) id, 
    name
FROM
    vendors;   
-- 9fcec6c6-d7bf-11ee-91db-24be051361b6	ABC Inc.
