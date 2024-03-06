<?php
require '../../config/dbConnect.php';
/*
$sql = "create table tracking(
	id int primary key auto_increment,
    user_id int,
    from_time DATETIME not null,
    to_time DATETIME not null,
    constraint tracking_fk
    foreign key (user_id) references users (id),
    check(from_time < to_time),
    unique(user_id, from_time, to_time)
)";
if ($conn->query($sql)) {
    echo "Table Created Successfully!";
} else echo "Unable to create Table";
*/
