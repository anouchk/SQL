<?php

// COUNT select column or columns
SELECT COUNT(*)
 FROM table_name;

 SELECT SUM(downloads)
 FROM fake_apps;

 SELECT MIN(downloads)
 FROM fake_apps;

 SELECT MAX(downloads)
 FROM fake_apps;

 SELECT AVG(downloads)
 FROM fake_apps;

// ROUND (column_name, number of decimal places)
 SELECT ROUND(price, 0)
 FROM fake_apps;

 SELECT ROUND(AVG(price), 2)
 FROM fake_apps;

// GROUP BY
// ça fait des tableaux croisés dynamiques !
SELECT year,
    AVG(imdb_rating)
 FROM movies
 GROUP BY year
 ORDER BY year;
 // The GROUP BY statement comes after any WHERE statements, but before ORDER BY or LIMIT.

 SELECT category, SUM(downloads) 
 FROM fake_apps
 GROUP BY category;

// Numbers of the column
 // SQL lets us use column reference(s) in our GROUP BY that will make our lives easier.

 //     1 is the first column selected
 //     2 is the second column selected
 //     3 is the third column selected

 SELECT ROUND(imdb_rating),
    COUNT(name)
 FROM movies
 GROUP BY ROUND(imdb_rating)
 ORDER BY ROUND(imdb_rating);
 // is the same as :
  SELECT ROUND(imdb_rating),
    COUNT(name)
 FROM movies
 GROUP BY 1
 ORDER BY 1;

 // HAVING
 // it's like WHERE (that works for rows) but for groups
 SELECT year,
    genre,
    COUNT(name)
 FROM movies
 GROUP BY 1, 2
 HAVING COUNT(name) > 10

// Certain price points don't have very many apps, so the average is less meaningful.
// Add a HAVING clause to restrict the query to prices where the total number of apps at that price point is greater than 9.
  SELECT price, 
    ROUND(AVG(downloads))
 FROM fake_apps
 GROUP BY price
 HAVING COUNT(*)>9;

// Exercice
//  Return the average valuation, in each category.
// Round the averages to two decimal places.
// Lastly, order the list from highest averages to lowest.
SELECT category, ROUND(AVG(valuation), 2) 
FROM startups
GROUP BY category
ORDER BY ROUND(AVG(valuation), 2) DESC;