-- 7. all over top 10 daily screen time users
select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_spended
from tracking
inner join users on users.id = tracking.user_id
group by user_id
order by minutes_spended desc
limit 10
