create table employeeTrackingDetails(
	id int primary key AUTO_INCREMENT,
    user_id INT,
    check_in_time DATETIME not null,
    check_out_time DATETIME default null,
    created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now(),
    deleted_at DATETIME,
    CONSTRAINT fk_emptrackDet
    FOREIGN KEY (user_id)
    REFERENCES users(id)
		on update cascade 
);


select *  from employeeTrackingDetails where user_id = 27  and deleted_at is null;