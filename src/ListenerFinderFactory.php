<?php

declare(strict_types=1);

namespace ItalyStrap\Debug;

class ListenerFinderFactory
{
    public function make(): ListenerFinder
    {
        global $wp_filter;
        return new ListenerFinder($wp_filter);
    }
}