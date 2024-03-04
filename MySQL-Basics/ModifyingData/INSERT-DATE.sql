-- The DATE data type allows you to store the date values. The following shows how to define a column with the DATE data type:
-- column_name DATE
-- 'YYYY-MM-DD'
CREATE TABLE events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL
);
-- done

insert into
    events(event_name, event_date)
values
('Meeting @ SilverSky', '2024-07-27');
-- done

-- Inserting the current date
insert into
    events(event_name, event_date)
values
    ('MySQL Workshop', current_date());
select * from events;
-- 1	Meeting @ SilverSky	2024-07-27
-- 2	MySQL Workshop	    2024-03-02

insert into events(event_name, event_date) values ('MySQL Workshop 2', utc_date());
-- done

-- Inserting a date string example
INSERT INTO events (event_name, event_date)
VALUES ('MySQL Innovate', STR_TO_DATE('10/29/2023', '%m/%d/%Y'));
-- done

select * from events;
-- 3	Meeting @ SilverSky	2024-07-27
-- 4	MySQL Workshop	2024-03-02
-- 5	MySQL Workshop 2	2024-03-02
-- 6	MySQL Innovate	2023-10-29
