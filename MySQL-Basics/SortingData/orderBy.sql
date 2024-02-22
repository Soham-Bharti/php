-- ORDER BY – show you how to sort the result set using the ORDER BY clause. You will also learn how to use custom sort order with the FIELD function.
-- SELECT 
--    select_list
-- FROM 
--    table_name
-- ORDER BY 
--    column1 [ASC|DESC], 
--    column2 [ASC|DESC],
--    ...;
-- 1) Using ORDER BY clause to sort the result set by one column example
select
    contactfirstname,
    contactlastname
from
    customers
order by
    contactlastname;

-- +------------------+-----------------+
-- | contactfirstname | contactlastname |
-- +------------------+-----------------+
-- | Paolo            | Accorti         |
-- | Raanan           | Altagar,G M     |
-- | Mel              | Andersen        |
-- | Carmen           | Anton           |
-- | Rachel           | Ashworth        |
-- | Miguel           | Barajas         |
-- | Violeta          | Benitez         |
-- | Helen            | Bennett         |
-- | Christina        | Berglund        |
-- | Jonas            | Bergulfsen      |
-- | Marie            | Bertrand        |
-- | William          | Brown           |
-- | Ann              | Brown           |
-- | Julie            | Brown           |
-- | Ben              | Calaghan        |
-- | Alejandra        | Camino          |
-- | Pascale          | Cartrain        |
-- | Dean             | Cassidy         |
-- | Francisca        | Cervantes       |
-- | Brian            | Chandler        |
-- | Yu               | Choi            |
-- | Fr├®d├®rique     | Citeaux         |
-- | Sean             | Clenahan        |
-- | Philip           | Cramer          |
-- | Arnold           | Cruz            |
-- | Daniel           | Da Silva        |
-- | Isabel           | de Castro       |
-- | Elizabeth        | Devon           |
-- | Catherine        | Dewey           |
-- | Michael          | Donnermeyer     |
-- | Peter            | Ferguson        |
-- | Jesus            | Fernandez       |
-- | Alexander        | Feuer           |
-- | Valarie          | Franco          |
-- | Keith            | Franco          |
-- | Peter            | Franken         |
-- | Jean             | Fresni├¿re      |
-- | Diego            | Freyre          |
-- | Steve            | Frick           |
-- | Sue              | Frick           |
-- | Michael          | Frick           |
-- | Mike             | Gao             |
-- | Mike             | Graham          |
-- | Ed               | Harrison        |
-- | Juri             | Hashimoto       |
-- | Paul             | Henriot         |
-- | Marta            | Hernandez       |
-- | Maria            | Hernandez       |
-- | Mihael           | Holz            |
-- | Wing             | Huang           |
-- | Adrian           | Huxley          |
-- | Palle            | Ibsen           |
-- | Karin            | Josephs         |
-- | Matti            | Karttunen       |
-- | Roland           | Keitel          |
-- | Mory             | Kentary         |
-- | Julie            | King            |
-- | Jean             | King            |
-- | Jan              | Klaeboe         |
-- | Horst            | Kloss           |
-- | Pirkko           | Koskitalo       |
-- | Armand           | Kuger           |
-- | Janine           | Labrune         |
-- | Martha           | Larsson         |
-- | Laurence         | Lebihan         |
-- | Kwai             | Lee             |
-- | Kelvin           | Leong           |
-- | Dan              | Lewis           |
-- | Elizabeth        | Lincoln         |
-- | Rita             | M├╝ller         |
-- | Wales            | MacKinlay       |
-- | Patricia         | McKenna         |
-- | Sarah            | McRoy           |
-- | Roland           | Mendel          |
-- | Renate           | Messner         |
-- | Hanna            | Moos            |
-- | Maurizio         | Moroni          |
-- | Julie            | Murphy          |
-- | Leslie           | Murphy          |
-- | Eric             | Natividad       |
-- | Susan            | Nelson          |
-- | Allen            | Nelson          |
-- | Anna             | O'Hara          |
-- | Veysel           | Oeztan          |
-- | Sven             | Ottlieb         |
-- | Dominique        | Perrier         |
-- | Jytte            | Petersen        |
-- | Henriette        | Pfalzheim       |
-- | Zbyszek          | Piestrzeniewicz |
-- | Georg            | Pipps           |
-- | Martine          | Ranc├®          |
-- | Franco           | Ricotti         |
-- | Lino             | Rodriguez       |
-- | Jos├® Pedro      | Roel            |
-- | Annette          | Roulet          |
-- | Giovanni         | Rovelli         |
-- | Eduardo          | Saavedra        |
-- | Rosa             | Salazar         |
-- | Mary             | Saveley         |
-- | Carine           | Schmitt         |
-- | Bradley          | Schuyler        |
-- | Alexander        | Semenov         |
-- | Akiko            | Shimamura       |
-- | Thomas           | Smith           |
-- | Tony             | Snowden         |
-- | Mart├¡n          | Sommer          |
-- | Kalle            | Suominen        |
-- | Yoshi            | Tamuri          |
-- | Leslie           | Taylor          |
-- | Sue              | Taylor          |
-- | Valarie          | Thompson        |
-- | Steve            | Thompson        |
-- | Daniel           | Tonini          |
-- | Jerry            | Tseng           |
-- | Braun            | Urs             |
-- | Wendy            | Victorino       |
-- | Brydey           | Walker          |
-- | Juri             | Yoshido         |
-- | Dorothy          | Young           |
-- | Mary             | Young           |
-- | Julie            | Young           |
-- | Jeff             | Young           |
-- +------------------+-----------------+
-- 122 rows in set (0.02 sec)
select
    contactfirstname,
    contactlastname
