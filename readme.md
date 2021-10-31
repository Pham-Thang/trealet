## Run project

- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders, if any. 
- Run `php artisan serve`

## Vanguard - Advanced PHP Login and User Management

- Website: https://vanguardapp.io
- Documentation: https://milos.support-hub.io
- Developed by [Milos Stojanovic](https://mstojanovic.net)