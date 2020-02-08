# Style Conference
A web site featuring Style Conference that takes place in Chicago, Il.

## Getting Started: Full Setup Instructions
1. Clone this repo and cd into the project folder.
2. Install composer dependencies.
3. Create a copy of **.env** file:
```
cp .env.example .env
```
4. Generate an app encryption key:
```
php artisan key:generate
```
5. Create an empty database for our application and add database information into the .env file to allow Laravel connect to the database.
6. Migrate the database:
```
php artisan migrate
```
7. Dump the database:
```
php artisan snapshot:load final-dump
```
8. Seed the database:
```
php artisan db:seed
```
9. Run the Laravel server:
```
php artisan serve
```
