-- In MySQL, a BLOB (Binary Large Object) is a data type that allows you to store large binary data, such as images, audio, video, and so on. BLOBs are useful when you want to store and retrieve data in your database.
-- MySQL supports the following types of BLOBs:
-- TINYBLOB: Maximum length of 255 bytes.
-- BLOB: Maximum length of 65,535 bytes.
-- MEDIUMBLOB: Maximum length of 16,777,215 bytes.
-- LONGBLOB: Maximum length of 4,294,967,295 bytes.

CREATE TABLE images (
   id INT PRIMARY KEY AUTO_INCREMENT,
   title VARCHAR(255) NOT NULL,
   image_data LONGBLOB NOT NULL
);

SELECT @@secure_file_priv;
-- C:\ProgramData\MySQL\MySQL Server 8.0\Uploads\
-- Make sure to replace C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/logo.png with the actual absolute path to your image file.
INSERT INTO images (title,image_data) 
VALUES ('MySQL tutorial', LOAD_FILE('C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/logo.png'));
-- done
select * from images;
-- 1	MySQL tutorial	...