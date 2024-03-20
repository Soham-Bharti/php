create table projects(
	id int primary key auto_increment,
    title varchar(255) not null,
    description varchar(255),
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    deleted_at DATETIME DEFAULT null
);  