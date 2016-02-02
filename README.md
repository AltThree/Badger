# Alt Three Badger

A badge generator for Laravel 5.

[![StyleCI](https://styleci.io/repos/50913959/shield)](https://styleci.io/repos/50913959)
[![Travis](http://img.shields.io/travis/AltThree/Badger.svg?style=flat-square)](https://travis-ci.org/AltThree/Badger.svg?branch=master)

```php
// Using the facade
Badger::generate('license', 'MIT', 'blue', 'flat-square')

// Dependency injection example
$badger->generate('author', 'Alt Three', 'brightgreen', 'plastic')
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

## Usage

The generate method takes four parameters:

```php
Badger::generate('license', 'MIT', 'blue', 'flat-square')
```

The first parameter is the subject, or what it is the badge is showing. In the example above this is the license. The second parameter is the value (the right hand of the badge). Next is the color of the badge. This can be one of the following preset colors _or_ a valid hex string.

- `brightgreen`
- `green`
- `yellow`
- `yellowgreen`
- `orange`
- `red`
- `blue`
- `grey`
- `lightgray`

And finally the fourth parameter is the badge type. This determines the style of the badge and can be one of the four values below.

- `flat-square` (default)
- `plastic-flat`, `flat`
- `plastic`
- `social` (without links)

## Security

If you discover a security vulnerability within this package, please e-mail us at support@alt-three.com. All security vulnerabilities will be promptly addressed.

## License

Alt Three Badger is licensed under [The MIT License (MIT)](LICENSE). Based on the work done at [badges/poser](https://github.com/badges/poser).
