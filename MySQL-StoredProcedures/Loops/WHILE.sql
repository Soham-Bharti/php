delimiter $$

create procedure printSquares(
	In from_num int,
    In to_num int
)
begin
	declare sqnum int default (from_num * from_num);
	drop table if exists nums;
    
    create table nums(
		square_number int
    );
    
    sq_loop: while from_num <=  to_num
    do 
		set sqnum = (from_num * from_num);
		insert into nums(square_number) value(sqnum);
		set from_num = from_num + 1;
	end while sq_loop;
	
    select * from nums;
    
end$$

delimiter ;

call printsquares(1,10);
-- square_number
-- 1
-- 4
-- 9
-- 16
-- 25
-- 36
-- 49
-- 64
-- 81
-- 100
drop procedure printsquares;
