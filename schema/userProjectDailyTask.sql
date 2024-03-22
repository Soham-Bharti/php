CREATE TABLE UserProjectDailyTask (
    id int primary key AUTO_INCREMENT,
    user_id INT,
    project_id INT,
    activity_log text,
    created_at DATETIME DEFAULT now(),
    updated_at DATETIME DEFAULT now(),
    deleted_at DATETIME DEFAULT null,
    FOREIGN KEY (user_id) REFERENCES users(id) on update cascade,
    FOREIGN KEY (project_id) REFERENCES projectss(id) on update cascade
);