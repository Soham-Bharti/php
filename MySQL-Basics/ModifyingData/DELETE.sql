-- The DELETE statement allows you to delete rows from a table and returns the number of deleted rows.
-- DELETE FROM table_name
-- WHERE condition;
-- The WHERE clause is optional. If you omit the WHERE clause, the DELETE statement will delete all rows in the table:
-- DELETE FROM table_name;
-- truncate table table_name gives better performance than DELETE FROM table_name

-- MySQL DELETE statement examples
    CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20)
);

INSERT INTO contacts (first_name, last_name, email, phone)
VALUES
    ('John', 'Doe', 'john.doe@email.com', '123-456-7890'),
    ('Jane', 'Smith', 'jane.smith@email.com', '987-654-3210'),
    ('Alice', 'Doe', 'alice.doe@email.com', '555-123-4567'),
    ('Bob', 'Johnson', 'bob.johnson@email.com', '789-321-6540'),
    ('Eva', 'Doe', 'eva.doe@email.com', '111-222-3333'),
    ('Michael', 'Smith', 'michael.smith@email.com', '444-555-6666'),
    ('Sophia', 'Johnson', 'sophia.johnson@email.com', '777-888-9999'),
    ('Matthew', 'Doe', 'matthew.doe@email.com', '333-222-1111'),
    ('Olivia', 'Smith', 'olivia.smith@email.com', '999-888-7777'),
    ('Daniel', 'Johnson', 'daniel.johnson@email.com', '666-555-4444'),
    ('Emma', 'Doe', 'emma.doe@email.com', '222-333-4444'),
    ('William', 'Smith', 'william.smith@email.com', '888-999-0000'),
    ('Ava', 'Johnson', 'ava.johnson@email.com', '111-000-9999'),
    ('Liam', 'Doe', 'liam.doe@email.com', '444-777-3333'),
    ('Mia', 'Smith', 'mia.smith@email.com', '222-444-8888'),
    ('James', 'Johnson', 'james.johnson@email.com', '555-666-1111'),
    ('Grace', 'Doe', 'grace.doe@email.com', '777-222-8888'),
    ('Benjamin', 'Smith', 'benjamin.smith@email.com', '999-111-3333'),
    ('Chloe', 'Johnson', 'chloe.johnson@email.com', '111-444-7777'),
    ('Logan', 'Doe', 'logan.doe@email.com', '333-555-9999');
-- done

-- 1) Delete a row example
delete from contacts
where id = 1;
-- done
select * from contacts;
-- 2	Jane	Smith	jane.smith@email.com	987-654-3210
-- 3	Alice	Doe	alice.doe@email.com	555-123-4567
-- 4	Bob	Johnson	bob.johnson@email.com	789-321-6540
-- 5	Eva	Doe	eva.doe@email.com	111-222-3333
-- 6	Michael	Smith	michael.smith@email.com	444-555-6666
-- 7	Sophia	Johnson	sophia.johnson@email.com	777-888-9999
-- 8	Matthew	Doe	matthew.doe@email.com	333-222-1111
-- 9	Olivia	Smith	olivia.smith@email.com	999-888-7777
-- 10	Daniel	Johnson	daniel.johnson@email.com	666-555-4444
-- 11	Emma	Doe	emma.doe@email.com	222-333-4444
-- 12	William	Smith	william.smith@email.com	888-999-0000
-- 13	Ava	Johnson	ava.johnson@email.com	111-000-9999
-- 14	Liam	Doe	liam.doe@email.com	444-777-3333
-- 15	Mia	Smith	mia.smith@email.com	222-444-8888
-- 16	James	Johnson	james.johnson@email.com	555-666-1111
-- 17	Grace	Doe	grace.doe@email.com	777-222-8888
-- 18	Benjamin	Smith	benjamin.smith@email.com	999-111-3333
-- 19	Chloe	Johnson	chloe.johnson@email.com	111-444-7777
-- 20	Logan	Doe	logan.doe@email.com	333-555-9999

-- 2) Delete multiple rows example
select * from contacts
where last_name = 'Doe';
-- 3	Alice	Doe	alice.doe@email.com	555-123-4567
-- 5	Eva	Doe	eva.doe@email.com	111-222-3333
-- 8	Matthew	Doe	matthew.doe@email.com	333-222-1111
-- 11	Emma	Doe	emma.doe@email.com	222-333-4444
-- 14	Liam	Doe	liam.doe@email.com	444-777-3333
-- 17	Grace	Doe	grace.doe@email.com	777-222-8888
-- 20	Logan	Doe	logan.doe@email.com	333-555-9999
delete from contacts
where last_name = 'Doe';
-- 7 row(s) affected
select * from contacts;
-- 2	Jane	Smith	jane.smith@email.com	987-654-3210
-- 4	Bob	Johnson	bob.johnson@email.com	789-321-6540
-- 6	Michael	Smith	michael.smith@email.com	444-555-6666
-- 7	Sophia	Johnson	sophia.johnson@email.com	777-888-9999
-- 9	Olivia	Smith	olivia.smith@email.com	999-888-7777
-- 10	Daniel	Johnson	daniel.johnson@email.com	666-555-4444
-- 12	William	Smith	william.smith@email.com	888-999-0000
-- 13	Ava	Johnson	ava.johnson@email.com	111-000-9999
-- 15	Mia	Smith	mia.smith@email.com	222-444-8888
-- 16	James	Johnson	james.johnson@email.com	555-666-1111
-- 18	Benjamin	Smith	benjamin.smith@email.com	999-111-3333
-- 19	Chloe	Johnson	chloe.johnson@email.com	111-444-7777

-- 3) Using MySQL DELETE statement with LIMIT clause
select * from contacts order by first_name;
-- 13	Ava	Johnson	ava.johnson@email.com	111-000-9999
-- 18	Benjamin	Smith	benjamin.smith@email.com	999-111-3333
-- 4	Bob	Johnson	bob.johnson@email.com	789-321-6540
-- 19	Chloe	Johnson	chloe.johnson@email.com	111-444-7777
-- 10	Daniel	Johnson	daniel.johnson@email.com	666-555-4444
-- 16	James	Johnson	james.johnson@email.com	555-666-1111
-- 2	Jane	Smith	jane.smith@email.com	987-654-3210
-- 15	Mia	Smith	mia.smith@email.com	222-444-8888
-- 6	Michael	Smith	michael.smith@email.com	444-555-6666
-- 9	Olivia	Smith	olivia.smith@email.com	999-888-7777
-- 7	Sophia	Johnson	sophia.johnson@email.com	777-888-9999
-- 12	William	Smith	william.smith@email.com	888-999-0000

delete from contacts
order by first_name limit 5;
-- 5 row(s) affected

select * from contacts;
-- 2	Jane	Smith	jane.smith@email.com	987-654-3210
-- 6	Michael	Smith	michael.smith@email.com	444-555-6666
-- 7	Sophia	Johnson	sophia.johnson@email.com	777-888-9999
-- 9	Olivia	Smith	olivia.smith@email.com	999-888-7777
-- 12	William	Smith	william.smith@email.com	888-999-0000
-- 15	Mia	Smith	mia.smith@email.com	222-444-8888
-- 16	James	Johnson	james.johnson@email.com	555-666-1111

-- 4) Using MySQL DELETE statement to delete all rows
delete from contacts;
-- done
select * from contacts
-- 0 row(s) returned
