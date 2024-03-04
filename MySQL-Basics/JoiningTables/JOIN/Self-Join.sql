-- A self join allows you to join a table to itself. Since MySQL does not have specific self join syntax, you need to perform a self join via a regular join such as left join or inner join.
-- Since you reference the same table within a single query, you need to use table aliases to assign the table a temporary name when you reference it for the second time.
-- To perform a self join, you follow these steps:
-- Alias a table: Assign each instance of the table a unique alias to differentiate between them.
-- Specify the join condition: Define how the rows from each instance of the table should be compared. In a self join, you typically compare values in columns within the same table.
-- Select the desired columns: specify the columns that you want to include in the final result set.
-- 1) Performing a self join using an inner join
use classicmodels;

SELECT
    concat(m.lastName, ' ', m.firstName) AS Manager,
    concat(e.lastName, ' ', e.firstName) AS `Direct Reort`
FROM
    employees e
    INNER JOIN employees m ON m.employeeNumber = e.reportsTo
ORDER BY
    Manager;

-- Bondur Gerard	Bondur Loui
-- Bondur Gerard	Hernandez Gerard
-- Bondur Gerard	Castillo Pamela
-- Bondur Gerard	Bott Larry
-- Bondur Gerard	Jones Barry
-- Bondur Gerard	Gerard Martin
-- Bow Anthony	Jennings Leslie
-- Bow Anthony	Thompson Leslie
-- Bow Anthony	Firrelli Julie
-- Bow Anthony	Patterson Steve
-- Bow Anthony	Tseng Foon Yue
-- Bow Anthony	Vanauf George
-- Murphy Diane	Patterson Mary
-- Murphy Diane	Firrelli Jeff
-- Nishi Mami	Kato Yoshimi
-- Patterson Mary	Patterson William
-- Patterson Mary	Bondur Gerard
-- Patterson Mary	Bow Anthony
-- Patterson Mary	Nishi Mami
-- Patterson William	Fixter Andy
-- Patterson William	Marsh Peter
-- Patterson William	King Tom
-- 2) Performing a self join using a left join
SELECT
    IFNULL(
        CONCAT(m.lastname, ', ', m.firstname),
        'Top Manager'
    ) AS 'Manager',
    CONCAT(e.lastname, ', ', e.firstname) AS 'Direct report'
FROM
    employees e
    LEFT JOIN employees m ON m.employeeNumber = e.reportsto
ORDER BY
    manager DESC;

-- Top Manager	Murphy, Diane
-- Patterson, William	Fixter, Andy
-- Patterson, William	Marsh, Peter
-- Patterson, William	King, Tom
-- Patterson, Mary	Patterson, William
-- Patterson, Mary	Bondur, Gerard
-- Patterson, Mary	Bow, Anthony
-- Patterson, Mary	Nishi, Mami
-- Nishi, Mami	Kato, Yoshimi
-- Murphy, Diane	Patterson, Mary
-- Murphy, Diane	Firrelli, Jeff
-- Bow, Anthony	Jennings, Leslie
-- Bow, Anthony	Thompson, Leslie
-- Bow, Anthony	Firrelli, Julie
-- Bow, Anthony	Patterson, Steve
-- Bow, Anthony	Tseng, Foon Yue
-- Bow, Anthony	Vanauf, George
-- Bondur, Gerard	Bondur, Loui
-- Bondur, Gerard	Hernandez, Gerard
-- Bondur, Gerard	Castillo, Pamela
-- Bondur, Gerard	Bott, Larry
-- Bondur, Gerard	Jones, Barry
-- Bondur, Gerard	Gerard, Martin

-- 3) Using a self join to compare successive rows within the same table
SELECT 
    c1.city,
    c1.customerName,
    c2.customerName
from 
	customers c1
inner join customers c2 
	on c1.city = c2.city and c1.customerName <> c2.customerName
order by 
	c1.city;
