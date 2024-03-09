create table users(
	id int primary key,
    name varchar(255) not null,
    created_at datetime DEFAULT now(),
    updated_at datetime DEFAULT now()
);


insert into users(name) values('sagar');

select * from users;
