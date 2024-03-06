-- 9. all user's current account's balance
-- wrong
select u.id, credit_amount-debit_amount
from
(select u.id, sum(t.amount) as credit_amount, a.account_number
from transactions t
inner join accounts a on t.account_id = a.id
inner join users u on a.user_id = u.id
where t.status = "success" and t.type = "credit"
group by u.id, a.account_number) as a
cross join 
(select u.id, sum(t.amount) as debit_amount, a.account_number
from transactions t
inner join accounts a on t.account_id = a.id
inner join users u on a.user_id = u.id
where t.status = "success" and t.type = "debit"
group by u.id, a.account_number) as b
using (u.id);

-- right
SELECT u.id AS user_id, 
       COALESCE(SUM(CASE WHEN t.type = 'credit' THEN t.amount ELSE 0 END), 0) -
       COALESCE(SUM(CASE WHEN t.type = 'debit' THEN t.amount ELSE 0 END), 0) AS balance
FROM users u
LEFT JOIN accounts a ON u.id = a.user_id
LEFT JOIN transactions t ON a.id = t.account_id AND t.status = 'success'
GROUP BY u.id;
