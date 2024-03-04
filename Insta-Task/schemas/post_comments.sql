create table post_comments(
	id int primary key AUTO_INCREMENT,
    post_id int,
    user_id int,
    comment varchar(255),
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT post_comments_users_id_fk
    foreign key (user_id) references users (id)
    ON DELETE cascade,
    CONSTRAINT post_comments_posts_id_fk
    foreign key (post_id) references posts (id)
    on update cascade on delete cascade
);
