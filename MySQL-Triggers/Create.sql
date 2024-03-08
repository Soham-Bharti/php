create table items(
	id int PRIMARY key AUTO_INCREMENT,
    name VARCHAR(255) not null,
    price dec(10,2) not null CHECK(price > 0),
    created_at DATETIME default now(),
    updated_at DATETIME DEFAULT now()
);

insert into items(name, price)
VALUES ('Lays', 5), ('Specs', 1500);

select * from items;
-- 1	Lays	10.00	    2024-03-08 13:19:33	2024-03-08 13:19:33
-- 2	Specs	1500.00	    2024-03-08 13:19:33	2024-03-08 13:19:33

DELIMITER //

CREATE TRIGGER update_items_modify_time
BEFORE UPDATE ON items
FOR EACH ROW
BEGIN
    SET NEW.updated_at = NOW();
END//

DELIMITER ;

update items
set price = 15
where id = 1;

select * from items;
-- 1	Lays	15.00	    2024-03-08 13:19:33	2024-03-08 13:30:19
-- 2	Specs	1500.00	    2024-03-08 13:19:33	2024-03-08 13:19:33


-- another example
CREATE TABLE items (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);
INSERT INTO items(id, name, price) 
VALUES (1, 'Item', 50.00);
CREATE TABLE item_changes (
    change_id INT PRIMARY KEY AUTO_INCREMENT,
    item_id INT,
    change_type VARCHAR(10),
    change_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES items(id)
);

DELIMITER //

CREATE TRIGGER update_items_trigger
AFTER UPDATE
ON items
FOR EACH ROW
BEGIN
    INSERT INTO item_changes (item_id, change_type)
    VALUES (NEW.id, 'UPDATE');
END;
//

DELIMITER ;


UPDATE items
SET price = 60.00 
WHERE id = 1;

SELECT * FROM item_changes;
-- +-----------+---------+-------------+---------------------+
-- | change_id | item_id | change_type | change_timestamp    |
-- +-----------+---------+-------------+---------------------+
-- |         1 |       1 | UPDATE      | 2023-12-27 18:21:43 |
-- +-----------+---------+-------------+---------------------+
-- 1 row in set (0.01 sec)