<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 4/11/2016
 * Time: 11:13 PM
 */
function initializeDB()
{
    $config = require("config.php");

    $con = mysqli_connect($config['host'], $config['username'], $config['password']);


    $stmt = mysqli_prepare($con, 'DROP DATABASE IF EXISTS cs174hw3');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE DATABASE cs174hw3;' );
    mysqli_stmt_execute($stmt);

    mysqli_select_db($con,"cs174hw3");

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS User;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE User
(userID INT AUTO_INCREMENT,
username VARCHAR(30) NOT NULL DEFAULT \'user\',
password VARCHAR(30) NOT NULL DEFAULT \'password\',
PRIMARY KEY (userID)
);');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS Image;' );
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE Image
(imageID INT AUTO_INCREMENT,
userID INT,
imagename VARCHAR(50) NOT NULL UNIQUE,
average FLOAT DEFAULT 0,
date TIMESTAMP,
caption VARCHAR(200) NOT NULL Default \'image\',
PRIMARY KEY(imageID),
FOREIGN KEY(userID) REFERENCES User(userID)
);');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS ImageRating;' );
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE TABLE ImageRating
(userID INT,
imageID INT,
rating INT,
PRIMARY KEY (userID,imageID),
FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE,
FOREIGN KEY(imageID) REFERENCES Image(imageID) ON DELETE CASCADE
);');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'INSERT INTO User
Values(null,"student","password"),
(null,"s1","p1"),
(null,"s2","p2");');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'INSERT INTO Image
Values(null,1,"Cyberpunk_1.jpg",4.3,"2016-04-11 06:02:11","test"),
(null,2,"Cyberpunk_2.jpg",4.7,"2016-04-11 06:02:12", "test2"),
(null,3,"Cyberpunk_3.jpg",2.0,"2016-04-11 07:02:13", "test3"),
(null,1,"Cyberpunk_4.jpg",2.0,"2016-04-11 08:02:14", "test4"),
(null,2,"Cyberpunk_5.jpg",4.0,"2016-04-11 07:02:10", "test5"),
(null,3,"Cyberpunk_8.jpg",3.0,now(), "test6"),
(null,3,"Cyberpunk_10.jpg",0,"2016-04-11 07:05:50","amazing caption"),
(null,3,"turtle_1.jpg",0,"2016-04-11 08:30:05", "the turtle"),
(null,3,"BG_1.jpg",0,"2016-04-11 08:20:05", "Hawaii is amazing"),
(null,3,"BG_2.jpg",0,"2016-04-11 08:40:05", "Another picture of Hawaii")');

    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'INSERT INTO ImageRating
Values(1,1,4),(1,2,5),(1,3,1),(1,4,2),(1,5,3),(1,6,4),
(2,1,5),(2,2,4),(2,3,3),(2,6,2),
(3,1,4),(3,2,5);');
    mysqli_stmt_execute($stmt);

    $stmt->close();
    $con->close();

    echo ("Database Successfully Initialized. Be sure to change check mysql login is correct.");
}

initializeDB();