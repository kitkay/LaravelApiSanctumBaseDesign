<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Tech Stack:
    - Laravel as API
    - Sanctum for Authentication
    - php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

[
    *echo "# SchoolMgmtApi" >> README.md
    *git init
    *git add README.md
    *git commit -m "first commit"
    *git branch -M main
    *git remote add origin git@github.com:kitkay/SchoolMgmtApi.git
    *git push -u origin main
]
## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Things Done

#### Created a Response Trait (for reuse to our controllers)
#### Installed Sanctum with AuthController
#### php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
#### php artisan make:request LoginUserRequest

#### php artisan make:request StoreUserRequest
#### php artisan make:factory TaskFactory
#### php artisan tinker
##### User::factory()->times(25)->create();
##### Task::factory()->times(250)->create();

#### php artisan make:resource TasksResource
##### - making resource is used to format collections into a json

#### php artisan make:request StoreTaskRequest

#### adding token expiration on sanctum.php file "expiration"
#### Edit Kernel.php from Console and add
#####  $schedule->command('sanctum:prune-expired --hours=24')->daily();
#### php artisan schedule:list
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
