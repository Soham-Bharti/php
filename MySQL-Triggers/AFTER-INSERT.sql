-- CREATE TRIGGER trigger_name
--     AFTER INSERT
--     ON table_name FOR EACH ROW
--         trigger_body

-- If the trigger body has multiple statements, you need to use the BEGIN END block and change the default delimiter:

-- DELIMITER $$

-- CREATE TRIGGER trigger_name
--     AFTER INSERT
--     ON table_name FOR EACH ROW
-- BEGIN
--     -- statements
-- END$$    

-- DELIMITER ;

DROP TABLE IF EXISTS members;

CREATE TABLE members (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    birthDate DATE,
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS reminders;

CREATE TABLE reminders (
    id INT AUTO_INCREMENT,
    memberId INT,
    message VARCHAR(255) NOT NULL,
    PRIMARY KEY (id,memberId)
);

delimiter //
create trigger after_members_insert
after insert
on members for each row
begin
	if new.birthdate is null then
		insert into reminders (memberId, message)
        values(new.id, concat('Hi ', new.name, ' please update your DoB'));
	end if;
end//
delimiter ;

insert into members(name, email)
values ('Soham Bharti', 'soham.123@gmail.com');

SELECT * FROM reminders;    
-- 1	1	Hi Soham Bharti please update your DoB