from
    customers
order by
    contactlastname DESC;

-- +------------------+-----------------+
-- | contactfirstname | contactlastname |
-- +------------------+-----------------+
-- | Jeff             | Young           |
-- | Dorothy          | Young           |
-- | Julie            | Young           |
-- | Mary             | Young           |
-- | Juri             | Yoshido         |
-- | Brydey           | Walker          |
-- | Wendy            | Victorino       |
-- | Braun            | Urs             |
-- | Jerry            | Tseng           |
-- | Daniel           | Tonini          |
-- | Valarie          | Thompson        |
-- | Steve            | Thompson        |
-- | Leslie           | Taylor          |
-- | Sue              | Taylor          |
-- | Yoshi            | Tamuri          |
-- | Kalle            | Suominen        |
-- | Mart├¡n          | Sommer          |
-- | Tony             | Snowden         |
-- | Thomas           | Smith           |
-- | Akiko            | Shimamura       |
-- | Alexander        | Semenov         |
-- | Bradley          | Schuyler        |
-- | Carine           | Schmitt         |
-- | Mary             | Saveley         |
-- | Rosa             | Salazar         |
-- | Eduardo          | Saavedra        |
-- | Giovanni         | Rovelli         |
-- | Annette          | Roulet          |
-- | Jos├® Pedro      | Roel            |
-- | Lino             | Rodriguez       |
-- | Franco           | Ricotti         |
-- | Martine          | Ranc├®          |
-- | Georg            | Pipps           |
-- | Zbyszek          | Piestrzeniewicz |
-- | Henriette        | Pfalzheim       |
-- | Jytte            | Petersen        |
-- | Dominique        | Perrier         |
-- | Sven             | Ottlieb         |
-- | Veysel           | Oeztan          |
-- | Anna             | O'Hara          |
-- | Susan            | Nelson          |
-- | Allen            | Nelson          |
-- | Eric             | Natividad       |
-- | Julie            | Murphy          |
-- | Leslie           | Murphy          |
-- | Maurizio         | Moroni          |
-- | Hanna            | Moos            |
-- | Renate           | Messner         |
-- | Roland           | Mendel          |
-- | Sarah            | McRoy           |
-- | Patricia         | McKenna         |
-- | Wales            | MacKinlay       |
-- | Rita             | M├╝ller         |
-- | Elizabeth        | Lincoln         |
-- | Dan              | Lewis           |
-- | Kelvin           | Leong           |
-- | Kwai             | Lee             |
-- | Laurence         | Lebihan         |
-- | Martha           | Larsson         |
-- | Janine           | Labrune         |
-- | Armand           | Kuger           |
-- | Pirkko           | Koskitalo       |
-- | Horst            | Kloss           |
-- | Jan              | Klaeboe         |
-- | Julie            | King            |
-- | Jean             | King            |
-- | Mory             | Kentary         |
-- | Roland           | Keitel          |
-- | Matti            | Karttunen       |
-- | Karin            | Josephs         |
-- | Palle            | Ibsen           |
-- | Adrian           | Huxley          |
-- | Wing             | Huang           |
-- | Mihael           | Holz            |
-- | Marta            | Hernandez       |
-- | Maria            | Hernandez       |
-- | Paul             | Henriot         |
-- | Juri             | Hashimoto       |
-- | Ed               | Harrison        |
-- | Mike             | Graham          |
-- | Mike             | Gao             |
-- | Steve            | Frick           |
-- | Michael          | Frick           |
-- | Sue              | Frick           |
-- | Diego            | Freyre          |
-- | Jean             | Fresni├¿re      |
-- | Peter            | Franken         |
-- | Valarie          | Franco          |
-- | Keith            | Franco          |
-- | Alexander        | Feuer           |
-- | Jesus            | Fernandez       |
-- | Peter            | Ferguson        |
-- | Michael          | Donnermeyer     |
-- | Catherine        | Dewey           |
-- | Elizabeth        | Devon           |
-- | Isabel           | de Castro       |
-- | Daniel           | Da Silva        |
-- | Arnold           | Cruz            |
-- | Philip           | Cramer          |
-- | Sean             | Clenahan        |
-- | Fr├®d├®rique     | Citeaux         |
-- | Yu               | Choi            |
-- | Brian            | Chandler        |
-- | Francisca        | Cervantes       |
-- | Dean             | Cassidy         |
-- | Pascale          | Cartrain        |
-- | Alejandra        | Camino          |
-- | Ben              | Calaghan        |
-- | William          | Brown           |
-- | Ann              | Brown           |
-- | Julie            | Brown           |
-- | Marie            | Bertrand        |
-- | Jonas            | Bergulfsen      |
-- | Christina        | Berglund        |
-- | Helen            | Bennett         |
-- | Violeta          | Benitez         |
-- | Miguel           | Barajas         |
-- | Rachel           | Ashworth        |
-- | Carmen           | Anton           |
-- | Mel              | Andersen        |
-- | Raanan           | Altagar,G M     |
-- | Paolo            | Accorti         |
-- +------------------+-----------------+
-- 122 rows in set (0.00 sec)
-- 2) Using the ORDER BY clause to sort the result set by multiple columns example
-- If you want to sort the customers by the last name in descending order and then by the first name in ascending order, you specify both  DESC and ASC in these respective columns as follows:
SELECT
    contactFirstname,
    contactLastname
