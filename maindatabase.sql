create table property
(
    id       int          not null,
    apraksts varchar(220) not null,
    user_id  int          not null
)
    charset = latin1;

create table users
(
    user_id    int auto_increment
        primary key,
    username   varchar(220)                 not null,
    password   varchar(220)                 not null,
    name       varchar(220)                 not null,
    email      varchar(220)                 not null,
    email_code varchar(220)                 not null,
    active     int                          not null,
    gender     varchar(220)                 null,
    location   varchar(220) default 'start' null,
    ipaddress  int                          null
)
    charset = latin1;

create table groupchatroom
(
    fromuser         int  null,
    message          text null,
    groupchatroom_id int auto_increment
        primary key,
    constraint groupchatroom_users_user_id_fk
        foreign key (fromuser) references users (user_id)
);


