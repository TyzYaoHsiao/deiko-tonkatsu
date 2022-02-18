create table customer ( 
	id INT NOT NULL AUTO_INCREMENT, 
	email VARCHAR(100) NOT NULL, 
	password VARCHAR(40) NOT NULL, 
	name VARCHAR(100), 
	PRIMARY KEY ( id ) 
);

create table coupon ( 
	id INT NOT NULL AUTO_INCREMENT, 
	name VARCHAR(100) NOT NULL,
	description VARCHAR(300) NOT NULL,
	status VARCHAR(1) NOT NULL,
	start_dt TIMESTAMP NOT NULL, 
	end_dt TIMESTAMP NOT NULL, 
	create_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
	PRIMARY KEY ( id ) 
);

create table cus_coupon ( 
	id INT NOT NULL AUTO_INCREMENT, 
	cus_id INT NOT NULL,
	coupon_id INT NOT NULL,
	status VARCHAR(1) NOT NULL,
	PRIMARY KEY ( id ) 
);