# CMS for Laravel - Media Library Module

Simple media library module for the CMS.

This module offers a simple configurable media library for managing uploaded images and documents that may be linked or referred to by your application.

To be used to with the [Laravel CMS Core](https://github.com/czim/laravel-cms-core).

Uses the [File Upload Module](https://github.com/czim/laravel-cms-upload-module) if it is loaded.

This package is compatible and tested with Laravel 5.3 and 5.4.


## Installation

Add the module class to your `cms-modules.php` configuration file:

``` php
    'modules' => [
        // ...
        \Czim\CmsMediaModule\Modules\MediaModule::class,
    ],
```

Add the service provider to your `cms-core.php` configuration file:

``` php
    'providers' => [
        // ...
        Czim\CmsMediaModule\Providers\CmsMediaModuleServiceProvider::class,
        // ...
    ],
```

To publish the config and migration:

``` bash
php artisan vendor:publish
```

Run the CMS migration:

```bash
php artisan cms:migrate
```


## To Do

[ ] Database design & migrations
[ ] Configurable folders
[ ] Permissions and permission configuration
[ ] API endpoints
[ ] shortcode logic for making links & including images
[ ] Automatic resizes

## Usage

Documenation will be added here

[ ] Configuration options
[ ] Store files in filesystem or stapler (S3)

### Security

As with any module, only authenticated CMS users can access its routes. 

Additionally a non-admin user must have the following permissions:

| Permission key             | Description       |
| -------------------------- | ----------------- |
| medialibrary.admin         | Administration rights for the library. |
| medialibrary.file.create   | Upload new files (in general). |
| medialibrary.file.delete   | Delete (your own) uploaded files.  |

Or simply set `medialibrary.*` for all of the above.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/czim/laravel-cms-media-module.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/czim/laravel-cms-media-module.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/czim/laravel-cms-media-module
[link-downloads]: https://packagist.org/packages/czim/laravel-cms-media-module
[link-author]: https://github.com/czim
[link-contributors]: ../../contributors
