<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        echo "\n ---- Page : login ---- \n";
        $response = $this->visit('login');
        $this->assertResponseStatus($response->response->getStatusCode());
        echo "Response is ". $response->response->getStatusCode();
        echo "\n";
    }
}
