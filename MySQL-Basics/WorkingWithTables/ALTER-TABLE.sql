-- ALTER TABLE statement to add a column, alter a column, rename a column, drop a column, and rename a table
desc vehicles;
-- vehicleId	int	    NO	PRI		
-- year	        int	    NO			
-- make	varchar(100)	NO	

-- 1) Add a column to a table
-- ALTER TABLE table_name
-- ADD 
--     new_column_name column_definition
--     [FIRST | AFTER column_name]

alter table vehicles
add model varchar(100) not null;

desc vehicles;
-- vehicleId	 int	        NO	PRI	
-- year	        int	            NO		
-- make	        varchar(100)	NO		
-- model	    varchar(100)	NO		

-- 2) Add multiple columns to a table
-- ALTER TABLE table_name
--     ADD new_column_name column_definition
--     [FIRST | AFTER column_name],
--     ADD new_column_name column_definition
--     [FIRST | AFTER column_name],
--     ...;

alter table vehicles
add color varchar(50),
add note varchar(255)

desc vehicles;
-- field        type            null    key
-- vehicleId	int	            NO	    PRI	
-- year	        int	            NO		
-- make	        varchar(100)	NO		
-- model	    varchar(100)	NO		
-- color	    varchar(50)	    YES		
-- note	        varchar(255)	YES		

-- MySQL ALTER TABLE – Modify columns
-- ALTER TABLE table_name
--     MODIFY column_name column_definition
--     [ FIRST | AFTER column_name],
--     MODIFY column_name column_definition
--     [ FIRST | AFTER column_name],
--     ...;

-- 1) Modify a column
desc vehicles;
-- field            type            null    key
-- vehicleId	    int             NO	    PRI	
-- year	            int             NO		
-- make	            varchar(100)	NO		
-- model	        archar(100)	    NO		
-- color	        varchar(50)	    YES		
-- note	            varchar(255)	YES		
alter table vehicles
modify note varchar(255) not null;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI	
-- year	            int	            NO		
-- make	            varchar(100)	NO		
-- model	        varchar(100)	NO		
-- color	        varchar(50)	    YES		
-- note	            varchar(255)	NO		

-- 2) Modify multiple columns
alter table vehicles
modify note varchar(100) after make,
modify year smallint not null
describe vehicles;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            smallint	    NO	
-- make	            varchar(100)	NO	
-- note	            varchar(100)	YES	
-- model	        varchar(100)	NO	
-- color	        varchar(50)	    YES	

-- MySQL ALTER TABLE – Rename a column in a table
-- ALTER TABLE table_name
--     CHANGE COLUMN original_name new_name column_definition
--     [FIRST | AFTER column_name];
-- 1) Change a column
alter table vehicles
change column note vehicleCondition varchar(255) not null;
desc vehicles;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            smallint	    NO	
-- make	            varchar(100)	NO	
-- vehicleCondition	varchar(255)	NO	
-- model	        varchar(100)	NO	
-- color	        varchar(50)	    YES	

-- 2) Change multiple columns
alter table vehicles
change column vehicleCondition note varchar(255) not null,
change column color vehicleColor varchar(50) not null;
desc vehicles;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            smallint	    NO	
-- make	            varchar(100)	NO	
-- note	            varchar(255)	NO	
-- model            varchar(100)	NO	
-- vehicleColor	    varchar(50)	    NO	

-- MySQL ALTER TABLE – Drop a column
-- ALTER TABLE table_name
-- DROP COLUMN column_name;
alter table vehicles
drop column note;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            smallint	    NO	
-- make	            varchar(100)	NO	
-- model            varchar(100)	NO	
-- vehicleColor	    varchar(50)	    NO	

-- MySQL ALTER TABLE – Rename table
-- ALTER TABLE table_name
-- RENAME TO new_table_name;
alter TABLE vehicles
rename to cars;
desc cars;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            smallint	    NO	
-- make	            varchar(100)	NO	
-- model            varchar(100)	NO	
-- vehicleColor	    varchar(50)	    NO	

-- alter queries all together
alter table cars
rename to vehicles,
add column vehicleNote varchar(255),
MODIFY column year tinyint not null,
drop column make,
change column model vehicleModel varchar(100) not null;
desc vehicles;
-- field            type            null    key
-- vehicleId	    int	            NO	    PRI
-- year	            tinyint	        NO	
-- vehicleModel	    varchar(100)	NO	
-- vehicleColor	    varchar(50)	    NO	
-- vehicleNote	    varchar(255)	YES	