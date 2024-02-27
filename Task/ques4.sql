-- Extract CustomerName, CustomerFullAddress, ProductName, EmployeeOfficeCode, and OrderSubtotal for orders placed but where payment has not been finaliz
select
    customerName,
    concat_WS(' ', addressLine1, city, state, country, postalCode) AS `Full Address`,
    productName,
    officeCode,
    sum(quantityOrdered * priceEach) AS OrderSubtotal,
    status
from
    customers
    inner join employees on employeeNumber = salesRepEmployeeNumber
    inner join orders using(customerNumber)
    inner join orderdetails using (orderNumber)
    inner join products using (productCode)
group by
    customerNumber,
    productName,
    officeCode,
    status
HAVING
    status = 'On Hold'
order by
    customerName

-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1904 Buick Runabout	2	4669.28	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	Collectable Wooden Train	2	4114.08	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1903 Ford Model A	2	5263.99	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1999 Yamaha Speed Boat	2	3406.48	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	The Schooner Bluenose	2	2294.00	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1972 Alfa Romeo GTA	2	5597.76	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	18th century schooner	2	4650.02	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1912 Ford Model T Delivery Wagon	2	4354.80	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	1940 Ford Delivery Sedan	2	3720.96	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	The Mayflower	2	2532.32	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	The USS Constitution Ship	2	1904.64	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	The Titanic	2	2355.92	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	The Queen Mary	2	3376.40	On Hold
-- Gifts4AllAges.com	8616 Spinnaker Dr. Boston MA USA 51003	Pont Yacht	2	2566.20	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	1997 BMW F650 ST	3	4013.59	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	P-51-D Mustang	3	3157.98	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	1928 British Royal Navy Airplane	3	3326.52	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	Corsair F4U ( Bird Cage)	3	3799.68	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	1900s Vintage Tri-Plane	3	3428.36	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	1928 Ford Phaeton Deluxe	3	3881.20	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	1930 Buick Marquette Phaeton	3	2321.76	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	American Airlines: B767-300	3	854.04	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	America West Airlines B757-200	3	8391.20	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	ATA: B757-300	3	2018.31	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	F/A 18 Hornet 1/72	3	5667.20	On Hold
-- Tekni Collectables Inc.	7476 Moss Rd. Newark NJ USA 94019	American Airlines: MD-11S	3	2665.20	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1949 Jaguar XK 120	1	6215.28	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1952 Citroen-15CV	1	5820.35	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1969 Chevrolet Camaro Z28	1	1001.65	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	2002 Chevy Corvette	1	4374.39	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1965 Aston Martin DB5	1	6754.32	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1917 Grand Touring Sedan	1	10723.60	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1911 Ford Town Car	1	2441.04	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1999 Indy 500 Monte Carlo SS	1	5412.00	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1932 Alfa Romeo 8C2300 Spider Sport	1	546.66	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1957 Ford Thunderbird	1	4233.24	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1970 Chevy Chevelle SS 454	1	1777.10	On Hold
-- The Sharp Gifts Warehouse	3086 Ingle Ln. San Jose CA USA 94217	1966 Shelby Cobra 427 S/C	1	2929.92	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1962 LanciaA Delta 16V	7	3380.26	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1926 Ford Fire Engine	7	1797.58	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1964 Mercedes Tour Bus	7	4968.00	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1962 Volkswagen Microbus	7	4937.94	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1940s Ford truck	7	4983.79	On Hold
-- Volvo Model Replicas, Co	Berguvsv├ñgen  8 Lule├Ñ Sweden S-958 22	1992 Ferrari 360 Spider red	7	2946.60	On Hold