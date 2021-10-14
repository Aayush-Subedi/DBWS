#List of items based on categories - in order of ratings

SELECT category, AVG(average_rating)
FROM item 
GROUP BY category 
ORDER BY AVG(average_rating) DESC;

#Rental history of a rentte

SELECT user.rentee_id, CONCAT(Users.fname, ' ', Users.lname) AS `Rentee Name`, ritem.item_id, Item.name AS `Item name`
FROM Rentee AS `user`
INNER JOIN Rented_Item AS `ritem`
ON user.rentee_id = ritem.rentee_id
INNER JOIN Item
ON Item.item_id = ritem.item_id
INNER JOIN Users
ON Users.user_id = user.rentee_id;

#Group by average avg() rating for an item having < 3

SELECT item.item_id, item.name, AVG(review.rating)		 
FROM Review_and_rating AS `review`
JOIN Item AS `item`
ON  review.item_id = item.item_id
GROUP BY review.item_id
HAVING AVG(review.rating) > 2;

#Owners of items rented out between certain dates 

SELECT Users.user_id, Users.fname, Rented_item.rent_id, Rented_item.rentee_id, Rented_item.duration_start, Rented_item.duration_end
FROM Rented_item
INNER JOIN Users
ON Users.user_id = Rented_item.rentee_id
WHERE Rented_item.duration_start BETWEEN '2000-01-01' AND '2020-01-01';

#Items ordered by rating

SELECT *
FROM Item
ORDER BY average_rating DESC;

#Items with price less than a certain value ordered by price

SELECT *
FROM Item
WHERE price < 10
ORDER BY price ASC;

#Group by average rating for a renter 

SELECT *
FROM Renter
GROUP BY average_rate;

#All Earnings of renters

SELECT r.renter_id, CONCAT(u.fname, ' ', u.lname) as 'Renter name', SUM(DATEDIFF(ri.duration_start, ri.duration_end) * i.price) as 'Total earning'
FROM Renter as r
INNER JOIN Item as i
ON r.renter_id = i.renter_id
INNER JOIN Rented_item as ri
ON i.item_id = ri.item_id
INNER JOIN Users as u
ON r.renter_id = u.user_id
GROUP BY r.renter_id
ORDER BY r.renter_id;

#All reviews and ratings given in a time period

SELECT *
FROM Review_and_rating
WHERE timestamp >= StartDate AND timestamp <= EndDate;

#Similar items based on categories and price

SELECT *
FROM Item
WHERE category = Item.category
ORDER BY price DESC;

#Rented items from a category listed by the earliest day they become available

SELECT Item.item_id, Item.name, Rented_item.duration_end 
from Rented_item 
inner join Item 
on Rented_item.item_id = Item.item_id 
order by Rented_item.duration_end asc;

#Users with overdue items

SELECT Rented_item.rentee_id, Users.fname, Users.lname, Users.email
FROM Users
INNER JOIN Rented_item 
ON Users.user_id=Rented_item.Rentee_id
WHERE duration_end  > CURRENT_TIMESTAMP;

