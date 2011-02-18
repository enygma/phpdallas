# Initial database structure
create table `meetings` (
	title varchar(100), 
	detail TEXT, 
	meeting_date INT, 
	ID INT NOT NULL AUTO_INCREMENT, 
	PRIMARY KEY(ID)
);

create table `users` (
	username VARCHAR(50),
	password VARCHAR(40),
	email VARCHAR(100),
	full_name VARCHAR(100),
	ID INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(ID)
);
