-- The DROP VIEW statement deletes a view completely from the database. Here’s the basic syntax of the DROP VIEW statement:

-- DROP VIEW [IF EXISTS] view_name;

-- In this syntax, you specify the name of the view that you want to drop after the DROP VIEW keywords. The optional IF EXISTS option conditionally removes the view only if it exists.

-- To remove multiple views in a single statement, you use the following syntax:

-- DROP VIEW [IF EXISTS] view_name1 [,view_name2]...;
DROP VIEW IF EXISTS customerPayments;
-- done

DROP VIEW employeeOffices, eOffices;
-- Error Code: 1051. Unknown table 'classicmodels.eoffices'
DROP VIEW IF EXISTS employeeOffices, eOffices;
-- 1 warning(s): 1051 Unknown table 'classicmodels.eoffices'
