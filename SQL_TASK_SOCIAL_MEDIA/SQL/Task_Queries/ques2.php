<!-- 2. user's details with total post counts -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select 
u.id, count(p.id) as total_post_count
from users u
left join posts p on u.id = p.user_id
group by u.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID </th><th>Total Post Count</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["id"] . "</td><td> " . $row["total_post_count"] ."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// ID	Total Post Count
// 1	1
// 2	3
// 3	1
// 4	0
// 5	6
// 6	3
// 7	2
// 8	1
// 9	1
// 10	0
$conn->close();