FROM
    customers
ORDER BY
    contactFirstname ASC,
    contactLastname DESC --     +------------------+-----------------+
    -- | contactFirstname | contactLastname |
    -- +------------------+-----------------+
    -- | Adrian           | Huxley          |
    -- | Akiko            | Shimamura       |
    -- | Alejandra        | Camino          |
    -- | Alexander        | Semenov         |
    -- | Alexander        | Feuer           |
    -- | Allen            | Nelson          |
    -- | Ann              | Brown           |
    -- | Anna             | O'Hara          |
    -- | Annette          | Roulet          |
    -- | Armand           | Kuger           |
    -- | Arnold           | Cruz            |
    -- | Ben              | Calaghan        |
    -- | Bradley          | Schuyler        |
    -- | Braun            | Urs             |
    -- | Brian            | Chandler        |
    -- | Brydey           | Walker          |
    -- | Carine           | Schmitt         |
SELECT
    contactFirstname,
    contactLastname
FROM
    customers
ORDER BY
    contactFirstname DESC,
    contactLastname ASC -- +------------------+-----------------+
    -- | contactFirstname | contactLastname |
    -- +------------------+-----------------+
    -- | Zbyszek          | Piestrzeniewicz |
    -- | Yu               | Choi            |
    -- | Yoshi            | Tamuri          |
    -- | Wing             | Huang           |
    -- | William          | Brown           |
    -- | Wendy            | Victorino       |
    -- | Wales            | MacKinlay       |
    -- | Violeta          | Benitez         |
    -- | Veysel           | Oeztan          |
    -- | Valarie          | Franco          |
    -- | Valarie          | Thompson        |
    -- | Tony             | Snowden         |
    -- | Thomas           | Smith           |
    -- | Sven             | Ottlieb         |
    -- | Susan            | Nelson          |
    -- | Sue              | Frick           |
    -- | Sue              | Taylor          |
    -- 3) Using the ORDER BY clause to sort a result set by an expression example
