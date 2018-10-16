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
    place_name varchar(50),
    capacity varchar(50),
    constraint pk_id_event_place primary key (id_event_place),
    constraint unq_place_name unique (place_name)
);