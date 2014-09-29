USE mysql;
drop table IF EXISTS Products;

create table Products(
	ID int PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(255) NOT NULL,
	Price REAL NOT NULL
);


INSERT INTO Products (Name,Price) VALUES ('Coffee',3.30);
INSERT INTO Products (Name,Price) VALUES ('Ripple Fire Water',4.50);
INSERT INTO Products (Name,Price) VALUES ('ER espresso shot',6.50);
INSERT INTO Products (Name,Price) VALUES ('Troll snot',0.5);