-- Auckland  	Down Under Souveniers, Inc	Kelly's Gift Shop
-- Auckland  	Kelly's Gift Shop	Down Under Souveniers, Inc
-- Boston	Diecast Collectables	Gifts4AllAges.com
-- Boston	Gifts4AllAges.com	Diecast Collectables
-- Brickhaven	Auto-Moto Classics Inc.	Collectables For Less Inc.
-- Brickhaven	Online Mini Collectables	Collectables For Less Inc.
-- Brickhaven	Collectables For Less Inc.	Auto-Moto Classics Inc.
-- Brickhaven	Online Mini Collectables	Auto-Moto Classics Inc.
-- Brickhaven	Collectables For Less Inc.	Online Mini Collectables
-- Brickhaven	Auto-Moto Classics Inc.	Online Mini Collectables
-- Cambridge	Marta's Replicas Co.	Cambridge Collectables Co.
-- Cambridge	Cambridge Collectables Co.	Marta's Replicas Co.
-- Frankfurt	Messner Shopping Network	Blauer See Auto, Co.
-- Frankfurt	Blauer See Auto, Co.	Messner Shopping Network
-- Glendale	Boards & Toys Co.	Gift Ideas Corp.
-- Glendale	Gift Ideas Corp.	Boards & Toys Co.
-- Lisboa	Lisboa Souveniers, Inc	Porto Imports Co.
-- Lisboa	Porto Imports Co.	Lisboa Souveniers, Inc
-- London	Double Decker Gift Stores, Ltd	Stylish Desk Decors, Co.
-- London	Stylish Desk Decors, Co.	Double Decker Gift Stores, Ltd
-- Madrid	CAF Imports	Euro+ Shopping Channel
-- Madrid	Euro+ Shopping Channel	ANG Resellers
-- Madrid	ANG Resellers	Corrida Auto Replicas, Ltd
-- Madrid	Anton Designs, Ltd.	CAF Imports
-- Madrid	Corrida Auto Replicas, Ltd	CAF Imports
-- Madrid	Euro+ Shopping Channel	CAF Imports
-- Madrid	Anton Designs, Ltd.	Corrida Auto Replicas, Ltd
-- Madrid	Anton Designs, Ltd.	Euro+ Shopping Channel
-- Madrid	Corrida Auto Replicas, Ltd	Euro+ Shopping Channel
-- Madrid	ANG Resellers	CAF Imports
-- Madrid	ANG Resellers	Euro+ Shopping Channel
-- Madrid	CAF Imports	Corrida Auto Replicas, Ltd
-- Madrid	Euro+ Shopping Channel	Corrida Auto Replicas, Ltd
-- Madrid	Corrida Auto Replicas, Ltd	Anton Designs, Ltd.
-- Madrid	CAF Imports	Anton Designs, Ltd.
-- Madrid	ANG Resellers	Anton Designs, Ltd.
-- Madrid	Euro+ Shopping Channel	Anton Designs, Ltd.
-- Madrid	Anton Designs, Ltd.	ANG Resellers
-- Madrid	Corrida Auto Replicas, Ltd	ANG Resellers
-- Madrid	CAF Imports	ANG Resellers
-- Nantes	Atelier graphique	La Rochelle Gifts
-- Nantes	La Rochelle Gifts	Atelier graphique
-- New Bedford	Mini Creations Ltd.	FunGiftIdeas.com
-- New Bedford	FunGiftIdeas.com	Mini Creations Ltd.
-- New Haven	Super Scale Inc.	American Souvenirs Inc
-- New Haven	American Souvenirs Inc	Super Scale Inc.
-- NYC	Land of Toys Inc.	Vitachrome Inc.
-- NYC	Microscale Inc.	Land of Toys Inc.
-- NYC	Classic Legends Inc.	Land of Toys Inc.
-- NYC	Vitachrome Inc.	Land of Toys Inc.
-- NYC	Muscle Machine Inc	Land of Toys Inc.
-- NYC	Microscale Inc.	Muscle Machine Inc
-- NYC	Classic Legends Inc.	Muscle Machine Inc
-- NYC	Vitachrome Inc.	Muscle Machine Inc
-- NYC	Land of Toys Inc.	Muscle Machine Inc
-- NYC	Muscle Machine Inc	Vitachrome Inc.
-- NYC	Classic Legends Inc.	Vitachrome Inc.
-- NYC	Microscale Inc.	Vitachrome Inc.
-- NYC	Vitachrome Inc.	Microscale Inc.
-- NYC	Microscale Inc.	Classic Legends Inc.
-- NYC	Vitachrome Inc.	Classic Legends Inc.
-- NYC	Muscle Machine Inc	Classic Legends Inc.
-- NYC	Land of Toys Inc.	Classic Legends Inc.
-- NYC	Classic Legends Inc.	Microscale Inc.
-- NYC	Muscle Machine Inc	Microscale Inc.
-- NYC	Land of Toys Inc.	Microscale Inc.
-- Paris	Lyon Souveniers	Auto Canal+ Petit
-- Paris	La Corne D'abondance, Co.	Auto Canal+ Petit
-- Paris	Auto Canal+ Petit	La Corne D'abondance, Co.
-- Paris	La Corne D'abondance, Co.	Lyon Souveniers
-- Paris	Lyon Souveniers	La Corne D'abondance, Co.
-- Paris	Auto Canal+ Petit	Lyon Souveniers
-- Philadelphia	Motor Mint Distributors Inc.	Classic Gift Ideas, Inc
-- Philadelphia	Classic Gift Ideas, Inc	Motor Mint Distributors Inc.
-- San Francisco	Corporate Gift Ideas Co.	Mini Wheels Co.
-- San Francisco	Mini Wheels Co.	Corporate Gift Ideas Co.
-- Singapore	Handji Gifts& Co	Asian Shopping Network, Co
-- Singapore	Handji Gifts& Co	Dragon Souveniers, Ltd.
-- Singapore	Asian Shopping Network, Co	Dragon Souveniers, Ltd.
-- Singapore	Dragon Souveniers, Ltd.	Handji Gifts& Co
-- Singapore	Asian Shopping Network, Co	Handji Gifts& Co
-- Singapore	Dragon Souveniers, Ltd.	Asian Shopping Network, Co

