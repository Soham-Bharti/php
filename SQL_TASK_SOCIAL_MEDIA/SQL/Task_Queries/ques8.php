<!-- 8. top 10 daily screen time users on specific day wise -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_spended
from tracking
inner join users on users.id = tracking.user_id
where DATE(from_time) = '2024-03-25'
group by user_id
order by minutes_spended desc
limit 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>user_id </th><th>full_name </th><th>minutes_spended </th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["user_id"] . "</td><td> " . $row["full_name"] . "</td><td> " . $row["minutes_spended"] ."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// user_id	full_name	minutes_spended
// 5	Anant Ambani	60
// 6	Poonam Patel	60
$conn->close();