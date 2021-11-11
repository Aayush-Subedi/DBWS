Implemented for this assignment is authentication when performing database operations.
Inside the maintanance pages and the query pages there are now fields for entering database 
access username and password. The corresponding page actions won't perform unless those are given.
Once those are given and the main action of the page is executed, the username and password are used 
for database access. If a user without the required privileges is used, the actions will fail.    


The website can be found hosted at http://clabsql.clamv.jacobs-university.de/~mhaile/index.php