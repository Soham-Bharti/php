create table post_likes(
	id int primary key AUTO_INCREMENT,
    post_id int not null,
    user_id int not null,
    created_at DATETIME default now(),
    updated_at DATETIME default now(),
    CONSTRAINT post_likes_users_id_fk
    foreign key (user_id) references users (id)
    on delete CASCADE,
    CONSTRAINT post_likes_posts_id_fk
    foreign key (post_id) references posts (id)
    on update cascade on delete cascade,
    unique(user_id, post_id)
);
