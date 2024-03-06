-- 6. user's account wise transactions monthly and weekly (only successful) 
-- weekly
select u.id, u.full_name, a.account_number, type, sum(t.amount) as total_amount , weekday(t.created_at) as week, year(t.created_at) as year
from transactions t
inner join accounts a on a.id = t.account_id
inner join users u on u.id = a.user_id
where status = 'success'
group by weekday(t.created_at), type,  year(t.created_at), u.id, a.account_number
order by u.id;


-- monthly
select u.id, u.full_name,a.account_number, type, sum(t.amount) as total_amount , year(t.created_at) as year, monthname(t.created_at) as month
from transactions t
inner join accounts a on a.id = t.account_id
inner join users u on u.id = a.user_id
where status = 'success'
group by type,  year(t.created_at),  monthname(t.created_at), u.id, a.account_number
order by u.id;