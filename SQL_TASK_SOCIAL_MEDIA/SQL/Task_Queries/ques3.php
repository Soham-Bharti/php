<!-- 3. like count, comment count on posts -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select p.id as post_id, count(pl.user_id) as like_count, count(pc.user_id) as comment_count
from posts p
left join post_likes pl on p.id = pl.post_id
left join post_comments pc on p.id = pc.post_id
group by p.id
ORDER BY p.id, count(pl.user_id), count(pc.user_id)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>post_id </th><th>like_count </th><th>USER_ID </th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["post_id"] . "</td><td> " . $row["like_count"] . "</td><td> " . $row["comment_count"] ."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// post_id	like_count	USER_ID
// 1	0	0
// 2	6	6
// 3	0	0
// 4	0	0
// 5	0	1
// 6	0	0
// 7	0	1
// 8	0	0
// 9	0	1
// 10	2	2
// 11	0	0
// 12	0	0
// 13	0	0
// 14	0	0
// 15	0	0
// 16	0	0
// 17	0	0
// 18	0	0
$conn->close();