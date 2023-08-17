CREATE TABLE `customers` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

create table admins(
	id int(11) primary key auto_increment,
	first_name varchar(100) not null,
	sur_name varchar(100) not null,
	email varchar(255) not null,
	password varchar(255) not null,
	phone varchar(30) NOT NULL,
	address text not null,
	position varchar(100) not null,
	created_at datetime not null,
	updated_at datetime not null
);

CREATE TABLE campsites(
	id int(11) PRIMARY KEY auto_increment,
	name varchar(100),
	location varchar(255),
	created_at datetime not null,
	updated_at datetime not null
);

create table pitch_types(
	id int(11) primary key auto_increment,
	name varchar(200) not null,
	created_at datetime not null,
	updated_at datetime not null
);

create table contacts(
	id int(11) primary key auto_increment,
	email varchar(200) not null,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	message text NOT NULL,
	created_at datetime not null,
	updated_at datetime not null
);

CREATE TABLE packages (
	id int(11) PRIMARY KEY auto_increment,
	pitch_type_id int(11) NOT NULL,
	campsite_id int(11) NOT NULL,
	name varchar(200) NOT NULL,
	description text not null,
	image varchar(255) NOT NULL,
	location varchar(255) NOT NULL,
	status tinyint NOT NULL DEFAULT 0,
	updated_at datetime NOT NULL,	
	created_at datetime NOT NULL,
	FOREIGN KEY (pitch_type_id) REFERENCES pitch_types(id),
	FOREIGN KEY (campsite_id) REFERENCES campsites(id)
);

create table bookings(
	id int(11) primary key auto_increment,
	customer_id int(11) not null,
	package_id int(11) NOT NULL,
    qty int(11) NOT NULL,
    price int(11) NOT NULL,
    tax int(11) NOT NULL,
    subtotal int(11) NOT NULL, 
    status tinyint NOT NULL DEFAULT 0,
    payment_type varchar(100) NOT NULL,
	booking_date datetime not null,
	created_at datetime not null,
	updated_at datetime not null,
	FOREIGN KEY (customer_id) REFERENCES customers(id),
	FOREIGN KEY (package_id) REFERENCES packages(id)
);

CREATE TABLE features(
	id int(11) PRIMARY KEY auto_increment,
	name varchar(100) NOT NULL,
	description text NOT NULL,
	image varchar(200) not null
);
CREATE TABLE attractions(
	id int(11) PRIMARY KEY auto_increment,
	name varchar(100) NOT NULL,
	description text not null,
	location varchar(150) NOT NULL,
	image varchar(255) not null
);

create table reviews(
	id int(11) primary key auto_increment,
	customer_id int(11) not null,
	package_id int(11) not null,
	message varchar(256) not null,
	rating int(1),
	created_at datetime not null,
	updated_at datetime not null,
	FOREIGN KEY (customer_id) REFERENCES customers(id),
	FOREIGN KEY (package_id) REFERENCES packages(id)
);

CREATE TABLE package_feature(
	package_id int(11) NOT NULL,
	feature_id int(11) NOT NULL,
	FOREIGN KEY (package_id) REFERENCES packages(id),
	FOREIGN KEY (feature_id) REFERENCES features(id)
);
CREATE TABLE package_attraction(
	package_id int(11) NOT NULL,
	attraction_id int(11) NOT NULL,
	FOREIGN KEY (package_id) REFERENCES packages(id),
	FOREIGN KEY (attraction_id) REFERENCES attractions(id)
);

