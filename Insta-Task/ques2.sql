-- 2. user's details with total post counts
select 
u.id, count(p.id) as total_post_count
from users u
left join posts p on u.id = p.user_id
group by u.id;

-- select * from posts;
-- select * from users;
-- select count(id), user_id from posts group by user_id;
-- select * from posts where user_id = 11;