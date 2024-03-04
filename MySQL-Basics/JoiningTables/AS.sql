-- Column aliases
-- In MySQL, you use column aliases to assign a temporary name to a column in the query’s result set.
-- The following statement illustrates how to use the column alias:
-- SELECT 
--    [column_1 | expression] AS descriptive_name
-- FROM table_name;
-- Code language: SQL (Structured Query Language) (sql)
-- To assign a column an alias, you use the AS keyword followed by the alias. If the alias contains spaces, you must enclose it in quotes as follows:
-- SELECT 
--    [column_1 | expression] AS `descriptive name`
-- FROM 
--    table_name;
SELECT
    CONCAT(lastName, '-', firstName)
FROM
    employees;

-- +--------------------------------+
-- | CONCAT(lastName,'-',firstName) |
-- +--------------------------------+
-- | Murphy-Diane                   |
-- | Patterson-Mary                 |
-- | Firrelli-Jeff                  |
-- | Patterson-William              |
-- | Bondur-Gerard                  |
-- | Bow-Anthony                    |
-- | Jennings-Leslie                |
-- | Thompson-Leslie                |
-- | Firrelli-Julie                 |
-- | Patterson-Steve                |
-- | Tseng-Foon Yue                 |
-- | Vanauf-George                  |
-- | Bondur-Loui                    |
-- | Hernandez-Gerard               |
-- | Castillo-Pamela                |
-- | Bott-Larry                     |
-- | Jones-Barry                    |
-- | Fixter-Andy                    |
-- | Marsh-Peter                    |
-- | King-Tom                       |
-- | Nishi-Mami                     |
-- | Kato-Yoshimi                   |
-- | Gerard-Martin                  |
-- +--------------------------------+
-- 23 rows in set (0.00 sec)
SELECT
    CONCAT(lastName, '-', firstName) AS FULL_Name
FROM
    employees;

-- +-------------------+
-- | FULL_Name         |
-- +-------------------+
-- | Murphy-Diane      |
-- | Patterson-Mary    |
-- | Firrelli-Jeff     |
-- | Patterson-William |
-- | Bondur-Gerard     |
-- | Bow-Anthony       |
-- | Jennings-Leslie   |
-- | Thompson-Leslie   |
-- | Firrelli-Julie    |
-- | Patterson-Steve   |
-- | Tseng-Foon Yue    |
-- | Vanauf-George     |
-- | Bondur-Loui       |
-- | Hernandez-Gerard  |
-- | Castillo-Pamela   |
-- | Bott-Larry        |
-- | Jones-Barry       |
-- | Fixter-Andy       |
-- | Marsh-Peter       |
-- | King-Tom          |
-- | Nishi-Mami        |
-- | Kato-Yoshimi      |
-- | Gerard-Martin     |
-- +-------------------+
-- 23 rows in set (0.00 sec)
SELECT
    CONCAT(lastName, '-', firstName) AS `Full Name`
FROM
    employees;

-- +-------------------+
-- | Full Name         |
-- +-------------------+
-- | Murphy-Diane      |
-- | Patterson-Mary    |
-- | Firrelli-Jeff     |
-- | Patterson-William |
-- | Bondur-Gerard     |
-- | Bow-Anthony       |
-- | Jennings-Leslie   |
-- | Thompson-Leslie   |
-- | Firrelli-Julie    |
-- | Patterson-Steve   |
-- | Tseng-Foon Yue    |
-- | Vanauf-George     |
-- | Bondur-Loui       |
-- | Hernandez-Gerard  |
-- | Castillo-Pamela   |
-- | Bott-Larry        |
-- | Jones-Barry       |
-- | Fixter-Andy       |
-- | Marsh-Peter       |
-- | King-Tom          |
-- | Nishi-Mami        |
-- | Kato-Yoshimi      |
-- | Gerard-Martin     |
-- +-------------------+
-- 23 rows in set (0.00 sec)
SELECT
    CONCAT(lastName, '-', firstName) AS `Full Name`
FROM
    employees
ORDER BY
    `Full Name`
LIMIT
    10;

-- +------------------+
-- | Full Name        |
-- +------------------+
-- | Bondur-Gerard    |
-- | Bondur-Loui      |
-- | Bott-Larry       |
-- | Bow-Anthony      |
-- | Castillo-Pamela  |
-- | Firrelli-Jeff    |
-- | Firrelli-Julie   |
-- | Fixter-Andy      |
-- | Gerard-Martin    |
-- | Hernandez-Gerard |
-- +------------------+
-- 10 rows in set (0.00 sec)
SELECT
    CONCAT(lastName, '-', firstName) AS FULL_Name
FROM
    employees
ORDER BY
    FULL_Name;

-- +-------------------+
-- | FULL_Name         |
-- +-------------------+
-- | Bondur-Gerard     |
-- | Bondur-Loui       |
-- | Bott-Larry        |
-- | Bow-Anthony       |
-- | Castillo-Pamela   |
-- | Firrelli-Jeff     |
-- | Firrelli-Julie    |
-- | Fixter-Andy       |
-- | Gerard-Martin     |
-- | Hernandez-Gerard  |
-- | Jennings-Leslie   |
-- | Jones-Barry       |
-- | Kato-Yoshimi      |
-- | King-Tom          |
-- | Marsh-Peter       |
-- | Murphy-Diane      |
-- | Nishi-Mami        |
-- | Patterson-Mary    |
-- | Patterson-Steve   |
-- | Patterson-William |
-- | Thompson-Leslie   |
-- | Tseng-Foon Yue    |
-- | Vanauf-George     |
-- +-------------------+
-- 23 rows in set (0.00 sec)
select
    e.firstName
from
    employees e;

-- +-----------+
-- | firstName |
-- +-----------+
-- | Diane     |
-- | Mary      |
-- | Jeff      |
-- | William   |
-- | Gerard    |
-- | Anthony   |
-- | Leslie    |
-- | Leslie    |
-- | Julie     |
-- | Steve     |
-- | Foon Yue  |
-- | George    |
-- | Loui      |
-- | Gerard    |
-- | Pamela    |
-- | Larry     |
-- | Barry     |
-- | Andy      |
-- | Peter     |
-- | Tom       |
-- | Mami      |
-- | Yoshimi   |
-- | Martin    |
-- +-----------+
-- 23 rows in set (0.00 sec)

-- Use MySQL aliases to assign a column or a table a temporary name.
-- Use a column alias to assign a temporary name to a column in a query.
-- Use a table alias to assign a temporary name to a table in a query.