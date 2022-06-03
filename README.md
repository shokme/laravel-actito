## Installation
- PHP8.0+
- Laravel 9.x(not tested on laravel 8.x)

You can install the package via composer:
```sh
composer require shokme/laravel-actito
```
You must publish the configuration file
```sh
php artisan vendor:publish --provider="Shokme\Actito\ActitoServiceProvider" --tag="config"
```

## Example
```php
Actito::profile()->find('emailAddress=john@doe.com');

Profile::all();
Table::find('posts', '154');

$actito = new Actito();
$actito->table->create(...);
```
All available methods are listed in each Facade, you can retrieve the Actito documentation link for each method 
inside `src/Endpoints/*`.

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
