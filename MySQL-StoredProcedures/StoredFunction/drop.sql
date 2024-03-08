-- The DROP FUNCTION statement drops a stored function. Here is the syntax of the DROP FUNCTION statement:

DROP FUNCTION [IF EXISTS] function_name;

-- In this syntax, you specify the name of the stored function that you want to drop after the DROP FUNCTION keywords.

-- The IF EXISTS option allows you to conditionally drop a stored function if it exists. It prevents an error from arising if the function does not exist.

drop function if EXISTS CustomerLevel;
-- done