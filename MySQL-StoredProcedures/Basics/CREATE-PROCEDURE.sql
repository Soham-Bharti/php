-- Introduction to MySQL CREATE PROCEDURE statement
-- To create a stored procedure, you use the CREATE PROCEDURE statement.
-- Use the CREATE PROCEDURE statement to create a new stored procedure.
-- Use the CALL statement to execute a stored procedure.
-- MySQL stores the stored procedures in the server.

-- Here’s the basic syntax of the CREATE PROCEDURE statement:

CREATE PROCEDURE sp_name(parameter_list)
BEGIN
   statements;
END;
-- In this syntax:

-- First, define the name of the stored procedure sp_name after the CREATE PROCEDURE keywords.
-- Second, specify the parameter list (parameter_list) inside the parentheses followed by the stored procedure’s name. If the stored procedure has no parameters, you can use an empty parentheses ().
-- Third, write the stored procedure body that consists of one or more valid SQL statements between the BEGIN and END block.
-- If you attempt to create a stored procedure that already exists, MySQL will issue an error.

-- To prevent the error, you can add an additional clause IF NOT EXISTS after the CREATE PROCEDURE keywords:

CREATE PROCEDURE [IF NOT EXISTS] sp_name ([parameter[,...]])
routine_body;

-- In this case, MySQL will issue a warning if you attempt to create a stored procedure with a name that already exists, instead of throwing an error.

-- Note that the IF NOT EXISTS clause has been available since MySQL version 8.0.29.

delimiter //

create procedure getAllProducts()
BEGIN 
	SELECT * from products;
END //

delimiter ;
-- done

call getAllProducts;
-- S10_1678	1969 Harley Davidson Ultimate Chopper	Motorcycles	1:10	Min Lin Diecast	This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.	7933	48.81	95.70
-- S10_1949	1952 Alpine Renault 1300	Classic Cars	1:10	Classic Metal Creations	Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.	7305	98.58	214.30
-- S10_2016	1996 Moto Guzzi 1100i	Motorcycles	1:10	Highway 66 Mini Classics	Official Moto Guzzi logos and insignias, saddle bags located on side of motorcycle, detailed engine, working steering, working suspension, two leather seats, luggage rack, dual exhaust pipes, small saddle bag located on handle bars, two-tone paint with c...	6625	68.99	118.94
-- S10_4698	2003 Harley-Davidson Eagle Drag Bike	Motorcycles	1:10	Red Start Diecast	Model features, official Harley Davidson logos and insignias, detachable rear wheelie bar, heavy diecast metal with resin parts, authentic multi-color tampo-printed graphics, separate engine drive belts, free-turning front fork, rotating tires and rear r...	5582	91.02	193.66
-- S10_4757	1972 Alfa Romeo GTA	Classic Cars	1:10	Motor City Art Classics	Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.	3252	85.68	136.00
-- S10_4962	1962 LanciaA Delta 16V	Classic Cars	1:10	Second Gear Diecast	Features include: Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.	6791	103.42	147.74
-- S12_1099	1968 Ford Mustang	Classic Cars	1:12	Autoart Studio Design	Hood, doors and trunk all open to reveal highly detailed interior features. Steering wheel actually turns the front wheels. Color dark green.	68	95.34	194.57

