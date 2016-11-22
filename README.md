# env

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require fewagency/env
```

## Usage

``` php
Fewagency/Env::load(__DIR__.'/../');
$db_user = env('DB_USER', 'default-user');
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
