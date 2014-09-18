USE mysql;
drop table IF EXISTS Books;
drop table IF EXISTS Authors;

create table Authors(
	ID int PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL
);

create table Books(
	ISBN VARCHAR(255) PRIMARY KEY,
	Title VARCHAR(255) NOT NULL,
	Author int,
	FOREIGN KEY (Author) REFERENCES Authors(ID)
);


INSERT INTO Authors (first_name,last_name) VALUES ('Edward','Wilson');
INSERT INTO Authors (first_name,last_name) VALUES ('Stephen','Gould');
INSERT INTO Authors (first_name,last_name) VALUES ('Larry','Laudan');
INSERT INTO Authors (first_name,last_name) VALUES ('Richard','Feynman');

INSERT INTO Books (ISBN,Title,Author) VALUES ('0-226-46949-2','Science and Relativism',3);
INSERT INTO Books (ISBN,Title) VALUES ('0-262-55025-3','Growing Artifical Societies');
INSERT INTO Books (ISBN,Title,Author) VALUES ('0-393-31047-7','The Diversity of Life',1);
INSERT INTO Books (ISBN,Title,Author) VALUES ('0-517-70393-9','Dinosaur in a Haystack',2);
INSERT INTO Books (ISBN,Title,Author) VALUES ('0-674-45490-1','The Insect Societies',1);


/* Quiries
select  first_name, last_name, Title, ISBN from Authors inner join Books on Authors.ID=Books.Author;
first_name      last_name       Title
Edward  Wilson  The Diversity of Life
Edward  Wilson  The Insect Societies
Stephen Gould   Dinosaur in a Haystack
Larry   Laudan  Science and Relativism

select  first_name, last_name, Title, ISBN from Authors inner join Books on Authors.ID=Books.Author where Author=1;
first_name      last_name       Title   ISBN
Edward  Wilson  The Diversity of Life   0-393-31047-7
Edward  Wilson  The Insect Societies    0-674-45490-1

select  first_name, last_name, Title, ISBN from Authors inner join Books on Authors.ID=Books.Author where last_name='Gould';
first_name      last_name       Title   ISBN
Stephen Gould   Dinosaur in a Haystack  0-517-70393-9

select  first_name, last_name, Title, ISBN from Books left join Authors on Authors.ID=Books.Author;
first_name      last_name       Title   ISBN
Edward  Wilson  The Diversity of Life   0-393-31047-7
Edward  Wilson  The Insect Societies    0-674-45490-1
Stephen Gould   Dinosaur in a Haystack  0-517-70393-9
Larry   Laudan  Science and Relativism  0-226-46949-2
NULL    NULL    Growing Artifical Societies     0-262-55025-3

select  first_name, last_name, Title, ISBN from Books right join Authors on Authors.ID=Books.Author;
first_name      last_name       Title   ISBN
Larry   Laudan  Science and Relativism  0-226-46949-2
Edward  Wilson  The Diversity of Life   0-393-31047-7
Stephen Gould   Dinosaur in a Haystack  0-517-70393-9
Edward  Wilson  The Insect Societies    0-674-45490-1
Richard Feynman NULL    NULL

select first_name as First, last_name as Last from (select Title, Author from Books right join Authors on Authors.ID=Books.Author) as t right join Authors on Authors.ID=t.Author where t.Title IS NULL;
First   Last
Richard Feynman
*/