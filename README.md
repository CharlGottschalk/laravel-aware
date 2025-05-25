# Aware tracks changes to Eloquent models.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/charlgottschalk/laravel-aware.svg?style=flat-square)](https://packagist.org/packages/charlgottschalk/laravel-aware)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/charlgottschalk/laravel-aware/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/CharlGottschalk/laravel-aware/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/charlgottschalk/laravel-aware/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/CharlGottschalk/laravel-aware/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/charlgottschalk/laravel-aware.svg?style=flat-square)](https://packagist.org/packages/charlgottschalk/laravel-aware)

## Introduction

Aware is a simple tool that tracks changes to Eloquent models and provides a way to access the changes made to them.
<br/><br/>
It uses Laravel's built-in event system to listen for model events and records the changes made to the model's attributes by creating trackers that are dispatched with jobs.

## Installation

You can install the package via composer:

```bash
composer require charlgottschalk/laravel-aware
```

Run the installation command:

```bash
php artisan aware:install
```

Run the migrations to create the necessary database tables:


```bash
php artisan migrate
```

You're ready to go and tracking will happen automatically.

## Documentation

For more in-depth information and setup, please read the [documentation]().

## Credits

- [Charl Gottschalk](https://github.com/CharlGottschalk)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
