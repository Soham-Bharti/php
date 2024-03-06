-- 2. users' who didn't have any account
select full_name, email, mobile, id
from users
where users.id not in
(select distinct user_id
from accounts
join users on accounts.user_id = users.id);

-- alter
select full_name, email, mobile, u.id
from users u
except
select full_name, email, mobile, a.id
from users a
join accounts on accounts.user_id = a.id;

-- alter

