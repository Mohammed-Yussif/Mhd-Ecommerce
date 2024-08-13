E-commerce
Introduction
E-commerce is solution based on Laravel 11, featuring multi-language and multi-currency support.
The system uses Composer to achieve a modular architecture, making it easy to extend and customize.
Additionally, e-commerce supports plugin and theme development.
User-friendly, intuitive interface, quick to get started, responsive design.

 High Performance & Security

E-commerce is built on the Laravel 11 technology stack, ensuring high-performance operation.
It also provides multi-layer security measures to ensure transaction data is safe and secure.


Demo Credentials
Admin:
Email: admin@gmail.com
Password: 123456
Email: mohammed@gmail.com
Password: 123456
User:
Email: md@gmail.com
Password: 123456

Getting Started
To get started with the project, follow these steps:

Clone the repository.
Install dependencies using composer install.
Compile Front-End Resources ​
Execute the following command to compile the front-end CSS and JavaScript files:npm install && npm run prod
Set Up the Upload Resources Directory ​
Run the following command to create and set up the directory for uploaded resources:php artisan storage:link
Configure the database settings in the .env file.
Set the Application Key ​
Before generating the APP_KEY, make sure you have the correct read and write permissions for the .env file.
Then, run the following command:php artisan key:generate
Database Migration and Data Seeding ​
Finally, execute the following commands to create the database structure and import the basic data:php artisan migrate && php artisan db:seed
Start the development server with php artisan serve.



