<?php

declare(strict_types=1);

namespace ItalyStrap\Tests;

class WPTestCase extends \Codeception\TestCase\WPTestCase
{
    public function setUp(): void
    {
        // before
        parent::setUp();

        // your set-up methods here
    }

    public function tearDown(): void
    {
        // your tear down methods here

        // then
        parent::tearDown();
    }
}
