delimiter $$

create procedure getCustomerShipping(
	IN pCustomerNumber INT,
    OUT pShipping varchar(50)
)
begin
	declare customerCountry varchar(100);
    
    select 
		country INTO customerCountry
	from
		customers
	where
		customerNumber = pCustomerNumber;
        
	CASE customerCountry
			when 'USA' THEN
					set pShipping = '2-day Shipping';
			when 'Canada' THEN 
					set pshipping = '3-day Shipping';
			else
					set pshipping = '5-day Shipping';
	END CASE;
end$$

delimiter ;

CALL GetCustomerShipping(112,@shipping);
SELECT @shipping;
