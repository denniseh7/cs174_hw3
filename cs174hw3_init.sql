DROP DATABASE IF EXISTS cs174hw3;
CREATE DATABASE cs174hw3;
USE cs174hw3;

DROP TABLE IF EXISTS User;
CREATE TABLE User
(userID INT AUTO_INCREMENT,
username VARCHAR(30) NOT NULL DEFAULT 'user',
password VARCHAR(30) NOT NULL DEFAULT 'password',
PRIMARY KEY (userID)
);

DROP TABLE IF EXISTS Image;
CREATE TABLE Image
(imageID INT AUTO_INCREMENT,
userID INT,
imagename VARCHAR(50) NOT NULL UNIQUE,
average FLOAT DEFAULT 0,
date TIMESTAMP,
caption VARCHAR(50) NOT NULL Default 'image',
PRIMARY KEY(imageID),
FOREIGN KEY(userID) REFERENCES User(userID)
);

DROP TABLE IF EXISTS ImageRating;
CREATE TABLE ImageRating
(userID INT,
imageID INT,
rating INT,
PRIMARY KEY (userID,imageID),
FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE,
FOREIGN KEY(imageID) REFERENCES Image(imageID) ON DELETE CASCADE
);

INSERT INTO User
Values(null,"student","password"),
(null,"s1","p1"),
(null,"s2","p2");

INSERT INTO Image 
Values(null,1,"1.jpg",4.3,"2016-04-11 06:02:11","test"),
(null,2,"2.jpg",4.7,"2016-04-11 06:02:12", "test2"),
(null,3,"3.jpg",2.0,"2016-04-11 06:02:13", "test3"),
(null,1,"4.jpg",2.0,"2016-04-11 06:02:14", "test4"),
(null,2,"5.jpg",4.0,"2016-04-11 06:02:10", "test5"),
(null,3,"6.jpg",3.0,now(), "test6");

INSERT INTO ImageRating
Values(1,1,4),(1,2,5),(1,3,1),(1,4,2),(1,5,3),(1,6,4),
(2,1,5),(2,2,4),(2,3,3),(2,4,2),(2,5,5),(2,6,2),
(3,1,4),(3,2,5);
