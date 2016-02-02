# Alt Three Badger

A badge generator for Laravel 5.

[![StyleCI](https://styleci.io/repos/50913959/shield)](https://styleci.io/repos/50913959)

```php
// Generate a badge using the Facade
Badger::generate('license', 'mit', 'blue', 'flat-square');
```

## Installation

Either [PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.6+ are required.

To get the latest version of Alt Three Badger, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require alt-three/badger
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "alt-three/badger": "^1.0"
    }
}
```

Once Alt Three Badger is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `'AltThree\Badger\BadgerServiceProvider'`

You can register the Badger facade in the `aliases` key of your `config/app.php` file if you like.

* `'Badger' => 'AltThree\Badger\Facades\Badger'`

## Security

If you discover a security vulnerability within this package, please e-mail us at support@alt-three.com. All security vulnerabilities will be promptly addressed.

## License

Alt Three Badger is licensed under [The MIT License (MIT)](LICENSE). Based on the work done at [badges/poser](https://github.com/badges/poser).
