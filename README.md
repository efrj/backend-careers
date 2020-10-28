Development of the API for jobs in Laravel.


# API Job Oportunities

## Requirements for development and production environments
* PHP - Minimum version 7.3.
* MySQL or Maria DB - from version 5.6 or SQLite
* Apache or Nginx server or PHP's built in server
* All Artisan commands must be executed in the application's root directory

## Procedures for running the API
* Create a virtual host in Apache, NGINX or execute the project with the built in server of PHP.

* Run the command ** composer install ** to download the project's dependencies

* Create the .env file from the .env.example sample file and enter the database configuration parameters

* Generate a new key for the application (APP_KEY) with the command ** php artisan key: generate **

### Creation of database tables
##### Use the command
** php artisan migrate **

### Populating the database
##### Use the commands in sequence to run the Seeds
** php artisan db: seed

### Running the tests
** composer test

### Testing the Endpoints
To test the endpoints import the file Talentify backend-careers API.postman_collection.json which is at the root of the project.

Do the informant email and password authentication. Copy the token and enter the tokent in the other enpoints using the Authentication parameter with the value Bearer {token} to access the content of the endpoint.