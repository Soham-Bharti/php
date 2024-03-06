<!-- 1. post details with user's id wise -->
<?php
require_once '../../config/dbConnect.php';
$sql = "select * from posts ORDER BY user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID </th><th>Title </th><th>USER_ID </th><th>DESCRIPTION </th><th>Created_at </th><th>Updated_at </th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["id"] . "</td><td> " . $row["title"] . "</td><td> " . $row["user_id"] . "</td><td> " . $row['description'] ."</td><td> ".$row['created_at']."</td><td> ----- ".$row['updated_at']."</td></tr>";
    }
    echo "</table>";
} else echo "0 rows returned!";
// output
// ID	Title	USER_ID	DESCRIPTION	Created_at	Updated_at
// 13	To do in life	1	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 1	MySQL Tutorial	2	By Soham	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 4	To do in life	2	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 5	To do in life	2	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 8	To do in life	3	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 3	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 7	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 9	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 11	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 14	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 17	To do in life	5	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 10	To do in life	6	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 15	To do in life	6	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 18	To do in life	6	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 12	To do in life	7	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 16	To do in life	7	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 2	Mental health	8		2024-03-05 17:09:05	----- 2024-03-05 17:09:05
// 6	To do in life	9	fiwghfihw	2024-03-05 17:09:05	----- 2024-03-05 17:09:05
$conn->close();
