<?php
require '../../config/dbConnect.php';
/*
// declaring users table
$sql = "create table users(
	id int primary key auto_increment,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    full_name varchar(100) generated always as (concat(first_name, ' ', last_name)),
    email varchar(255) not null,
    mobile varchar(10) not null,
    gender enum('Male', 'Female', 'Others') default 'Others',
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT users_unique_col
    unique(email, mobile)    
)";

if ($conn->query($sql)) {
    echo "Table Users Created Successfully!";
} else echo "Unable to create Table";
*/

// inserting into table
$prearedStatement = $conn->prepare("INSERT INTO users(first_name, last_name, email, mobile, gender) values (?,?,?,?,?)");
$prearedStatement->bind_param('sssss', $first_name, $last_name, $email, $mobile, $gender);
$first_name = "Om";
$last_name = "Hare";
$email = "om.god@gmail.com";
$mobile = "9898745841";
$gender = "Others";
$prearedStatement->execute();
$first_name = "Shivam";
$last_name = "Shukla";
$email = "shivshuk9065@gmail.com";
$mobile = "8574581247";
$gender = "Male";
$prearedStatement->execute();
$first_name = "Mohit";
$last_name = "Dahiya";
$email = "dahiyamohit6756@gmail.com";
$mobile = "9784512363";
$gender = "Male";
$prearedStatement->execute();