<!-- 6. user's active duration daily using id -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select user_id, full_name, sum(timestampdiff(minute, from_time, to_time)) as minutes_used
from tracking
inner join users on users.id = tracking.user_id
group by user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>user_id </th><th>full_name </th><th>minutes_used </th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["user_id"] . "</td><td> " . $row["full_name"] . "</td><td> " . $row["minutes_used"] ."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// user_id	full_name	minutes_used
// 2	Amar Jain	472
// 5	Anant Ambani	776
// 6	Poonam Patel	60
// 7	Sagar Ji	483
// 10	Mohit Dahiya	408
$conn->close();