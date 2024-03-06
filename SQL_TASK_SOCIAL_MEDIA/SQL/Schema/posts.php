<?php
require '../../config/dbConnect.php';
/*
$sql = "create table posts(
	id int primary key AUTO_INCREMENT,
    user_id int,
    title varchar(50) not null,
    description varchar(255),
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT posts_fk
    foreign key (user_id) references users (id)
    on UPDATE cascade on delete CASCADE
)";
if ($conn->query($sql)) {
    echo "Table Posts Created Successfully!";
} else echo "Unable to create Table";
*/

/*
// inserting into table
$prearedStatement = $conn->prepare("INSERT INTO posts(user_id,title, description) values (?,?,?)");
$prearedStatement->bind_param('iss', $user_id,$title, $description);
$title = "MySQL Tutorial";
$description = "By Soham";
$user_id = 2;
$prearedStatement->execute();
$title = "Mental health";
$description = "";
$user_id = 8;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 2;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 2;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 9;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 3;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 6;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 7;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 1;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 6;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 7;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 5;
$prearedStatement->execute();
$title = "To do in life";
$description = "fiwghfihw";
$user_id = 6;
$prearedStatement->execute();
*/
