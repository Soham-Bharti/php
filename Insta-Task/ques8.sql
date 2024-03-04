-- 8. top 10 daily screen time users on specific day wise
select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_spended
from tracking
inner join users on users.id = tracking.user_id
where DATE(from_time) = '2024-03-25'
group by user_id
order by minutes_spended desc
limit 10;

select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_spended
from tracking
inner join users on users.id = tracking.user_id
where YEAR(from_time) = '2024'
group by user_id
order by minutes_spended desc
limit 10;


select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_spended
from tracking
inner join users on users.id = tracking.user_id
where YEAR(from_time) = '2021'
group by user_id
order by minutes_spended desc
limit 10