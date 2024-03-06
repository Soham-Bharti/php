create table transactions(
	id int auto_increment primary key,
    account_id int,
    type enum('credit', 'debit') not null,
    amount int not null check(amount > 0),
    status enum('success', 'pending') not null,
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    foreign key (account_id)
    references accounts(id)
    on update cascade on delete cascade
);

insert into transactions(account_id, type, amount, status, created_at) 
values(8,'credit', 500, 'success', '2021-5-5 9:10:2');

select * from transactions;