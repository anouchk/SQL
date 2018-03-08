<?php

// If we want to combine orders and customers, we would type:
SELECT *
FROM orders
JOIN customers
    ON orders.customer_id = customers.customer_id;

// if we only wanted to select the order_id from orders and the customer_name from customers, we could use the following query:
SELECT orders.order_id,
       customers.customer_name
FROM orders
JOIN customers
    ON orders.customer_id = customers.customer_id;

// exercice
SELECT *
FROM orders
JOIN subscriptions
	ON orders.subscription_id = subscriptions.subscription_id;

SELECT *
FROM orders
JOIN subscriptions
	ON orders.subscription_id = subscriptions.subscription_id
WHERE subscriptions.description=  'Fashion Magazine';

// Use COUNT(*) to count all rows of a table.
SELECT COUNT(*)
FROM newspaper;

SELECT COUNT(*)
FROM online;

// Join newspaper and online on id (the unique ID of the subscriber). How many rows are in this table?
SELECT COUNT(*)
FROM newspaper
JOIN online
	ON newspaper.id;

// LEFT JOIN
// What if we want to combine two tables and keep some of the un-matched rows? SQL lets us do this through a command called LEFT JOIN. A left join will keep all rows from the first table, regardless of whether there is a matching row in the second table.
SELECT *
FROM table1
LEFT JOIN table2
  ON table1.c2 = table2.c2 ;

SELECT *
FROM newspaper
LEFT JOIN online
  ON newspaper.id = online.id 
WHERE online.id IS NULL;

// Si on veut tout combiner (voir toutes les combinaisons possibles entre 2 colonnes)
SELECT shirts.shirt_color,
       pants.pant_color
FROM shirts
CROSS JOIN pants;

SELECT COUNT(*)
FROM newspaper
WHERE start_month < 3
	AND end_month > 3;
  
SELECT *
FROM newspaper
CROSS JOIN months;

SELECT *
FROM newspaper
CROSS JOIN months
WHERE start_month < month 
	AND end_month > month ;

SELECT month,
  COUNT(*) as subscribers
FROM newspaper
CROSS JOIN months
WHERE start_month < month
  AND end_month > month
GROUP BY month;

// Sometimes we want to stack one dataset on top of the other.
// UNION allows us to do that.
// Tables must have the same # of columns.
// The columns must have the same data types in the same order as the first table.
SELECT *
 FROM table1
 UNION
 SELECT *
 FROM table2;

 // Let's return to our magazine order example. Our marketing department might want to know a bit more about our customers. For instance, they might want to know how many magazines each customer subscribes to. We can easily calculate this using our orders table:

 SELECT customer_id,
       COUNT(subscription_id) as subscriptions
FROM orders
GROUP BY customer_id;

// This query is good, but a customer_id isn't terribly useful for our marketing department, they probably want to know the customer's name.

// We want to be able to join the results of this query with our customers table, which will tell us the name of each customer. We can do this by using a WITH clause.

WITH previous_results AS (
    SELECT ...
)
SELECT *
FROM previous_results
JOIN other_table
  ON ... = ...;

// Exercice
WITH previous_query AS (
  SELECT customer_id,
         COUNT(subscription_id) as subscriptions
  FROM orders
  GROUP BY customer_id
) 
SELECT customers.customer_name, previous_query.subscriptions
FROM previous_query
JOIN customers
ON previous_query.customer_id = customers.customer_id;


// In this lesson, we learned about relationships between tables in relational databases and how to query information from multiple tables using SQL.

// Let's summarize what we've learned so far:

//     JOIN will combine rows from different tables if the join condition is true.

//     LEFT JOIN will return every row in the left table, and if the join condition is not met, NULL values are used to fill in the columns from the right table.

//     Primary key is a column that serves a unique identifier for the rows in the table.

//     Foreign key is a column that contains the primary key to another table.

//     CROSS JOIN lets us combine all rows of one table with all rows of another table

//     UNION stacks one dataset on top of another.

//     WITH allows us to define a bunch of temporary tables that can be used in the final query.

// Exercice
SELECT * FROM trips;
SELECT * FROM riders;
SELECT * FROM cars;

// Try out a simple cross join between riders and cars.
// Is the result useful?
SELECT *
FROM riders
CROSS JOIN cars;

// Suppose we want to create a Trip Log with the trips and its users.
SELECT 
   riders.username,
   trips.pickup
FROM riders 
LEFT JOIN trips  
  ON trips.rider_id = riders.id;

//Suppose we want to create a link between the trips and the cars used during those trips.
// Find the columns to join on and combine the trips and cars table using an INNER JOIN.  
SELECT 
   trips.pickup,
   cars.model
FROM trips 
JOIN cars  
  ON trips.car_id = cars.id;

// The new riders data are in! There are three new users this month.
// Stack the riders table on top of the new table named riders2
SELECT *
 FROM riders
 UNION
 SELECT *
 FROM riders2;
 
//What is the average cost for a trip?
SELECT AVG(cost)
 FROM trips;

// REBU is looking to do an email campaign for all the irregular users.
// Find all the riders who have used REBU less than 500 times!
 WITH previous_query AS (
   SELECT *
     FROM riders
     UNION
     SELECT *
     FROM riders2
) 
SELECT *
FROM previous_query
WHERE previous_query.total_trips < 500;

//Calculate the number of cars that are active.
SELECT COUNT(*)
FROM cars
WHERE status = 'active';

// It's safety recall time for cars that have been on the road for a while.
// Write a query that finds the two cars that have the highest trips_completed.
SELECT *
FROM cars
ORDER BY trips_completed DESC 
LIMIT 2;



