CREATE database banks;

use banks;

CREATE TABLE accounts (
    account_id INT AUTO_INCREMENT  PRIMARY KEY ,
    account_holder VARCHAR(255) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL,
    created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now()
);

CREATE TABLE transactions (
    transaction_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    transaction_type ENUM('DEPOSIT', 'WITHDRAWAL') NOT NULL,
	created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now(),
    FOREIGN KEY (account_id) REFERENCES accounts(account_id)
);

-- done
insert into accounts(account_holder, balance)
values ('Soham Bharti', 10000), ('Somi', 5000);

select * from accounts;
-- 1	Soham Bharti	9900.00	    2024-03-08 11:01:49	    2024-03-08 11:01:49
-- 2	Somi	        5100.00	    2024-03-08 11:01:49	    2024-03-08 11:01:49

delimiter $$
create PROCEDURE transfer(
	IN sender_id INT,
    IN receiver_id INT,
    IN amount dec(10,2)
)
BEGIN
	declare rollback_msg varchar(255) default 'Transactions rolled back due to INSUFICIENT funds';
    DECLARE commit_msg VARCHAR(255) default 'Transactions successful';
    
    start transaction;
    update accounts set balance = balance - amount where account_id = sender_id;
    update accounts set balance = balance + amount where account_id = receiver_id;
    
    if(select balance from accounts where account_id = sender_id) < 0 THEN
		rollback;
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = rollback_msg;
	else
		insert INTO transactions (account_id, amount, transaction_type) values (sender_id, -amount, 'WITHDRAWAL');
        insert into transactions (account_id, amount, transaction_type) values (receiver_id, amount, 'DEPOSIT');
    
		COMMIT;
        select commit_msg as `Result`;
	end if;
    
end$$

delimiter ;

drop procedure transfer;

call transfer(1,2,100);

select * from transactions;
-- 1	1	-100.00	    WITHDRAWAL	2024-03-08 11:02:10	2024-03-08 11:02:10
-- 2	2	 100.00	    DEPOSIT	    2024-03-08 11:02:10	2024-03-08 11:02:10
select * from accounts;
-- 1	Soham Bharti	9900.00	    2024-03-08 11:01:49	2024-03-08 11:01:49
-- 2	Somi	        5100.00	    2024-03-08 11:01:49	2024-03-08 11:01:49

call transfer(1,2,10000);
-- Error Code: 1644. Transactions rolled back due to INSUFICIENT funds

select * from transactions;
-- 1	1	-100.00	    WITHDRAWAL	2024-03-08 11:02:10	2024-03-08 11:02:10
-- 2	2	 100.00	    DEPOSIT	    2024-03-08 11:02:10	2024-03-08 11:02:10
select * from accounts;
-- 1	Soham Bharti	9900.00	    2024-03-08 11:01:49	2024-03-08 11:01:49
-- 2	Somi	        5100.00	    2024-03-08 11:01:49	2024-03-08 11:01:49

-- A transaction is a sequence of SQL statements that is executed as a single unit of work.
-- Use the START TRANSACTION statement to start a transaction.
-- Use the COMMIT statement to apply the changes made during the transaction to the database.
-- Use the ROLLBACK statement to roll back the changes made during the transaction and revert the state of the database before the transaction starts.