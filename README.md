# Laravel OpenSSL

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jason6809/laravel-openssl.svg?style=flat-square)](https://packagist.org/packages/jason6809/laravel-openssl)
[![Total Downloads](https://img.shields.io/packagist/dt/jason6809/laravel-openssl.svg?style=flat-square)](https://packagist.org/packages/jason6809/laravel-openssl)
![GitHub Actions](https://github.com/jason6809/laravel-openssl/actions/workflows/main.yml/badge.svg)

A Laravel package to generate OpenSSL with Subject Alternative Names (SAN) painlessly.

## Installation

You can install the package via composer:

```bash
composer require jason6809/laravel-openssl
```

## Usage

```php
php artisan openssl:generate
```
Follow the instruction by providing **Common Name** and **Subject Alternative Names (SAN)** you want.

Boom! There is it! You will see your `<common_name>.crt` and `<common_name>.key` files at the Laravel project root. 

### Testing

```bash
./vendor/bin/phpunit
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jason6809@gmail.com instead of using the issue tracker.

## Credits

-   [Jason Tam](https://github.com/jason6809)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
