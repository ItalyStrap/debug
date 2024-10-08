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

if (! function_exists('listenersForEvent')) {
    /**
     * @param string $hook
     */
    function listenersForEvent(string $hook): void
    {
        global $wp_filter;

        if (empty($wp_filter[$hook])) {
            return;
        }

        \d($wp_filter[$hook]);
    }
}
