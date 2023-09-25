<?php

include("../MySql.php");

$sql = new MySQL();

/******
 * Admin Table
 ***/
$query = "create table admins(
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
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Admin Table created successfully.";
}else{
    echo "Admin Table failed to create.";
}

/******
 * Customer Table
 ***/
$query = "CREATE TABLE `customers` (
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
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Customer Table created successfully.";
}else{
    echo "Customer Table failed to create.";
}

/******
 * Campsite Table
 ***/
$query = "CREATE TABLE campsites(
    id int(11) PRIMARY KEY auto_increment,
    name varchar(100) not null,
    location text not null,
    created_at datetime not null,
    updated_at datetime not null
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Campsite Table created successfully.";
}else{
    echo "Campsite Table failed to create.";
}


/******
 * Pitch Type Table
 ***/
$query = "create table pitch_types(
    id int(11) primary key auto_increment,
    name varchar(200) not null,
    created_at datetime not null,
    updated_at datetime not null
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Pitch Type Table created successfully.";
}else{
    echo "Pitch Type Table failed to create.";
}


/******
 * Contact Table
 ***/
$query = "create table contacts(
    id int(11) primary key auto_increment,
    email varchar(200) not null,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    message text NOT NULL,
    created_at datetime not null,
    updated_at datetime not null
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Contact Table created successfully.";
}else{
    echo "Contact Table failed to create.";
}

/******
 * Package Table
 ***/
$query = "CREATE TABLE packages (
    id int(11) PRIMARY KEY auto_increment,
    pitch_type_id int(11) NOT NULL,
    campsite_id int(11) NOT NULL,
    name varchar(200) NOT NULL,
    description text not null,
    price int(11) NOT NULL,
    image varchar(255) NOT NULL,
    location text NOT NULL,
    status tinyint NOT NULL DEFAULT 0,
    updated_at datetime NOT NULL,	
    created_at datetime NOT NULL,
    FOREIGN KEY (pitch_type_id) REFERENCES pitch_types(id),
    FOREIGN KEY (campsite_id) REFERENCES campsites(id)
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Package Table created successfully.";
}else{
    echo "Package Table failed to create.";
}


/******
 * Booking Table
 ***/
$query = "create table bookings(
    id int(11) primary key auto_increment,
    customer_id int(11) not null,
    package_id int(11) NOT NULL,
    qty int(11) NOT NULL,
    price int(11) NOT NULL,
    tax int(11) NOT NULL DEFAULT 10,
    subtotal int(11) NOT NULL, 
    status tinyint NOT NULL DEFAULT 0,
    payment_type varchar(100),
    booking_date datetime not null,
    created_at datetime not null,
    updated_at datetime not null,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (package_id) REFERENCES packages(id)
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Booking Table created successfully.";
}else{
    echo "Booking Table failed to create.";
}

/******
 * Feature Table
 ***/

$query = "CREATE TABLE features(
    id int(11) PRIMARY KEY auto_increment,
    name varchar(100) NOT NULL,
    description text NOT NULL,
    image varchar(200) not null
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Feature Table created successfully.";
}else{
    echo "Feature Table failed to create.";
}

/******
 * Attraction Table
 ***/
$query = "CREATE TABLE attractions(
    id int(11) PRIMARY KEY auto_increment,
    name varchar(100) NOT NULL,
    description text not null,
    location text NOT NULL,
    image varchar(255) not null
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Attraction Table created successfully.";
}else{
    echo "Attraction Table failed to create.";
}

/******
 * Review Table
 ***/
$query = "create table reviews(
    id int(11) primary key auto_increment,
    customer_id int(11) not null,
    package_id int(11) not null,
    message varchar(256) not null,
    rating int(1),
    created_at datetime not null,
    updated_at datetime not null,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (package_id) REFERENCES packages(id)
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Review Table created successfully.";
}else{
    echo "Review Table failed to create.";
}

/******
 * Package_Feature Table
 ***/
$query = "CREATE TABLE package_feature(
    package_id int(11) NOT NULL,
    feature_id int(11) NOT NULL,
    FOREIGN KEY (package_id) REFERENCES packages(id),
    FOREIGN KEY (feature_id) REFERENCES features(id)
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Package_Feature Pivot Table created successfully.";
}else{
    echo "Package_Feature Pivot Table failed to create.";
}

/******
 * Package_Attraction Table
 ***/
$query = " CREATE TABLE package_attraction(
    package_id int(11) NOT NULL,
    attraction_id int(11) NOT NULL,
    FOREIGN KEY (package_id) REFERENCES packages(id),
    FOREIGN KEY (attraction_id) REFERENCES attractions(id)
)";
$result = $sql->connect()->query($query);
if($result){
    echo "Package_Attraction Pivot Table created successfully.";
}else{
    echo "Package_Attraction Pivot Table failed to create.";
}

  
  