select
    orderNumber,
    orderLinenumber,
    quantityOrdered * priceEach
from
    orderdetails
ORDER BY
    quantityOrdered * priceEach
limit
    20;

-- +-------------+-----------------+-----------------------------+
-- | orderNumber | orderLinenumber | quantityOrdered * priceEach |
-- +-------------+-----------------+-----------------------------+
-- |       10419 |               7 |                      481.50 |
-- |       10420 |               3 |                      529.35 |
-- |       10322 |               3 |                      531.00 |
-- |       10407 |               3 |                      546.66 |
-- |       10425 |               6 |                      553.52 |
-- |       10344 |               6 |                      557.60 |
-- |       10110 |               3 |                      577.60 |
-- |       10280 |              12 |                      597.40 |
-- |       10408 |               1 |                      615.45 |
-- |       10409 |               2 |                      625.50 |
-- |       10214 |               3 |                      643.80 |
-- |       10239 |               2 |                      649.40 |
-- |       10219 |               3 |                      653.52 |
-- |       10418 |               3 |                      662.90 |
-- |       10304 |              16 |                      671.83 |
-- |       10141 |               6 |                      675.78 |
-- |       10281 |               2 |                      679.00 |
-- |       10367 |              13 |                      679.42 |
-- |       10135 |               1 |                      687.20 |
-- |       10114 |               1 |                      687.36 |
-- +-------------+-----------------+-----------------------------+
-- 20 rows in set (0.01 sec)
select
    orderNumber,
    orderLinenumber,
    quantityOrdered * priceEach
from
    orderdetails
ORDER BY
    quantityOrdered * priceEach DESC
limit
    20;

--     +-------------+-----------------+-----------------------------+
-- | orderNumber | orderLinenumber | quantityOrdered * priceEach |
-- +-------------+-----------------+-----------------------------+
-- |       10403 |               9 |                    11503.14 |
-- |       10405 |               5 |                    11170.52 |
-- |       10407 |               2 |                    10723.60 |
-- |       10404 |               3 |                    10460.16 |
-- |       10312 |               3 |                    10286.40 |
-- |       10424 |               6 |                    10072.00 |
-- |       10348 |               8 |                     9974.40 |
-- |       10405 |               3 |                     9712.04 |
-- |       10196 |               5 |                     9571.08 |
-- |       10206 |               6 |                     9568.73 |
-- |       10304 |               6 |                     9467.68 |
-- |       10412 |               9 |                     9449.40 |
-- |       10201 |               4 |                     9394.28 |
-- |       10223 |               3 |                     9299.71 |
-- |       10276 |               3 |                     9242.00 |
-- |       10417 |               4 |                     9109.52 |
-- |       10127 |               2 |                     8889.50 |
-- |       10341 |               2 |                     8667.90 |
-- |       10400 |               9 |                     8616.96 |
-- |       10293 |               8 |                     8602.92 |
-- +-------------+-----------------+-----------------------------+
-- 20 rows in set (0.01 sec)
SELECT
    orderNumber,
    orderLineNumber,
    quantityOrdered * priceEach AS subtotal
