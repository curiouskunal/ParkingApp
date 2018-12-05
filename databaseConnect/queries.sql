use parkingapp;

describe parkingspot;
select * from parkingspot;


CREATE TABLE users (
uid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
CONSTRAINT pk_user PRIMARY KEY (uid)
);

CREATE TABLE parkingspot (
pid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
uid SMALLINT UNSIGNED NOT NULL,
name VARCHAR(30) NOT NULL,
discription VARCHAR(200) NOT NULL,
latitude float NOT NULL,
longitude float NOT NULL,
photo VARCHAR(30) NOT NULL,
CONSTRAINT pk_spot PRIMARY KEY (pid),
CONSTRAINT fk_user FOREIGN KEY (uid) REFERENCES users(uid)
);

CREATE TABLE reviews (
rid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
uid SMALLINT UNSIGNED NOT NULL,
pid SMALLINT UNSIGNED NOT NULL,
rating SMALLINT UNSIGNED NOT NULL,
CONSTRAINT pk_review PRIMARY KEY (rid),
FOREIGN KEY (pid) REFERENCES parkingspot(pid),
FOREIGN KEY (uid) REFERENCES users(uid)
);

INSERT INTO reviews (uid,pid,rating,review) VALUES ("1","1","5","good");


select parkingspot.pid from parkingspot inner join reviews on parkingspot.pid = reviews.pid where name like '%%' and price between $MinPrice and $MaxPrice and 111.111 * DEGREES(ACOS(LEAST(COS(RADIANS(latitude)) * COS(RADIANS($current_latitude)) * COS(RADIANS(longitude - ($current_longitude))) + SIN(RADIANS(latitude)) * SIN(RADIANS(latitude)), 1.0))) < $maxDistance group by parkingspot.pid having avg(reviews.rating) between $MinRating and $MaxRating;

select parkingspot.pid from parkingspot inner join reviews on parkingspot.pid = reviews.pid where name like '%%' and price between '1' and '1000' and 111.111 * DEGREES(ACOS(LEAST(COS(RADIANS(latitude)) * COS(RADIANS($current_latitude)) * COS(RADIANS(longitude - ($current_longitude))) + SIN(RADIANS(latitude)) * SIN(RADIANS(latitude)), 1.0))) < $maxDistance group by parkingspot.pid having avg(reviews.rating) between $MinRating and $MaxRating;
