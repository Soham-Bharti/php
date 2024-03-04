-- 4. user's who have liked on any post/s
select DISTINCT user_id, full_name
from post_likes
inner join users on users.id = post_likes.user_id;