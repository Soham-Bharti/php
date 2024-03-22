CREATE TABLE employeesprojects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT,
    user_id INT,
    created_at DATETIME DEFAULT NOW(),
    updated_at DATETIME DEFAULT NOW(),
    deleted_at DATETIME DEFAULT NULL,
    CONSTRAINT fk_pId
        FOREIGN KEY (project_id)
        REFERENCES projects(id)
        ON UPDATE CASCADE,
    CONSTRAINT fk_empId
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON UPDATE CASCADE
);
