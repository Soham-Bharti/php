use employeetracker;
create table users(
	id int primary key AUTO_INCREMENT,
    role enum('admin', 'employee') not null default 'employee',
    name varchar(255) not null,
    email varchar(255) unique not null,
    password varchar(255) not null,
    gender enum('male', 'female', 'others') not null,
    mobile varchar(10) not null,
    date_of_birth DATE,
    address varchar(255),
    city varchar(255),
    state varchar(255),
    profile_url varchar(255),
    created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now(),
    deleted_at DATETIME DEFAULT null
);

select * from 	users;		
use employeetracker;
delete from users where deleted_at is not null and id != 3;
desc users;
set foreign_key_checks = 0;

insert into users(role,name, email, password, gender, mobile, date_of_birth, address, city, state) values('admin', 'soham', 'admin.silversky@gmail.com', '11', 'male','7744114474', '1999-08-15', '', 'Darbhanga', 'Bihar');
