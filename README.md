#MakeACv

To run the app :

Prequisites - PHP, Composer , MongoDB

1. Open command prompt and run the command `composer install`
2. Navigate to the public/ directory
3. Open command prompt and run the command, `php -S localhost:8080`	
4. Open a web browser and type in the address localhost:8080/

###MongoDB structure

1. Database - swproject

 1. Collection - users
  1. user_id (_id)
  2. username
  3. password
  
 2. Collection - work
  1. user_id
  2. organisation
  3. position
  4. duration
  5. details
  6. achievements
 
 3. Collection - personal
  1. user_id
  2. name
  3. phone
  4. email
  5. DOB
  6. address
  7. achievements
  
 4. Collection - education
  1. user_id
  2. degree
  3. institution
  4. percentage
  5. end_year
  6. achievements