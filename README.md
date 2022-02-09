<img src="https://github.com/kayschima/sports-hall-management-calendar/raw/master/public/images/sportshallmanagementcalendar.png" width="100" height="100">

# Sports Hall Management Calendar
([Alternatively, click here for the German documentation](https://github.com/kayschima/sports-hall-management-calendar/blob/master/README_DE.md))

## About Sports Hall Management Calendar

The Sports Hall Management Calendar was built in 2020 to give sports clubs the opportunity to plan training times under difficult conditions even in times of Covid-19.

Trainers can set training dates in the portal and specify a certain number of training participants.
Registered athletes can reserve one of the vacancies for a training session.

## Documentation

### Server Requirements
- PHP >= 8.0.2
- Laravel >= 9
- MySql >= 8.0

- optional:
    - git (also good for keeping the software up to date )
    - composer
---
### Installation
#### Setup the software:
Get the Sources:
Go to your terminal and type:
```shell
git clone https://github.com/kayschima/sports-hall-management-calendar.git
```
or unzip the downloaded ZIP-file at the GitHub page:
https://github.com/kayschima/sports-hall-management-calendar/archive/master.zip

Now continue with the installation:
```shell
cd sports-hall-management-calendar
cp .env.example .env
composer install -o --no-dev
php artisan key_generate
php artisan storage:link
```
(Do not use the `--no-dev` option if you want to use the package in development mode.)

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
---
#### Generate a admin user
Execute the command `php artisan shmc:addadmin <name> <email> <password>`, e.g.
```shell
php artisan shmc:addadmin "The Administrator" admin@admin-world.de ThePassword
```
---
#### Delete user profile photos that are no longer needed
If you want to clear up user profile photos that are no longer needed, just run the command
```shell
php artisan shmc:removeunusedphotos
```

---
#### Delete past training times
If you want to clear up training times photos from the past, just run the command
```shell
php artisan shmc:removepasttrainings
```

---
You can execute all commands at regular intervals via the administration menu, manually via the console or via a cron job.

---

## Security Vulnerabilities

If you discover a security vulnerability within Sports Hall Management Calendar, please send an e-mail to Kay Markschies via [kayschima@web.de](mailto:kayschima@web.de). All security vulnerabilities will be promptly addressed.

## License

The Sports Hall Management Calendar is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
