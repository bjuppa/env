# Consumer for .env files in PHP
You want to use [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) but also need an `env()` helper function?
This is the package you're looking for.

## Install

Via Composer

``` bash
$ composer require fewagency/env
```

## Usage

``` php
// Require the Composer autoloader - if not already done by your framework
require_once __DIR__.'/../vendor/autoload.php';

// Load the .env file and make the env() function global
Fewagency/Env::load(__DIR__.'/../');

// Then use the env() function to pull out environment variables
$db_user = env('DB_USER', 'default-user');
```

## Testing

``` bash
$ composer test
```

## Inspiration
We came across this package that did almost what we wanted to but not quite:
https://github.com/oscarotero/env

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
