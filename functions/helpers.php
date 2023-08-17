<?php

declare(strict_types=1);

use ItalyStrap\Debug\Debug;

if (! function_exists('is_debug')) {
    /**
     * Is Beta version
     *
     * @return bool Return true if ITALYSTRAP_BETA version is declared
     */
    function is_debug(): bool
    {
        return (new Debug())->isDebug();
    }
}

if (! function_exists('is_script_debug')) {
    /**
     * Is Beta version
     *
     * @return bool Return true if ITALYSTRAP_BETA version is declared
     */
    function is_script_debug(): bool
    {
        return (new Debug())->isScriptDebug();
    }
}

if (! function_exists('is_italystrap_debug')) {
    /**
     * Print debug output on debug.log file
     *
     * @param mixed $log The input value.
     * @return
     */
    function is_italystrap_debug(): bool
    {
        return (new Debug())->isItalyStrapDebug();
    }
}

if (! function_exists('debug')) {
    /**
     * Print debug output on debug.log file
     *
     * @param mixed ...$logs
     */
    function debug(...$logs): void
    {
        (new Debug())->log(...$logs);
    }
}

if (! function_exists('dlog')) {
    /**
     * Print debug output on debug.log file
     *
     * @param mixed ...$logs
     */
    function dlog(...$logs): void
    {
        (new Debug())->log(...$logs);
    }
}

if (! function_exists('wlog')) {
    function wlog(...$logs): void
    {
        (new Debug())->wLog(...$logs);
    }
}

if (! function_exists('lazyd') && \function_exists('add_action')) {
    /**
     * Print debug output on debug.log file
     *
     * @param mixed ...$args
     */
    function lazyd(...$args): void
    {
        \add_action('shutdown', static function () use ($args) {
            \d(...$args);
        });
    }
}
