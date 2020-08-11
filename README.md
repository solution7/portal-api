# Portal Api

The public web application (Portal) will query the locked down API web application (PortalAPI) to allow the user to log in and change their email address on file

[![N|Solid](https://laravel.com/img/notification-logo.png)](https://laravel.com/)

## Portal requires [Laravel](https://laravel.com/docs/7.x) v7x to run.
* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

Install the dependencies and devDependencies and start the server.

### Import and save files from GitHub
```sh
$ cd apiportal
$ composer install
$ php artisan passport:install
```

## .env requirements

 Copy .env.local file to .env

```ssh
    cp .env.local  .env
```

## Update .env file

#### Database connection

```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database name
    DB_USERNAME=database username
    DB_PASSWORD=database user password
```

#### Update App URL's
```sh
    APP_URL=Api app url
    #APP_URL=http://portalapi.nextvacay.com
    WEB_APP_URL=Web app url
    #WEB_APP_URL=http://account.nextvacay.com
```
#### Update SMTP details for mailing
```sh
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=a86364acb65e7e
    MAIL_PASSWORD=69016db8abe6bb
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=test@mail.com
    MAIL_FROM_NAME="${APP_NAME}"
```
#### Login link expiration time in `minutes`
Default time 60 minutes
```sh
    LOGIN_EXPIRATION_TIME=60
```

## Generate Api Kay
```sh
    php artisan key:generate
```

## Import database
* Download file and import into database
    ##### File path `database/backup/portal.zip`
### Or
* Using command
```sh
    php artisan migrate
    php artisan db:seed
```

## Test users details
- Portal User
    portal-user@gmail.com / 12345678
- Portal User 2
   portal-user2@gmail.com / 12345678
