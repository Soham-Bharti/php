-- To insert data into the DATETIME columns, you need to ensure that the datetime values are in the 'YYYY-MM-DD HH:MM:SS' format.
-- If you have datetime values in different formats, you need to format them to match the 'YYYY-MM-DD HH:MM:SS' expected by MySQL.
CREATE TABLE events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_time DATETIME NOT NULL
);
-- done
INSERT INTO events(event_name, event_time)
VALUES('MySQL tutorial livestream', '2023-10-28 19:30:35');
-- done
select * from events;
-- 1	MySQL tutorial livestream	2023-10-28 19:30:35

INSERT INTO events(event_name, event_time)
VALUES('Tutorials', now());
-- done
select * from events;
    -- 1	MySQL tutorial livestream	2023-10-28 19:30:35
    -- 2	Tutorials	2024-03-01 18:31:47

-- Inserting a datetime string example
INSERT INTO events(event_name, event_time)
VALUES('Tutorials', str_to_date('27-07-2002 02:10:11', '%d-%m-%Y %H:%i:%s'));
-- done
select * from events;
-- 1	MySQL tutorial livestream	2023-10-28 19:30:35
-- 2	Tutorials	                2024-03-01 18:31:47
-- 3	Tutorials	                2002-07-27 02:10:11