<?php
CREATE TABLE celebs (id INTEGER, name TEXT, age INTEGER);
INSERT INTO celebs (id, name, age) VALUES (1, 'Justin Bieber', 21);
SELECT * FROM celebs;

INSERT INTO celebs (id, name, age) VALUES (2, 'Beyonce Knowles', 33); 

INSERT INTO celebs (id, name, age) VALUES (3, 'Jeremy Lin', 26); 

INSERT INTO celebs (id, name, age) VALUES (4, 'Taylor Swift', 26);

SELECT name FROM celebs;

// let's edit a row
UPDATE celebs 
SET age = 22 
WHERE id = 1; 

SELECT * FROM celebs;

// let's add a column
ALTER TABLE celebs ADD COLUMN twitter_handle TEXT; 

SELECT * FROM celebs;

PDATE celebs 
SET twitter_handle = '@taylorswift13' 
WHERE id = 4; 

SELECT * FROM celebs;

// let's delete some rows
DELETE FROM celebs WHERE twitter_handle IS NULL; 
SELECT * FROM celebs;

// create a new table with constraints
CREATE TABLE awards (
  id INTEGER PRIMARY KEY,
  recipient TEXT NOT NULL,
  award_name TEXT DEFAULT "Grammy");

// A statement is a string of characters that the database recognizes as a valid command.

    // CREATE TABLE creates a new table.
    // INSERT INTO adds a new row to a table.
    // SELECT queries data from a table.
    // UPDATE edits a row in a table.
    // ALTER TABLE changes an existing table.
    // DELETE FROM deletes rows from a table.

// Exercice
CREATE TABLE friends (id INTEGER, name TEXT, birthday DATE);
INSERT INTO friends (id, name, birthday) VALUES (1, 'Jane Doe', 1993-19-05);
INSERT INTO friends (id, name, birthday) VALUES (2, 'Beyonce Knowles',1987); 
INSERT INTO friends (id, name, birthday) VALUES (3, 'Jeremy Lin', 2002); 
INSERT INTO friends (id, name, birthday) VALUES (4, 'Taylor Swift', 1954);
UPDATE friends
SET name = 'Jane Smith'
WHERE id = 1; 
ALTER TABLE friends ADD COLUMN email TEXT; 
UPDATE friends
SET email = 'jdoe@example.com'
WHERE id = 1;
UPDATE friends
SET email = 'bknowles@example.com'
WHERE id = 2; 
UPDATE friends
SET email = 'jlin@example.com'
WHERE id = 3; 
UPDATE friends
SET email = 'tswift@example.com'
WHERE id = 4; 
DELETE FROM  friends WHERE id=1; 
SELECT * FROM friends;


