-- determines whether the value associated with the column is valid or not with the given condition
-- Syntax
-- CONSTRAINT constraint_name 
-- CHECK (expression) 
-- [ENFORCED | NOT ENFORCED]

-- 1) Creating CHECK constraints as column constraints
create table parts(
	part_id int AUTO_INCREMENT,
    description VARCHAR(255),
    cost decimal(10,2) not null CHECK (cost >=0),
    price decimal(10,2) not null CHECK (price >=0),
    PRIMARY KEY(part_id)
);

select create table parts;
-- ...
--   PRIMARY KEY (`part_id`),
--   CONSTRAINT `parts_chk_1` CHECK ((`cost` >= 0)),
--   CONSTRAINT `parts_chk_2` CHECK ((`price` >= 0))
-- ...

insert into parts(description, cost, price)
value
('cooler', 0, -10);
-- Error Code: 3819. Check constraint 'parts_chk_2' is violated.
insert into parts(description, cost, price)
value
('cooler', 20, 10)
-- done

-- 2) Creating CHECK constraints as a table constraints
DROP TABLE IF EXISTS parts;
create table parts(
	part_id int AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255),
    cost decimal(10,2) not null check (cost >=0),
    price decimal(10,2) not null check (price >=0),
    CONSTRAINT parts_chk_price_gt_cost
		check (price >= cost)
);
-- 0 row(s) affected
SHOW CREATE TABLE parts;
-- ...
--   PRIMARY KEY (`part_id`),
--   CONSTRAINT `parts_chk_1` CHECK ((`cost` >= 0)),
--   CONSTRAINT `parts_chk_2` CHECK ((`price` >= 0)),
--   CONSTRAINT `parts_chk_price_gt_cost` CHECK ((`price` >= `cost`))
-- ...

insert into parts (description, cost, price)
value
('heater', 200, 100);
-- Error Code: 3819. Check constraint 'parts_chk_price_gt_cost' is violated

-- Adding a check constraint to a table
-- ALTER TABLE table_name
-- ADD CHECK (expression);
-- or
-- ALTER TABLE table_name
-- ADD CONSTRAINT contraint_name
-- CHECK (expression);

alter table parts
add check (cost > 5)
-- done

INSERT INTO parts(description, cost, price)
VALUES('A',1,3);
-- Error Code: 3819. Check constraint 'parts_chk_3' is violated.

-- Removing a check constraint from a table
-- ALTER TABLE table_name
-- DROP CHECK constraint_name;
alter table parts
drop check parts_chk_3
-- done
INSERT INTO parts(description, cost, price)
VALUES('A',1,3);
-- done