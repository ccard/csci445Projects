USE mysql;
drop table IF EXISTS Pets;
create table Pets(
	ID int PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(255) NOT NULL,
	Age int,
	PetType VARCHAR(255)
);

INSERT INTO Pets (Name,Age,PetType) VALUES ('Fluffy',3,'cat');
INSERT INTO Pets (Name,Age,PetType) VALUES ('Fido',8,'dog');
INSERT INTO Pets (Name,Age,PetType) VALUES ('Fiona',2,'turtle');
INSERT INTO Pets (Name,Age,PetType) VALUES ('Felix',10,'cat');
INSERT INTO Pets (Name,Age,PetType) VALUES ('Foobar',4,'dog');*/


/*Queries and resulsts
 select * from Pets;

ID      Name    Age     PetType
1       Fluffy  3       cat
2       Fido    8       dog
3       Fiona   2       turtle
4       Felix   10      cat
5       Foobar  4       dog 

select Name,Age from Pets where PetType='cat';
Name    Age
Fluffy  3
Felix   10

update Pets set Name='Thomas' where Name='Fiona';

delete from Pets where Name='Foobar';

select * from Pets;
ID      Name    Age     PetType
1       Fluffy  3       cat
2       Fido    8       dog
3       Thomas  2       turtle
4       Felix   10      cat

select sum(Age) as Total_Age, PetType from Pets group by PetType;
Total_Age       PetType
13      cat
8       dog
2       turtle

select Name, Age from Pets where Name like '%F%';
Name    Age
Fluffy  3
Fido    8
Felix   10
*/