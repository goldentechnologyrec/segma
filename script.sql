CREATE TABLE authors (
  id SERIAL NOT NULL  PRIMARY KEY,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  telephone  varchar(15),
  groupes varchar(10) NOT NULL
  );