FROM
    orderdetails
ORDER BY
    subtotal DESC;

+ -------------+-----------------+-----------------------------+
-- | orderNumber | orderLinenumber | quantityOrdered * priceEach |
-- +-------------+-----------------+-----------------------------+
-- |       10403 |               9 |                    11503.14 |
-- |       10405 |               5 |                    11170.52 |
-- |       10407 |               2 |                    10723.60 |
-- |       10404 |               3 |                    10460.16 |
-- |       10312 |               3 |                    10286.40 |
-- |       10424 |               6 |                    10072.00 |
-- |       10348 |               8 |                     9974.40 |
-- |       10405 |               3 |                     9712.04 |
-- |       10196 |               5 |                     9571.08 |
-- |       10206 |               6 |                     9568.73 |
-- |       10304 |               6 |                     9467.68 |
-- |       10412 |               9 |                     9449.40 |
-- |       10201 |               4 |                     9394.28 |
-- |       10223 |               3 |                     9299.71 |
-- ...
-- Using MySQL ORDER BY clause to sort data using a custom list
-- The FIELD() function returns the index (position) of a value within a list of values.
-- FIELD(value, value1, value2, ...)
-- In this syntax:
-- value: The value for which you want to find the position.
-- value1, value2, ...: A list of values against which you want to compare the specified value.
-- The FIELD() function returns the position of the value in the list of values value1, value2, and so on.
-- If the value is not found in the list, the FIELD() function returns 0.
select
    FIELD('Soham', 'Aman', 'Soham', 'Lax', 'Pinto');

-- +-------------------------------------------------+
-- | FIELD('Soham', 'Aman', 'Soham', 'Lax', 'Pinto') |
-- +-------------------------------------------------+
-- |                                               2 |
-- +-------------------------------------------------+
-- 1 row in set (0.00 sec)
select
    FIELD('Sonam', 'Aman', 'Soham', 'Lax', 'Pinto');

-- +-------------------------------------------------+
-- | FIELD('Sonam', 'Aman', 'Soham', 'Lax', 'Pinto') |
-- +-------------------------------------------------+
-- |                                               0 |
-- +-------------------------------------------------+
-- 1 row in set (0.00 sec)
-- Suppose that you want to sort the sales orders based on their statuses in the following order:
-- In Process
-- On Hold
-- Canceled
-- Resolved
-- Disputed
-- Shipped
-- To do this, you can use the FIELD() function to map each order status to a number and sort the result by the result of the FIELD() function:
SELECT
    orderNumber,
    status
FROM
    orders
ORDER BY
    FIELD(
        status,
        'In Process',
        'On Hold',
        'Cancelled',
        'Resolved',
        'Disputed',
        'Shipped'
    );

-- +-------------+------------+
-- | orderNumber | status     |
-- +-------------+------------+
-- |       10420 | In Process |
-- |       10421 | In Process |
-- |       10422 | In Process |
-- |       10423 | In Process |
-- |       10424 | In Process |
-- |       10425 | In Process |
-- |       10334 | On Hold    |
-- |       10401 | On Hold    |
-- |       10407 | On Hold    |
-- |       10414 | On Hold    |
-- |       10167 | Cancelled  |
-- |       10179 | Cancelled  |
-- |       10248 | Cancelled  |
-- |       10253 | Cancelled  |
-- |       10260 | Cancelled  |
-- |       10262 | Cancelled  |
-- |       10164 | Resolved   |
-- |       10327 | Resolved   |
-- |       10367 | Resolved   |
-- |       10386 | Resolved   |
-- |       10406 | Disputed   |
-- |       10415 | Disputed   |
-- |       10417 | Disputed   |
-- |       10100 | Shipped    |
-- |       10101 | Shipped    |
-- |       10102 | Shipped    |
-- |       10103 | Shipped    |
-- |       10104 | Shipped    |
-- |       10105 | Shipped    |
-- |       10106 | Shipped    |
-- |       10107 | Shipped    |
-- |       10108 | Shipped    |
-- |       10109 | Shipped    |
-- |       10110 | Shipped    |
-- |       10111 | Shipped    |
-- |       10112 | Shipped    |
-- |       10113 | Shipped    |
-- |       10114 | Shipped    |
-- |       10115 | Shipped    |
-- |       10116 | Shipped    |
-- |       10117 | Shipped    |
-- |       10118 | Shipped    |
-- |       10119 | Shipped    |
-- |       10120 | Shipped    |
-- |       10121 | Shipped    |
-- |       10122 | Shipped    |
-- |       10123 | Shipped    |
-- |       10124 | Shipped    |
-- |       10125 | Shipped    |
-- |       10126 | Shipped    |
-- |       10127 | Shipped    |
-- |       10128 | Shipped    |
-- |       10129 | Shipped    |
-- ....
-- MySQL ORDER BY and NULL
-- In MySQL, NULL comes before non-NULL values. Therefore, when you the ORDER BY clause with the ASC option, NULLs appear first in the result set.
select
    firstname,
    lastname,
    reportsTo
