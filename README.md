# Consumer for .env files in PHP
You want to use [`vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv) but also need an `env()` helper function?
This is the package you're looking for.

## Install
Via Composer

``` bash
$ composer require fewagency/env
```

## Usage
Add a `.env` file to the root of your project.
Read more about that [at `vlucas/phpdotenv`](https://github.com/vlucas/phpdotenv).

Require the Composer autoloader - if not already included by your framework

``` php
require_once __DIR__.'/../vendor/autoload.php';
```

Load the `.env` file and make the `env()` function global.
If `.env` is not in your project root directory, you can specify a path to the directory as a parameter to `init()`.

``` php
\Fewagency\Env\Env::init();
```

Then use the `env()` function to pull out environment variables with an (optional) default value.

``` php
$db_user = env('DB_USER', 'default_db_user');
```

## Inspiration
We came across this package that did almost what we wanted to but not quite:
https://github.com/oscarotero/env

## Development
Run `composer create-project` to create the test `.env` from `.env.example`.

### Run tests
``` bash
$ composer test
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
