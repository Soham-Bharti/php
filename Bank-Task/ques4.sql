-- 4. all over weekly, monthly transactions in total
-- weekly
select type, sum(t.amount) as total_amount , weekday(t.created_at) as week, year(t.created_at) as year, monthname(t.created_at) as month
from transactions t
inner join accounts a on a.id = t.account_id
group by weekday(t.created_at), type,  year(t.created_at),  monthname(t.created_at)
order by year desc;


-- monthly
select type, sum(t.amount) as total_amount , year(t.created_at) as year, monthname(t.created_at) as month
from transactions t
inner join accounts a on a.id = t.account_id
group by type,  year(t.created_at),  monthname(t.created_at)
order by year desc;



select type, sum(amount), week(created_at) as week_number
from transactions
where year(created_at) = '2024'
group by week(created_at), type;

