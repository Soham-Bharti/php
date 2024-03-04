-- MySQL Disable Foreign Key Checks
-- Sometimes, it is very useful to disable foreign key checks. For example, you can load data to the parent and child tables in any order with the foreign key constraint check disabled.
-- If you don’t disable foreign key checks, you have to load data into the parent tables first and then the child tables in sequence, which can be tedious.
-- Another scenario in which you want to disable the foreign key check is when you want to drop a table. Unless you disable the foreign key checks, you cannot drop a table referenced by a foreign key constraint.
-- To disable foreign key checks, you set the foreign_key_checks variable to zero as follows:
-- SET foreign_key_checks = 0;
-- To enable the foreign key constraint check, you set the value of the foreign_key_checks to 1:
-- SET foreign_key_checks = 1;

-- Notice that setting foreign_key_checks to 1 does not trigger any validation of the existing table data. In other words, MySQL will not verify the consistency of the data that was added during the foreign key check disabled.

-- Disable foreign key check example
use fkdemo;

create table countries(
	country_id int PRIMARY KEY AUTO_INCREMENT,
    country_name VARCHAR(255) not null
);

create table cities(
	city_id int PRIMARY KEY AUTO_INCREMENT,
    city_name VARCHAR(255) not null,
    countryId int,
    FOREIGN KEY (countryId) REFERENCES countries (country_id)
);

insert into cities(city_name, countryId)
values
('Delhi', 91);
-- Error Code: 1364. Field 'city_id' doesn't have a default value

set foreign_key_checks = 0;

insert into cities(city_name, countryId)
values
('Delhi', 91);
-- 1 row(s) affected

SELECT * from cities
-- city_id  city_name   countryId
-- 1	    Delhi	    91

set foreign_key_checks = 1;
-- done

-- When the foreign key checks were re-enabled, MySQL did not re-validate data in the table. However, it won’t allow you to insert or update data that violates the foreign key constraint.

insert into countries (country_id, country_name)
VALUES
(91, 'India')
-- done

drop table countries
-- Error Code: 3730. Cannot drop table 'countries' referenced by a foreign key constraint 'cities_ibfk_1' on table 'cities'.

-- To fix this, you have two options:
-- Drop the table cities first and then remove the table countries.
-- Disable foreign key checks and drop tables in any sequence.

set foreign_key_checks = 0
drop table countries
-- 0 row(s) affected
drop table cities
-- 0 row(s) affected

SET foreign_key_checks = 1;
-- 0 row(s) affected
