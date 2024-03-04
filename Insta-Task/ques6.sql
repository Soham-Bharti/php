-- 6. user's active duration daily using id
select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_used
from tracking
inner join users on users.id = tracking.user_id
group by user_id
