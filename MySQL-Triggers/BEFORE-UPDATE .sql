-- CREATE TRIGGER trigger_name
-- BEFORE UPDATE
-- ON table_name FOR EACH ROW
-- trigger_body

-- If you have more than one statement in the trigger_body, you need to use the BEGIN END block. In addition, you need to change the default delimiter as follows:
-- DELIMITER $$

-- CREATE TRIGGER trigger_name
--     BEFORE UPDATE
--     ON table_name FOR EACH ROW
-- BEGIN
--     -- statements
-- END$$    

-- DELIMITER ;

DROP TABLE IF EXISTS sales;

CREATE TABLE sales (
    id INT AUTO_INCREMENT,
    product VARCHAR(100) NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    fiscalYear SMALLINT NOT NULL,
    fiscalMonth TINYINT NOT NULL,
    CHECK(fiscalMonth >= 1 AND fiscalMonth <= 12),
    CHECK(fiscalYear BETWEEN 2000 and 2050),
    CHECK (quantity >=0),
    UNIQUE(product, fiscalYear, fiscalMonth),
    PRIMARY KEY(id)
);

INSERT INTO sales(product, quantity, fiscalYear, fiscalMonth)
VALUES
    ('2003 Harley-Davidson Eagle Drag Bike',120, 2020,1),
    ('1969 Corvair Monza', 150,2020,1),
    ('1970 Plymouth Hemi Cuda', 200,2020,1);
    
SELECT * FROM sales;

delimiter //
create trigger before_update_sales
before UPDATE
on sales
for EACH ROW
begin
	declare error_msg VARCHAR(255);
    
    set error_msg = concat('New quanity ',new.quantity, ' can not be 3 times greater than current quantity ', old.quantity);
	if new.quantity > old.quantity * 3 then
		signal SQLSTATE '45000'
        set MESSAGE_TEXT = error_msg;
	end if;
end//
delimiter ;

UPDATE sales 
SET quantity = 150
WHERE id = 1;
-- done

UPDATE sales 
SET quantity = 500
WHERE id = 1;

-- Error Code: 1644. New quanity 5000 can not be 3 times greater than current quantity 150