from
    EMPLOYEES
ORDER BY
    reportsTo;

-- +-----------+-----------+-----------+
-- | firstname | lastname  | reportsTo |
-- +-----------+-----------+-----------+
-- | Diane     | Murphy    |      NULL |
-- | Mary      | Patterson |      1002 |
-- | Jeff      | Firrelli  |      1002 |
-- | William   | Patterson |      1056 |
-- | Gerard    | Bondur    |      1056 |
-- | Anthony   | Bow       |      1056 |
-- | Mami      | Nishi     |      1056 |
-- | Andy      | Fixter    |      1088 |
-- | Peter     | Marsh     |      1088 |
-- | Tom       | King      |      1088 |
-- | Loui      | Bondur    |      1102 |
-- | Gerard    | Hernandez |      1102 |
-- | Pamela    | Castillo  |      1102 |
-- | Larry     | Bott      |      1102 |
-- | Barry     | Jones     |      1102 |
-- | Martin    | Gerard    |      1102 |
-- | Leslie    | Jennings  |      1143 |
-- | Leslie    | Thompson  |      1143 |
-- | Julie     | Firrelli  |      1143 |
-- | Steve     | Patterson |      1143 |
-- | Foon Yue  | Tseng     |      1143 |
-- | George    | Vanauf    |      1143 |
-- | Yoshimi   | Kato      |      1621 |
-- +-----------+-----------+-----------+
-- 23 rows in set (0.00 sec)
select
    firstname,
    lastname,
    reportsTo
from
    EMPLOYEES
ORDER BY
    reportsTo desc;

-- +-----------+-----------+-----------+
-- | firstname | lastname  | reportsTo |
-- +-----------+-----------+-----------+
-- | Yoshimi   | Kato      |      1621 |
-- | Leslie    | Jennings  |      1143 |
-- | Leslie    | Thompson  |      1143 |
-- | Julie     | Firrelli  |      1143 |
-- | Steve     | Patterson |      1143 |
-- | Foon Yue  | Tseng     |      1143 |
-- | George    | Vanauf    |      1143 |
-- | Loui      | Bondur    |      1102 |
-- | Gerard    | Hernandez |      1102 |
-- | Pamela    | Castillo  |      1102 |
-- | Larry     | Bott      |      1102 |
-- | Barry     | Jones     |      1102 |
-- | Martin    | Gerard    |      1102 |
-- | Andy      | Fixter    |      1088 |
-- | Peter     | Marsh     |      1088 |
-- | Tom       | King      |      1088 |
-- | William   | Patterson |      1056 |
-- | Gerard    | Bondur    |      1056 |
-- | Anthony   | Bow       |      1056 |
-- | Mami      | Nishi     |      1056 |
-- | Mary      | Patterson |      1002 |
-- | Jeff      | Firrelli  |      1002 |
-- | Diane     | Murphy    |      NULL |
-- +-----------+-----------+-----------+
-- 23 rows in set (0.00 sec)