<?php

declare(strict_types=1);

namespace ItalyStrap\Debug;

class Debug
{
    /**
     * Is debug active
     *
     * @return bool Return true if WP_DEBUG is active
     */
    public function isDebug(): bool
    {
        $is_debug = \defined('WP_DEBUG') && WP_DEBUG;

        if (\function_exists('apply_filters')) {
            return \apply_filters('italystrap.debug', $is_debug);
        }

        return $is_debug;
    }

    /**
     * Is Beta version
     *
     * @return bool Return true if SCRIPT_DEBUG is active
     */
    public function isScriptDebug(): bool
    {
        return \defined('SCRIPT_DEBUG') && SCRIPT_DEBUG;
    }

    /**
     * Write to log file
     *
     * @param array $logs
     */
    public function log(...$logs): void
    {

        if (!$this->isDebug()) {
            return;
        }

        $separator = '----------------------------------------';

        \error_log(\print_r($separator . 'DEBUG START' . $separator, true));

        /**
         * __FILE__
         * __LINE__
         * https://stackoverflow.com/questions/1252529/get-code-line-and-file-thats-executing-the-current-function-in-php
         */
        $bt = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        if (\is_array($bt[1])) {
            \error_log(\print_r('File: ' . $bt[1]['file'], true));
            \error_log(\print_r('Line: ' . $bt[1]['line'], true));
        }

        foreach ($logs as $log) {
            if (\is_bool($log)) {
                $log = \json_encode($log);
            }

            \error_log(\print_r($log, true));
//          \error_log(\var_export($log, true));
        }

        \error_log(\print_r($separator . 'DEBUG END' . $separator, true));
    }

    public function wLog(...$logs): void
    {
        if (!\function_exists('do_action')) {
            $this->log(...$logs);
            return;
        }

        $separator = '----------------------------------------';

        \do_action('wonolog.log', \print_r($separator . 'DEBUG START' . $separator, true));

        foreach ($logs as $log) {
            if (\is_bool($log)) {
                $log = \json_encode($log);
            }

            \do_action(
                'wonolog.log',
                [
                    'message' => \print_r($log, true),
                    'channel' => 'DEBUG',
                    'level'   => 100,
                    'context' => [],
                 ]
            );
        }

        \do_action('wonolog.log', \print_r($separator . 'DEBUG END' . $separator, true));
    }
}
