-- 8. sum of pending transactions monthly
select sum(t.amount) as total_amount, status, monthname(t.created_at) as month, year(t.created_at) as year
from transactions t
inner join accounts a on t.account_id = a.id
where status = 'pending'
group by status, monthname(t.created_at), year(t.created_at);