-- 2. Provide a list of customers along with their product details for orders pending payment.
select customerNumber, orderNumber, status
from customers
join orders using(customerNumber)
where status = 'On Hold';
-- 144	10334	On Hold
-- 328	10401	On Hold
-- 450	10407	On Hold
-- 362	10414	On Hold

select customerNumber, productCode, productName, orderNumber, status
from customers
join orders using(customerNumber)
join orderdetails using(orderNumber)
join products using(productCode)
where status = 'On Hold';
-- 144	S10_4962	1962 LanciaA Delta 16V	10334	On Hold
-- 144	S18_2319	1964 Mercedes Tour Bus	10334	On Hold
-- 144	S18_2432	1926 Ford Fire Engine	10334	On Hold
-- 144	S18_3232	1992 Ferrari 360 Spider red	10334	On Hold
-- 144	S18_4600	1940s Ford truck	10334	On Hold
-- 144	S24_2300	1962 Volkswagen Microbus	10334	On Hold
-- 328	S18_2581	P-51-D Mustang	10401	On Hold
-- 328	S24_1785	1928 British Royal Navy Airplane	10401	On Hold
-- 328	S24_3949	Corsair F4U ( Bird Cage)	10401	On Hold
-- 328	S24_4278	1900s Vintage Tri-Plane	10401	On Hold
-- 328	S32_1374	1997 BMW F650 ST	10401	On Hold
-- 328	S32_4289	1928 Ford Phaeton Deluxe	10401	On Hold
-- 328	S50_1341	1930 Buick Marquette Phaeton	10401	On Hold
-- 328	S700_1691	American Airlines: B767-300	10401	On Hold
-- 328	S700_2466	America West Airlines B757-200	10401	On Hold
-- 328	S700_2834	ATA: B757-300	10401	On Hold
-- 328	S700_3167	F/A 18 Hornet 1/72	10401	On Hold
-- 328	S700_4002	American Airlines: MD-11S	10401	On Hold
-- 450	S18_1589	1965 Aston Martin DB5	10407	On Hold
-- 450	S18_1749	1917 Grand Touring Sedan	10407	On Hold
-- 450	S18_2248	1911 Ford Town Car	10407	On Hold
-- 450	S18_2870	1999 Indy 500 Monte Carlo SS	10407	On Hold
-- 450	S18_4409	1932 Alfa Romeo 8C2300 Spider Sport	10407	On Hold
-- 450	S18_4933	1957 Ford Thunderbird	10407	On Hold
-- 450	S24_1046	1970 Chevy Chevelle SS 454	10407	On Hold
-- 450	S24_1628	1966 Shelby Cobra 427 S/C	10407	On Hold
-- 450	S24_2766	1949 Jaguar XK 120	10407	On Hold
-- 450	S24_2887	1952 Citroen-15CV	10407	On Hold
-- 450	S24_3191	1969 Chevrolet Camaro Z28	10407	On Hold
-- 450	S24_3432	2002 Chevy Corvette	10407	On Hold
-- 362	S10_4757	1972 Alfa Romeo GTA	10414	On Hold
-- 362	S18_3029	1999 Yamaha Speed Boat	10414	On Hold
-- 362	S18_3140	1903 Ford Model A	10414	On Hold
-- 362	S18_3259	Collectable Wooden Train	10414	On Hold
-- 362	S18_4522	1904 Buick Runabout	10414	On Hold
-- 362	S24_2011	18th century schooner	10414	On Hold
-- 362	S24_3151	1912 Ford Model T Delivery Wagon	10414	On Hold
-- 362	S24_3816	1940 Ford Delivery Sedan	10414	On Hold
-- 362	S700_1138	The Schooner Bluenose	10414	On Hold
-- 362	S700_1938	The Mayflower	10414	On Hold
-- 362	S700_2610	The USS Constitution Ship	10414	On Hold
-- 362	S700_3505	The Titanic	10414	On Hold
-- 362	S700_3962	The Queen Mary	10414	On Hold
-- 362	S72_3212	Pont Yacht	10414	On Hold