-- 5. all user's monthly transactions with acc details 
select u.id, u.full_name, sum(t.amount) as total_amount , monthname(t.created_at) as month, year(t.created_at) as year, a.account_number, a.IFSC_code
from users u
inner join accounts a on a.user_id = u.id
inner join transactions t on t.account_id = a.id
group by  u.id, a.account_number, a.IFSC_code, monthname(t.created_at), year(t.created_at)
order by u.id;

