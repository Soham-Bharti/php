use classicmodels;

select
    pl.productline,
    pl.textDescription,
    p.productCode,
    p.productName
from
    productlines AS pl
    INNER JOIN products AS p
where
    pl.productline = p.productline;

-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S10_1949	1952 Alpine Renault 1300
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S10_4757	1972 Alfa Romeo GTA
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S10_4962	1962 LanciaA Delta 16V
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_1099	1968 Ford Mustang
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_1108	2001 Ferrari Enzo
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_3148	1969 Corvair Monza
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_3380	1968 Dodge Charger
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_3891	1969 Ford Falcon
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_3990	1970 Plymouth Hemi Cuda
-- Classic Cars	Attention car enthusiasts: Make your wildest car ownership dreams come true. Whether you are looking for classic muscle cars, dream sports cars or movie-inspired miniatures, you will find great choices in this category. These replicas feature superb atte...	S12_4675	1969 Dodge Charger
select
    c.customerNumber,
    c.customerName,
    c.state,
    p.paymentDate,
    p.amount
from
    customers as c
    INNER JOIN payments as p using(customerNumber)
where
    state is not null
    and (
        amount BETWEEN 15000
        and 20000
        OR customerName like 'a%'
    )
    and (
        customerNumber > 300
        or state = 'MA'
    );

-- 198	Auto-Moto Classics Inc.	MA	2004-12-06	9658.74
-- 198	Auto-Moto Classics Inc.	MA	2003-07-06	6036.96
-- 198	Auto-Moto Classics Inc.	MA	2004-09-21	5858.56
-- 333	Australian Gift Network, Co	Queensland	2003-11-15	23936.53
-- 333	Australian Gift Network, Co	Queensland	2003-10-17	9821.32
-- 333	Australian Gift Network, Co	Queensland	2005-03-01	21432.31
-- 362	Gifts4AllAges.com	MA	2004-07-11	18473.71
-- 362	Gifts4AllAges.com	MA	2004-09-21	15059.76
-- 447	Gift Ideas Corp.	CT	2003-06-25	17032.29
-- 471	Australian Collectables, Ltd	Victoria	2004-07-28	9415.13
-- 471	Australian Collectables, Ltd	Victoria	2003-12-10	35505.63
use classicmodels;

select
    c.customerNumber,
    c.customerName,
    c.state,
    p.paymentDate,
    p.amount
from
    customers as c
    INNER JOIN payments as p using(customerNumber)
where
    state is not null
    and (
        amount BETWEEN 15000
        and 20000
        OR customerName like 'a%'
    )
    and (
        customerNumber > 300
        or state = 'MA'
    )
    and paymentDate BETWEEN "2003-11-10"
    and "2004-10-10";

-- 198	Auto-Moto Classics Inc.	MA	2004-09-21	5858.56
-- 333	Australian Gift Network, Co	Queensland	2003-11-15	23936.53
-- 362	Gifts4AllAges.com	MA	2004-07-11	18473.71
-- 362	Gifts4AllAges.com	MA	2004-09-21	15059.76
-- 471	Australian Collectables, Ltd	Victoria	2004-07-28	9415.13
-- 471	Australian Collectables, Ltd	Victoria	2003-12-10	35505.63