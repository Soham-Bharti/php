<!-- 4. user's who have liked on any post/s -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select DISTINCT user_id, full_name, count(post_id) as total_like_counts
from post_likes
inner join users on users.id = post_likes.user_id
GROUP BY user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>user_id </th><th>full_name </th><th>total_like_counts </th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["user_id"] . "</td><td> " . $row["full_name"] . "</td><td> " . $row["total_like_counts"] ."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// user_id	full_name	total_like_counts
// 1	Soham Bharti	1
// 2	Amar Jain	    1
// 5	Anant Ambani	2
$conn->close();

