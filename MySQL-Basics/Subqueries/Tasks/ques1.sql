-- use outer query table column in subquery makes example at least 2 or 3
-- example 1
use classicmodels;
SELECT
	productname,
	buyprice
FROM
	products AS p
WHERE
	buyprice > (
		SELECT
			AVG(buyprice)
		FROM
			products
		where
			productline = p.productline
	);

-- 1952 Alpine Renault 1300	98.58
-- 1996 Moto Guzzi 1100i	68.99
-- 2003 Harley-Davidson Eagle Drag Bike	91.02
-- 1972 Alfa Romeo GTA	85.68
-- 1962 LanciaA Delta 16V	103.42
-- 1968 Ford Mustang	95.34
-- 2001 Ferrari Enzo	95.59
-- 1958 Setra Bus	77.90
-- 2002 Suzuki XREO	66.27
-- 1969 Corvair Monza	89.14
-- 1968 Dodge Charger	75.16
-- 1969 Ford Falcon	83.05
-- 1940 Ford Pickup Truck	58.33
-- 1993 Mazda RX-7	83.51
-- 1937 Lincoln Berline	60.62
-- 1965 Aston Martin DB5	65.96
-- 1980s Black Hawk Helicopter	77.27
-- 1917 Grand Touring Sedan	86.70
-- 1995 Honda Civic	93.89
-- 1998 Chrysler Plymouth Prowler	101.51
-- 1964 Mercedes Tour Bus	74.86
-- 1932 Model A Ford J-Coupe	58.48
-- 1928 Mercedes-Benz SSK	72.56
-- 1913 Ford Model T Speedster	60.78
-- 1999 Yamaha Speed Boat	51.61
-- 18th Century Vintage Horse Carriage	60.74
-- 1903 Ford Model A	68.30
-- 1992 Ferrari 360 Spider red	77.90
-- Collectable Wooden Train	67.56
-- 1917 Maxwell Touring Car	57.54
-- 1976 Ford Gran Torino	73.49
-- 1941 Chevrolet Special Deluxe Cabriolet	64.58
-- 1970 Triumph Spitfire	91.92
-- 1904 Buick Runabout	52.66
-- 1940s Ford truck	84.76
-- 1957 Corvette Convertible	69.93
-- 1997 BMW R 1100 S	60.86
-- 1928 British Royal Navy Airplane	66.74
-- 18th century schooner	82.34
-- 1962 Volkswagen Microbus	61.34
-- 1952 Citroen-15CV	72.82
-- 1912 Ford Model T Delivery Wagon	46.91
-- 1940 Ford Delivery Sedan	48.64
-- 1956 Porsche 356A Coupe	98.30
-- 1992 Porsche Cayenne Turbo Silver	69.78
-- 1936 Chrysler Airflow	57.46
-- 1997 BMW F650 ST	66.92
-- 1974 Ducati 350 Mk3 Desmo	56.13
-- Diamond T620 Semi-Skirted Tanker	68.29
-- American Airlines: B767-300	51.15
-- America West Airlines B757-200	68.80
-- ATA: B757-300	59.33
-- F/A 18 Hornet 1/72	54.40
-- The Titanic	51.09
-- The Queen Mary	53.63

-- example 2
use classicmodels;
SELECT
	productcode,
	priceeach
FROM
	orderdetails AS o
WHERE
	priceeach > (
		SELECT
			AVG(priceeach)  * 2
		FROM
			orderdetails
	);
-- S10_1949	214.30
-- S12_1108	205.72
-- S10_1949	197.16
-- S12_1108	195.33
-- S10_1949	205.73
-- S12_1108	193.25
-- S10_4698	187.85
-- S10_1949	186.44
-- S10_1949	182.16
-- S12_1108	201.57
-- S12_1099	188.73
-- S10_1949	212.16
-- S10_1949	207.87
-- S12_1108	195.33
-- S10_4698	182.04
-- S10_1949	203.59
-- S12_1108	203.64
-- S10_4698	191.72
-- S10_1949	203.59
-- S10_4698	189.79
-- S10_1949	205.73
-- S12_1108	189.10
-- S10_4698	189.79
-- S10_1949	214.30
-- S12_1108	193.25
-- S10_1949	195.01
-- S12_1108	195.33
-- S10_4698	193.66
-- S12_1099	188.73
-- S12_1108	187.02
-- S12_1099	184.84
-- S10_1949	205.73
-- S12_1099	190.68
-- S10_1949	210.01
-- S12_1108	187.02
-- S12_1099	184.84
-- S10_1949	201.44
-- S12_1108	182.86
-- S10_4698	187.85
-- S10_1949	214.30
-- S10_4698	189.79
-- S12_1099	184.84
-- S12_1108	193.25
-- S12_1099	182.90
-- S10_1949	188.58
-- S12_1099	192.62
-- S10_1949	188.58
-- S12_1108	207.80
-- S10_1949	199.30
-- S10_4698	182.04
-- S10_1949	195.01
-- S12_1099	184.84
-- S10_1949	182.16
-- S12_1099	182.90
-- S10_1949	195.01
-- S12_1108	205.72
-- S10_1949	205.73
-- S12_1108	201.57
-- S12_1099	182.90
-- S10_1949	201.44

-- example 3
use classicmodels;
SELECT
	productcode,
	priceeach
FROM
	(
		select 
			productcode, priceeach
		from 
			orderdetails
		inner join orders
        using (orderNumber)
        where status = 'On Hold'
    ) as blah_blah
WHERE
	priceeach > (
		SELECT
			AVG(priceeach) 
		FROM
			orderdetails
	);
-- S10_4962	130.01
-- S18_2319	108.00
-- S18_3232	147.33
-- S18_4600	101.71
-- S24_2300	117.57
-- S700_2466	98.72
-- S700_2834	96.11
-- S18_1589	114.48
-- S18_1749	141.10
-- S18_2870	132.00
-- S18_4409	91.11
-- S24_2887	98.65
-- S24_3432	101.73
-- S10_4757	114.24
-- S18_3140	128.39
-- S24_2011	108.14