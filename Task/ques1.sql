-- 1. Retrieve all customers who haven't placed any orders yet.
select customerName, orderNumber, customerNumber
from customers
left join orders using (customerNumber)
where orderNumber is null
order by customerNumber;

-- Havel & Zbyszek Co		125
-- American Souvenirs Inc		168
-- Porto Imports Co.		169
-- Asian Shopping Network, Co		206
-- Nat├╝rlich Autos		223
-- ANG Resellers		237
-- Messner Shopping Network		247
-- Franken Gifts, Co		273
-- BG&E Collectables		293
-- Schuyler Imports		303
-- Der Hund Imports		307
-- Cramer Spezialit├ñten, Ltd		335
-- Asian Treasures, Inc.		348
-- SAR Distributors, Co		356
-- Kommission Auto		361
-- Lisboa Souveniers, Inc		369
-- Precious Collectables		376
-- Stuttgart Collectable Exchange		409
-- Feuer Online Stores, Inc		443
-- Warburg Exchange		459
-- Anton Designs, Ltd.		465
-- Mit Vergn├╝gen & Co.		477
-- Kremlin Collectables, Co.		480
-- Raanan Stores, Inc		481