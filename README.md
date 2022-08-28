# Chat App

## What is Chat App?

Chat App is a simple chat application built to demonstrate the usage of MVC architecture in building CRUD applications and websocket for real-time communication.

![image](https://user-images.githubusercontent.com/56353860/187077741-8035a14d-8b5a-47e2-ade9-bf65d137cf1f.png)
![image](https://user-images.githubusercontent.com/56353860/187077765-cf3bfbeb-b7eb-4536-8b0c-f17884268218.png)

## Database

For MySQL database, specify the following value in the `.env` file with your own database details.

- `database.default.hostname`
- `database.default.database`
- `database.default.username`
- `database.default.password`
- `database.default.DBDriver = MySQLi`
- `database.default.port`

One of the way to setup local database is using XAMPP.

## Installation

- Run `composer install` in the project directory.
- Run `php spark migrate --all`.
- Run `php spark shield:setup`.

## Running on Localhost

You may run the application locally by using the following command on the project directory:

`php spark serve`

It is also possible to host the application on XAMPP by placing the project folder inside the `htdocs` folder of XAMPP.

To allow real-time communication, a separate process handling websocket communication needs to be run. Run the following command inside the `public` folder of the project:

`php index.php`
