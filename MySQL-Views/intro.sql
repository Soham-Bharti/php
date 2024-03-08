-- By definition, a view is a named query stored in the database catalog.
-- Note that a view does not physically store the data. When you issue the SELECT statement against the view, MySQL executes the underlying query specified in the view’s definition and returns the result set. For this reason, sometimes, a view is referred to as a virtual table.
CREATE VIEW daysofweek (day) AS
    SELECT 'Mon' 
    UNION 
    SELECT 'Tue'
    UNION 
    SELECT 'Wed'
    UNION 
    SELECT 'Thu'
    UNION 
    SELECT 'Fri'
    UNION 
    SELECT 'Sat'
    UNION 
    SELECT 'Sun';


SELECT * FROM daysofweek;
-- day
-- Mon
-- Tue
-- Wed
-- Thu
-- Fri
-- Sat
-- Sun

-- advantages:
-- 1) Simplify complex query
-- 2) Make the business logic consistent
-- 3) Add extra security layers
-- 3) Add extra security layers
