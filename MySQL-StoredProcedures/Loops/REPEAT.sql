-- creating a procedure for printing numbers in reverse
delimiter $$

create PROCEDURE printNumbersInReverse(
	IN from_num int,
    IN to_num int
)
begin
	declare n int DEFAULT from_num;
    
    drop table if exists fibo_table;
    
    create table fibo_table(
		num int
    );
    
    rev_nums: repeat
		set n = from_num;
		INSERT into fibo_table(num) values(n);
        set from_num = from_num - 1;
    until from_num < to_num
    end repeat;
    
    select * from fibo_table;
    

end$$

delimiter ;

call printNumbersInReverse(10,1);
-- num
-- 10
-- 9
-- 8
-- 7
-- 6
-- 5
-- 4
-- 3
-- 2
-- 1

drop PROCEDURE printNumbersInReverse;
