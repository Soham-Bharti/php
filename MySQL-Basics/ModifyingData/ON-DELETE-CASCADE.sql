-- MySQL ON DELETE CASCADE example
CREATE TABLE buildings (
    building_no INT PRIMARY KEY AUTO_INCREMENT,
    building_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);
CREATE TABLE rooms (
    room_no INT PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(255) NOT NULL,
    building_no INT NOT NULL,
    FOREIGN KEY (building_no)
        REFERENCES buildings (building_no)
        ON DELETE CASCADE
);
INSERT INTO buildings(building_name,address)
VALUES('ACME Headquaters','3950 North 1st Street CA 95134'),
      ('ACME Sales','5000 North 1st Street CA 95134');
-- done
INSERT INTO rooms(room_name,building_no);
-- 16	Amazon	1
-- 17	War Room	1
-- 18	Office of CEO	1
-- 19	Marketing	2
-- 20	Showroom	2
VALUES('Amazon',1),
      ('War Room',1),
      ('Office of CEO',1),
      ('Marketing',2),
      ('Showroom',2);
-- done
DELETE FROM buildings 
WHERE building_no = 2;
-- done
SELECT * FROM rooms;
-- 1	Amazon	1
-- 2	War Room	1
-- 3	Office of CEO	1
