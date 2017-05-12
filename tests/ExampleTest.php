<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Test for home page
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
             ->see('Positions');
    }

    /**
     * Test for non existing url for home page
     *
     * @return void
     */
    public function testHomePageNegative()
    {
        /**
         * @var $response Symfony\Component\HttpFoundation\Response
         */
        $this->call('GET', '/wf3erf4rg');
        $this->assertResponseStatus(404);
    }

    /**
     * Test for ajax filter for position  status
     *
     * @return void
     */
    public function testAjaxFilter()
    {
        $response = $this->call('POST', '/', array('status'=> 'open'));
	$this->assertResponseOk();
	$this->assertResponseStatus(200);
    }

    /**
     * Test for non existing position  status for ajax filter
     *
     * @return void
     */
    public function testAjaxFilterNotFound()
    {
        $response = $this->call('POST', '/', array('status'=> 'wf3erf4rg'));
	$this->see('There are no positions');
    }
}
