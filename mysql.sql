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
    img_path varchar(50),
    constraint pk_id_event primary key (id_event),
    constraint fk_id_category foreign key (id_category) references categories (id_category)
);

create table calendars(
    id_calendar int auto_increment,
    calendar_name date,
    id_event int,
    id_event_place int,
    constraint pk_id_calendar primary key (id_calendar),
    constraint fk_id_event foreign key (id_event) references events (id_event),
    constraint fk_id_event_place foreign key (id_event_place) references event_places (id_event_place)
);

create table artists_x_calendar(
    id_artists_x_calendar int auto_increment,
    id_artist int,
    id_calendar int,
    constraint pk_artists_x_calendar primary key (id_artists_x_calendar),
    constraint fk_id_artist foreign key (id_artist) references artists (id_artist),
    constraint fk_id_calendar foreign key (id_calendar) references calendars (id_calendar)
);

create table users(
    id_user int auto_increment,
    user_email varchar(50),
    user_name varchar(50),
    user_pass varchar(50),
    user_role varchar(50),
    constraint pk_id_user primary key (id_user),
    constraint unq_user_email unique (user_email),
    constraint unq_user_name unique (user_name)
);

create table place_types(
    id_place_type int auto_increment,
    place_type_description varchar(50),
    constraint pk_id_place_type primary key (id_place_type)
);

insert into artists (artist_name) values ('Ricardo Montaner'),('Shakira'),('Maluma'),('Chaquenio Palavecino'),('Paulo Londra'),('Ed Sheeran');
insert into categories (category_name) values ('Obra Teatral'),('Recital'),('Festival'),('Deportivo'),('Entretenimiento General'),('Lectura'),('Informatica'),('Gastronomica');
insert into event_places (event_place_name, capacity) values ('Gran Rex', '3262'),('Luna Park', '9290'),('Jose Amalfitani', '49540'),('La Rural','950'),('Teatro Opera','2500');
insert into users (user_email, user_name, user_pass, user_role) values ('admin@admin.com', 'admin', 'admin123', 'admin');

