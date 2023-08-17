<?php

declare(strict_types=1);

namespace ItalyStrap\Tests\WPUnit;

use ItalyStrap\Debug\Debug;
use ItalyStrap\Tests\WPTestCase;

class DebugTest extends WPTestCase
{
    public function testItShouldReturnTrue()
    {
        if (!defined('WP_DEBUG')) {
            define('WP_DEBUG', true);
        }

        $this->assertTrue((new Debug())->is_debug());
    }
}
