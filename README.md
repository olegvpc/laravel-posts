
Start new project on Mac
Запускать нужно из корня
olegvpc@192 ~ % curl "https://laravel.build/example-app" | bash

olegvpc@192 ~ % cd laravel-app 

olegvpc@192 ~ % ./vendor/bin/sail up

CREATING PROJECT - DB is:  MySQL
```shell
DB_USERNAME=sail
DB_PASSWORD=password
```


### 2- Run MIGRATION
```shell
olegvpc@192 ~ % ./vendor/bin/sail artisan migrate 
```


### For short record use ALIAS
```
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```


### To start all of the Docker containers in the background, you may start Sail in "detached" mode:
```shell
sail up -d
```

To stop all of the containers, you may simply press Control + C to stop the container's execution. Or, if the containers are running in the background, you may use the stop command:

```shell
sail stop
```



### To share your site, you may use the share command. After executing this command, you will be issued a random laravel-sail.site URL that you may use to access your application:
```shell
sail share
```

### You may use the shell command to connect to your application's container, allowing you to inspect its files and installed services as well execute arbitrary shell commands within the container:
```shell
sail shell
```

===== for install all dependencies ===============
sail@4e30e1632663:/var/www/html$  
```shell
composer install
OR
composer dump
```


   INFO  Discovering packages.  

  laravel/sail ................................................................................................................................ DONE
  laravel/sanctum ............................................................................................................................. DONE
  laravel/tinker .............................................................................................................................. DONE
  nesbot/carbon ............................................................................................................................... DONE
  nunomaduro/collision ........................................................................................................................ DONE
  nunomaduro/termwind ......................................................................................................................... DONE
  spatie/laravel-ignition ..................................................................................................................... DONE

80 packages you are using are looking for funding.
Use the `composer fund` command to find out more!

Работа со структурой проекта

php artisan make:command TestCommand

php artisan make:test Test  

Run all tests
php artisan test

php artisan key:generate

.env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:+exd+gbNS4ZUSYg8FVPdsqAWI8LAGg8m5+F3M45tu7Y=
APP_DEBUG=true
APP_URL=http://localhost

====================================================

sail@4e30e1632663:/var/www/html$ php artisan tinker  

> config('view.paths')  
[
    "/var/www/html/resources/views",
  ]

> config('app.name')
= "Laravel"

При изменении параметров в коде проекта в tinker будет старый код - для обновления нужно по новой загрузить tinker
========HELPERS========================

> app()->environment() === 'local'
= true

> app()->environment("local")
= true

> app()->getLocale()
= "en"

> app()->setLocale('ru')
= null

> app()->getLocale()
= "ru"

> app('cache')-> put('test','Hello')
= true

> app('cache')-> get('test')
= "Hello"

=============. Facades  - all facades : ===============
=======  Illuminate\Support\Facades\ ======

> Cache::get('test')
= "Hello"

Фасады и Хелперы работают однотипно - можно либо так либо так

use Illuminate\Support\Facades\Response;
 
Route::get('/users', function () {
    return Response::json([
        // ...
    ]);
});
 
app(‘response’)-> get('/users', function () {
    return response()->json([
        // ...
    ]);
});

============ ServiceProvider ==============
sail@4e30e1632663:/var/www/html$ php artisan make:provider TestServiceProvider

   INFO  Provider [app/Providers/TestServiceProvider.php] created successfully. 


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

