-- 5. user's who have liked or commented on any post/s
select DISTINCT user_id, full_name from post_likes
inner join users on users.id = post_likes.user_id
union
select DISTINCT user_id, full_name from post_comments
inner join users on users.id = post_comments.user_id
