-- CREATE TRIGGER trigger_name
--     BEFORE INSERT
--     ON table_name FOR EACH ROW
-- trigger_body;

-- DELIMITER $$

-- CREATE TRIGGER trigger_name
--     BEFORE INSERT
--     ON table_name FOR EACH ROW
-- BEGIN
--     -- statements
-- END$$    

-- DELIMITER ;

DROP TABLE IF EXISTS WorkCenters;

CREATE TABLE WorkCenters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL
);

DROP TABLE IF EXISTS WorkCenterStats;

CREATE TABLE WorkCenterStats(
    totalCapacity INT NOT NULL
);


DELIMITER $$

CREATE TRIGGER before_workcenters_insert
BEFORE INSERT
ON WorkCenters FOR EACH ROW
BEGIN
    DECLARE rowcount INT;
    
    SELECT COUNT(*) 
    INTO rowcount
    FROM WorkCenterStats;
    
    IF rowcount > 0 THEN
        UPDATE WorkCenterStats
        SET totalCapacity = totalCapacity + new.capacity;
    ELSE
        INSERT INTO WorkCenterStats(totalCapacity)
        VALUES(new.capacity);
    END IF; 

END $$

DELIMITER ;


INSERT INTO WorkCenters(name, capacity)
VALUES('Mold Machine',100);

INSERT INTO WorkCenters(name, capacity)
VALUES('Packing',200);
SELECT * FROM WorkCenterStats;
-- 300
