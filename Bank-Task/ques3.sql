-- 3. count of user's total bank accounts
select u.id, full_name, count(user_id) as total_bank_accounts, email, IFSC_code
from users u
inner join accounts on u.id = user_id
group by user_id, IFSC_code