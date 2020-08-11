# Sports Hall Management Calendar

## About Sports Hall Management Calendar

The Sports Hall Management Calendar was built in 2020 to give sports clubs the opportunity to plan training times under difficult conditions even in times of Covid-19.

Trainers can set training dates in the portal and specify a certain number of training participants.
Registered athletes can reserve one of the vacancies for a training session.

## Documentation

### Installation
#### Setup the software:
```shell
git clone https://github.com/kayschima/sports-hall-management-calendar.git
cd sports-hall-management-calendar
cp .env.example .env
composer install -o --no-dev
php artisan key_generate
php artisan storage:link
```

#### Setup database and environment:
 - config your database parameters and credentials in the `.env` file
 - migrate the database
 ```shell
 php artisan migrate
 ```
 - set `APP_ENV=production` in the `.env` file
 - set `APP_DEBUG=false` in the `.env` file
 - set the `SMHC_`- values according to your own needs
 
 The Sports Hall Management Calendar supports the languages:
 - English (`APP_LOCALE=en`)
 - German/Deutsch (`APP_LOCALE=de`)

#### Generate a admin user
Execute the command `php artisan shmc:addadmin <name> <email> <password>`, e.g.
```shell
php artisan shmc:addadmin "The Administrator" admin@admin-world.de ThePassword
```

### Delete user profile photos that are no longer needed
If you want to clear up user profile photos that are no longer needed, just run the command
```shell
php artisan shmc:removeallusedphotos
```
You can run the command manually via the console or via a cron job at regular intervals

## Security Vulnerabilities

If you discover a security vulnerability within Sports Hall Management Calendar, please send an e-mail to Kay Markschies via [kayschima@web.de](mailto:kayschima@web.de). All security vulnerabilities will be promptly addressed.

## License

The Sports Hall Management Calendar is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
