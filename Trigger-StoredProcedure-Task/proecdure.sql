delimiter //
create procedure update_name(
	IN u_name varchar(255),
    OUT out_name varchar(255)
)
begin
	declare new_name varchar(255);
     
	set new_name = concat(u_name,' sst');

	select new_name into out_name;

end//
delimiter ;