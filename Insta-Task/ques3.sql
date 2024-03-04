-- 3. like count, comment count on posts
select p.id as post_id, count(pl.user_id) as like_count, count(pc.user_id) as comment_count
from posts p
left join post_likes pl on p.id = pl.post_id
left join post_comments pc on p.id = pc.post_id
group by p.id
ORDER BY p.id, count(pl.user_id), count(pc.user_id);

-- separately
select post_id, count(user_id) as like_count 
from post_likes 
group by post_id;

select post_id, count(user_id) as comment_count
from post_comments
group by post_id;
