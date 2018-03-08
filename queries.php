<?php

// DISTINCT is used to return unique values in the output. It filters out all duplicate values in the specified column(s).
SELECT DISTINCT tools 
 FROM inventory;

// LIKE can be a useful operator when you want to compare similar values.
// The movies table contains two films with similar titles, 'Se7en' and 'Seven'.
// How could we select all movies that start with 'Se' and end with 'en' and have exactly one character in the middle? 
SELECT * 
FROM movies
WHERE name LIKE 'Se_en';

// The percentage sign % is another wildcard character that can be used with LIKE.
// This statement below filters the result set to only include movies with names that begin with the letter 'A':
SELECT * 
FROM movies
WHERE name LIKE 'A%';

// % is a wildcard character that matches zero or more missing letters in the pattern. For example:
//     A% matches all movies with names that begin with letter 'A'
//     %a matches all movies that end with 'a'
// We can also use % both before and after a pattern:
SELECT * 
FROM movies 
WHERE name LIKE '%man%';

// LIKE is not case sensitive. 'Batman' and 'Man of Steel' will both appear in the result of the query above.

// IS NULL, IS NOT NULL
SELECT name
 FROM movies 
 WHERE imdb_rating IS NULL;

// BETWEEN
SELECT *
 FROM movies
 WHERE name BETWEEN 'A' AND 'J';

 SELECT *
 FROM movies
 WHERE year BETWEEN 1990 AND 1999;
// Really interesting point to emphasize again:
// BETWEEN two letters is not inclusive.
// BETWEEN two numbers is inclusive.

 // AND
SELECT * 
FROM movies
WHERE year BETWEEN 1990 AND 1999
   AND genre = 'romance';

// OR
SELECT *
FROM movies
WHERE year > 2014
    OR genre = 'action';

// 	ORDER BY
SELECT *
FROM movies
ORDER BY name;

// ASC et DESC
SELECT *
FROM movies
WHERE imdb_rating > 8
ORDER BY year DESC;
// ORDER BY always goes after WHERE!

// LIMIT
SELECT *
FROM movies
LIMIT 5;

// top three highest rated movies.
SELECT *
FROM movies
ORDER BY imdb_rating DESC
LIMIT 3;

// CASE
SELECT name,
 CASE
  WHEN imdb_rating > 7 THEN 'Good'
  WHEN imdb_rating > 5 THEN 'Okay'
  ELSE 'Bad'
 END
FROM movies;

// pour renommer la colonne on utilise 'as'
SELECT name,
 CASE 
  WHEN genre = 'romance' THEN 'fun'
  WHEN genre = 'comedy' THEN 'fun'
  ELSE 'serious'
 END as 'mood'
FROM movies;
