# ItalyStrap Debug

[![Latest Stable Version](https://img.shields.io/packagist/v/italystrap/debug.svg)](https://packagist.org/packages/italystrap/debug)
[![Total Downloads](https://img.shields.io/packagist/dt/italystrap/debug.svg)](https://packagist.org/packages/italystrap/debug)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/italystrap/debug.svg)](https://packagist.org/packages/italystrap/debug)
[![License](https://img.shields.io/packagist/l/italystrap/debug.svg)](https://packagist.org/packages/italystrap/debug)
![PHP from Packagist](https://img.shields.io/packagist/php-v/italystrap/debug)

Classes and functions for handling debugging

## Table Of Contents

* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Advanced Usage](#advanced-usage)
* [Contributing](#contributing)
* [License](#license)

## Installation

The best way to use this package is through Composer:

```CMD
composer require italystrap/debug
```

## Basic Usage

Simply add the below code into your wp-config.php file

```php
<?php
define( 'WP_DEBUG', true ); // Load helpers for debugging
define( 'WP_DEBUG_LOG', true ); // Write to debug.log file
define( 'WP_DEBUG_DISPLAY', false ); // Optional
@ini_set( 'display_errors', 0 ); // Optional
define( 'SCRIPT_DEBUG', true );
define( 'SAVEQUERIES', true );

define( 'ITALYSTRAP_DEBUG', true ); // Load helpers for debugging
```

Now you can use:

```php
<?php
d();
debug( $log );
```

For handling php errors it will be use Whoops that will display
a screen with the full stack of information about the error.

## Advanced Usage

> TODO

## Contributing

All feedback / bug reports / pull requests are welcome.

## License

Copyright (c) 2019 Enea Overclokk, ItalyStrap

This code is licensed under the [MIT](LICENSE).

## Credits

> TODO