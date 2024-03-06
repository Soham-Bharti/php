create table accounts(
	id int primary key auto_increment,
    user_id int,
    account_number int(17) not null unique,
    IFSC_code int(11) not null,
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    foreign key (user_id)
    references users(id)
    on update cascade on delete cascade
);

insert into accounts(user_id, account_number, IFSC_code) 
values(11, 100001, 789456654);

select * from accounts;