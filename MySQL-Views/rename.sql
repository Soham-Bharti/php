-- In MySQL, views and tables share the same namespace. Therefore, you can use the RENAME TABLE statement to rename a view.

-- Here’s the basic syntax of the RENAME TABLE for renaming a view:

-- RENAME TABLE original_view_name 
-- TO new_view_name;

rename table contractors
to indian_contractors;
-- done