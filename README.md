# ItalyStrap Debug

[![Build Status](https://travis-ci.org/ItalyStrap/debug.svg?branch=master)](https://travis-ci.org/ItalyStrap/debug)

Classes and functions for handling debugging

## How tu use it

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

## In case of PHP arror

For handling php errors it will be use Whoops that will display
a screen with the full stack of information about the error.