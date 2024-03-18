create table employeeDetails(
	id int primary key AUTO_INCREMENT,
	user_id int,
	salary dec(10,2),
	technology_assigned varchar(255) not null,
	joining_date DATE not null,
	bond_period varchar(255),
	notice_period varchar(255),
    created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now(),
    deleted_at DATETIME DEFAULT null,
	CONSTRAINT fk_empProDet
    FOREIGN KEY (user_id)
    REFERENCES users(id)
		on update cascade
);

select * from employeeDetails;
INSERT INTO employeeDetails (user_id, salary, technology_assigned, joining_date, bond_period, notice_period) 
VALUES ('27', '12000', 'PHP', '2024-03-17', '1 years 0 months', '2 months 0 days');
INSERT into employeeDetails (user_id, salary, technology_assigned, joining_date, bond_period, notice_period) values ('31', '12000', 'android', '2024-03-18', '2 years 10 months', '2 months 11 days');