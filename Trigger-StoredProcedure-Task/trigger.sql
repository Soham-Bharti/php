delimiter //

create function fun(
    uname varchar(255)
)
returns varchar(255)
DETERMINISTIC
begin
	declare new_name varchar(255);
    
    set new_name = concat(uname, ' sst');
    
    return new_name;

end//


delimiter ;

drop trigger update_name_before;


use test;


DELIMITER //
CREATE TRIGGER update_name_before
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
	SET NEW.name = fun(NEW.name);
END//
DELIMITER ;



DELIMITER //
CREATE TRIGGER update_name_before
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    CALL update_name(NEW.name, @out);
    SET NEW.name = @out;
END//
DELIMITER ;


