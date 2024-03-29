<?php

/**
 * Set up the Whoops container.
 *
 * From KnowTheCode\UpDevTools
 * @link "https://github.com/KnowTheCode/UpDevTools"
 * @author Tonya Mork
 */

declare(strict_types=1);

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

(function () {
    if (!is_debug()) {
        return;
    }

    $whoops = new Run();

    $error_page = new PrettyPageHandler();
    $error_page->setEditor('sublime');

    $whoops->pushHandler($error_page);
    $whoops->register();
    /**
     * If is not debug active disable Kint
     * https://kint-php.github.io/kint/
     */
    Kint\Kint::$enabled_mode = is_debug();
})();
