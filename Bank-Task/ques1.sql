-- 1. users' who have account
select distinct user_id, full_name
from accounts
join users on accounts.user_id = users.id;


-- 1. users' who have account with acc_number
select user_id, full_name, account_number
from accounts
join users on accounts.user_id = users.id
order by user_id;