create table posts(
	id int primary key AUTO_INCREMENT,
    user_id int,
    title varchar(50) not null,
    description varchar(255),
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT posts_fk
    foreign key (user_id) references users (id)
    on UPDATE cascade on delete CASCADE
);
