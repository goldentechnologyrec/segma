CREATE TABLE utilisateurs (
  id SERIAL PRIMARY KEY NOT NULL,
  pseudo varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password text NOT NULL,
  ip varchar(20) NOT NULL,
  token text NOT NULL,
  date_inscription date
);

