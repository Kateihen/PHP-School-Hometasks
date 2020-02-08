# Style Conference
A ***test*** web site featuring Style Conference that takes place in Chicago, Il.

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
10. Run tests:
```
vendor/bin/phpunit
```

## Features
 - Public facing pages:
   - home page;
   - view all speakers;
   - view the venue;
   - view the schedule;
   - register;
   - admin login page;
 - Admin panel:
   - list of all registered visitors;
   - list of registered managers;
   - registration of a new manager page.
 - Features available for all visitors:
   - register to the conference (an queued email is sent after registrtation);
 - Features available for managers:
   - view all visitors that were registered;
   - view all managers that were registered;
   - register a new manager.
   
## Acknowledgements
The front end part of the web site was inspired by a wonderful course by [Shay Howe](https://learn.shayhowe.com/html-css/).

## Attention!
This web site is just a practice aimed to improve my skills. If you have any comments or corrections, just let me know, I'll appreciate it very much!
