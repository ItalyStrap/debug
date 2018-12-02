<?php

use ItalyStrap\Debug\Debug;

class DebugTest extends \Codeception\TestCase\WPTestCase
{

    public function setUp()
    {
        // before
        parent::setUp();

        // your set up methods here
    }

    public function tearDown()
    {
        // your tear down methods here

        // then
        parent::tearDown();
    }

    /**
     * @test
     * it should be instantiatable
     */
    public function it_should_be_instantiatable()
    {
        $sut = new Debug();
        $this->assertInstanceOf( '\ItalyStrap\Debug\Debug', $sut );
    }

    /**
     * @test it_should_be_return_true
     */
    public function it_should_be_return_true()
    {
        if ( ! defined( 'WP_DEBUG' ) ) {
            define( 'WP_DEBUG', true );
        }

        $this->assertTrue( Debug::is_debug() );
    }

}