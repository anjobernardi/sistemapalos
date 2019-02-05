#### Table of contents
- [About](#about)
- [Installation Instructions](#installation-instructions)

#### About

Clone this repository to start using Laravel 5.6 with [AdminBSB](https://github.com/gurayyarar/AdminBSBMaterialDesign).

![screenshot-2018-6-30 welcome to bootstrap based admin template - material design](https://user-images.githubusercontent.com/4369018/42126879-7e40188c-7c54-11e8-8fe6-29e9088a2357.png)

It also contains the following things:

- [x] Basic Laravel Auth: ability to log in as administrator or user.
- [x] Use database seeds to create first user with email "admin@admin.com" and password "password".
- [x] Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
- [x] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
- [x] CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
- [x] Use database migrations to create those schemas above
- [x] Create views
- [x] Store companies logos in storage/app/public folder and make them accessible from public
- [x] Use basic Laravel resource controllers with default methods – index, create, store etc.
- [x] Use Laravel’s validation function, using Request classes
- [x] Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
- [x] Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register
- [x] Use Datatables.net library to show table – with our without server-side rendering
- [x] Use more complicated front-end theme like AdminLTE
- [x] Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)
- [x] Make the project multi-language (using resources/lang folder)
- [ ] Basic testing with PHPUnit

#### Installation Instructions

1. Run `git clone https://github.com/eleazarbr/laraveldaily-minicrm`
2. Create a MySQL database for the project
    * ```mysql -u root -p```,
    * ```create database laraveldaily;```
    * ```\q```
3. Run `composer update` from the projects root folder
4. From the projects root run `cp .env.example .env`
5. Configure your `.env` file
6. Run `composer update` from the projects root folder
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `php artisan make:auth`
10. From the projects root folder run `composer dump-autoload`
11. From the projects root folder run `php artisan db:seed`
12. Set up a virtual host or run `php artisan serve`

## License

This project is open-sourced software licensed under the MIT license.
