# Sails: A Boat Sales Platform

Just a simple interface to generate invoices for boat sales.

## Installation Instructions

From the command line run the following steps:
- git clone https://github.com/GlennKimbleJr/sails.git
- cd sails
- cp .env.example .env
- composer install
- php artisan key:generate

Create both a mysql database for the app and a mysql database for testing.  I suggest `sail` and `sail_testing.`  Update your .env with DB_DATABASE, DB_USERNAME, DB_PASSWORD, TEST_DB_DATABASE, TEST_DB_USERNAME, and TEST_DB_PASSWORD.

From the command line run the following:
- php artisan migrate --seed

## Seeded Data
Out of the box I've provided you with 11 boats, 1 customer, and 1 user.

## Login
You can use the following credentials to login to the app:
Email: user@example.org
Password: secret.

## How to use.
- From the home screen, click the "view" button under the inventory section.  
- Select a boat you'd like to purcahse and click the blue "view" button to view more information.
- Select the green "purchase" button.
- If desired, change the sale price to something other then the default listing price.  Select the customer you're creating the order for. Click the green "generate invoice" button.
- You will be redirected to the newly created sale page, with the sale having a status of "quoted".
- Click the grey "View Invoice" button, and print out the invoice for the customer to sign.

## Todo.
I still need to complete the following:
- Add in the ability to create new and view existing customers.
- Add in the ability to complete the purchase of a boat (changing the status to pending).
- Add in the ability to mark a sale as complete (delivered).
- Update the purchase page to allow searching for customers and/or pagination of customers.
- Update the sales index to have pagination / search functionality.
