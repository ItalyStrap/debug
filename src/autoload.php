<?php

$files = [
	'debug.php',
	'compat.php',
];

foreach ( $files as $file ) {
    require_once( $file );
}
