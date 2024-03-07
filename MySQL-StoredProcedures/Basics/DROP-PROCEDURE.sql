-- The DROP PROCEDURE statement deletes a stored procedure created by the CREATE PROCEDURE statement.

-- The following shows the basic syntax of the DROP PROCEDURE statement:

-- DROP PROCEDURE [IF EXISTS] sp_name;
-- Code language: SQL (Structured Query Language) (sql)
-- In this syntax:

-- First, specify the name of the stored procedure (sp_name) that you want to delete after the DROP PROCEDURE keywords.
-- Second, use IF EXISTS option to conditionally drop the stored procedure if it exists.
-- When you drop a procedure that does not exist without using the IF EXISTS option, MySQL will issue an error. In this case, if you use the IF EXISTS option, MySQL will issue a warning instead.

drop procedure getAllProducts;
-- 0 row(s) affected
call getAllProducts;
-- Error Code: 1305. PROCEDURE classicmodels.getAllProducts does not exist
