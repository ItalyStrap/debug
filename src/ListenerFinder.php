<?php

declare(strict_types=1);

namespace ItalyStrap\Debug;

class ListenerFinder
{
    private array $hooks;

    public function __construct(array $wpFilter)
    {
        $this->hooks = $wpFilter;
    }

    /**
     * Get a list of hooked functions/methods.
     *
     * @param string $tag The name of the hook.
     * @return string A list of hooked functions/methods.
     */
    public function find(string $tag = ''): string
    {
        $hooks = $this->getHooks($tag);
        if ($hooks === []) {
            return '';
        }

        return $this->formatHooks($hooks);
    }

    private function getHooks(string $tag): array
    {
        if ($tag !== '') {
            if (!isset($this->hooks[$tag])) {
                trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
                return [];
            }

            $hook = $this->hooks[$tag]->callbacks;
            if (!is_array($hook)) {
                trigger_error("No valid callbacks found for '$tag' hook", E_USER_WARNING);
                return [];
            }

            return [$tag => $hook];
        }

        $hooks = $this->hooks;
        ksort($hooks);

        return $hooks;
    }

    private function formatHooks(array $hooks): string
    {
        $output = "<style>
.wp-list-event-finder {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

.wp-list-event-finder th, .wp-list-event-finder td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.wp-list-event-finder th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.wp-list-event-finder tr:nth-child(even) {
    background-color: #f9f9f9;
}

.wp-list-event-finder tr:hover {
    background-color: #f1f1f1;
}
</style>";

        $output .= '<table class="wp-list-event-finder">';
        $output .= '<thead><tr><th>Event</th><th>Priority</th><th>Function</th><th>Type</th></tr></thead>';
        $output .= '<tbody>';

        foreach ($hooks as $tag => $priorities) {
            if (!is_array($priorities)) {
                continue;
            }

            ksort($priorities);

            foreach ($priorities as $priority => $functions) {
                foreach ($functions as $name => $properties) {
                    $output .= '<tr>';
                    $output .= "<td>$tag</td>";
                    $output .= "<td>$priority</td>";
                    $output .= "<td>$name</td>";
                    $output .= "<td>" . $this->formatFunction($properties['function']) . "</td>";
                    $output .= '</tr>';
                }
            }
        }

        $output .= '</tbody>';
        $output .= '</table>';

        return $output;
    }

    private function formatFunction($function): string
    {
        if (is_array($function)) {
            return is_object($function[0])
                ? get_class($function[0]) . " (Object)"
                : "Function";
        }

        if ($function instanceof \Closure) {
            $reflection = new \ReflectionFunction($function);
            return get_class($reflection->getClosureThis()) . " (Closure)";
        }

        return "Function";
    }
}
