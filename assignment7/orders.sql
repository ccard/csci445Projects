USE mysql;
drop table IF EXISTS Orders;

create table Orders(
	ID int PRIMARY KEY AUTO_INCREMENT,
	Customer VARCHAR(255) NOT NULL,
	Quantity int NOT NULL,
	Prod int NOT NULL,
	Price REAL NOT NULL,
	D VARCHAR(255) NOT NULL,
	FOREIGN KEY (Prod) REFERENCES Products(ID)
);