<!-- 5. user's who have liked or commented on any post/s -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select DISTINCT user_id, full_name from post_likes
inner join users on users.id = post_likes.user_id
union
select DISTINCT user_id, full_name from post_comments
inner join users on users.id = post_comments.user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>user_id </th><th>full_name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["user_id"] . "</td><td> " . $row["full_name"]."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// user_id	full_name
// 1	Soham Bharti
// 2	Amar Jain
// 5	Anant Ambani
// 6	Poonam Patel
$conn->close();