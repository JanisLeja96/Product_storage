# Product storage application

This is a basic product storage management application with CRUD functionality.

Data can also be fetched using the API.

## Setting up

In order to set up this project:

- Clone this repository
- Set up your MySQL database and .env file.
- Install all required dependencies using ```composer install```, ```npm install``` and ```npm run dev```
- Run migrations with ```php artisan migrate```
- Finally start the project with ```php artisan serve```

In order to delete products, you must add an entry called ```CAN_DELETE``` to your .env file.

Example:
```CAN_DELETE="user1 user2"```

## API

This application includes an API for fetching data from the database.

The endpoints are:
- ```/api/products``` for fetching all products in the database
- ```/api/product/{id}``` for fetching information about a single product
