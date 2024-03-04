create table users(
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
);
