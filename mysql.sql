create database gotoevent;

use gotoevent;

create table artists(
    id_artist int auto_increment,
    artist_name varchar(50),
    constraint pk_id_artist primary key (id_artist),
    constraint unq_artist_name unique (artist_name)
);

create table categories(
    id_category int auto_increment,
    category_name varchar(50),
    constraint pk_id_category primary key (id_category),
    constraint unq_category_name unique (category_name)
);

create table event_places(
    id_event_place int auto_increment,
    event_place_name varchar(50),
    capacity varchar(50),
    constraint pk_id_event_place primary key (id_event_place),
    constraint unq_place_name unique (event_place_name)
);

create table events(
    id_event int auto_increment,
    event_name varchar(50),
    id_category int,
    id_event_place int,
    constraint pk_id_event primary key (id_event),
    constraint fk_id_category foreign key (id_category) references categories (id_category),
    constraint fk_id_event_place foreign key (id_event_place) references event_places (id_event_place)
);

