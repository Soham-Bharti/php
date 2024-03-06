-- 7. sum of all pending transactions
select sum(t.amount) as total_amount, status
from transactions t
inner join accounts a on t.account_id = a.id
where status = 'pending'
group by status;


-- 7. sum of all pending transactions user wise
select t.id as transaction_id, sum(t.amount) as total_amount, status, a.account_number, a.user_id, u.full_name
from transactions t
inner join accounts a on t.account_id = a.id
inner join users u on u.id = a.user_id
where status = 'pending'
group by t.id;


