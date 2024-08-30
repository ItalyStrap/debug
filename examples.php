<?php

declare(strict_types=1);

/**
 * Print all listeners for a specific WordPress event (hook).
 */

require_once __DIR__ . '/vendor/autoload.php';

$eventsFinder = new ItalyStrap\Debug\ListenerFinderFactory();
// This will print all listeners for the 'init' event in an HTML Table
echo $eventsFinder->make()->find('init');

// Or you can just use this helper function to use Kint
\listenersForEvent('init');