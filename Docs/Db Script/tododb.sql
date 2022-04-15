create database ToDoDB;

create table ToDoDB.User (
	id int auto_increment,
    name varchar(225) not null,
    lastName varchar(225) not null,
    email varchar(225) not null,
    password varchar(20) not null,
    image varchar(225),
    primary key(id)
);

create table ToDoDB.ToDoList (
	id int auto_increment,
    title varchar(100) not null,
    description text not null,
    creationDate timestamp not null,
    expirationDate timestamp,
    User_idUser int not null,
    primary key(id),
    foreign key(User_idUser) references ToDoDB.User (id)
);

alter table ToDoDB.User modify column name varchar(225) not null;
alter table ToDoDB.User modify column lastName varchar(225) not null;
alter table ToDoDB.User modify column email varchar(225) not null unique;
alter table ToDoDB.User modify column password varchar(20) not null;
alter table ToDoDB.User add primary key(User_idUser);
