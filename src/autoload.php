<?php
/**
 * Load internal files
 *
 * @var array $file
 */
(function(array $files){
    foreach ($files as $file) {
        require_once($file);
    }
})([
    'debug.php',
    'compat.php',
]);
