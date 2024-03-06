<?php
require '../../config/dbConnect.php';
$sql = "create table post_images(
	id int primary key auto_increment,
    post_id int,
    image BLOB,
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT post_images_posts_id_fk
    foreign key (post_id) references posts (id) on update cascade on delete cascade
)";
if ($conn->query($sql)) {
    echo "Table Posts Created Successfully!";
} else echo "Unable to create Table";
