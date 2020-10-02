<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AutoreportTest extends TestCase
{
    /**
     * A basic test page autoreport.
     *
     * @return void
     */
    public function testAutoreport()
    {
      echo "\n ---- Page : autoreport ---- \n";
      $response = $this->visit('autoreport');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page autoreport daily.
     *
     * @return void
     */
    public function testAutoreportDaily()
    {
      echo "\n ---- Page : autoreport/daily ---- \n";
      $response = $this->visit('autoreport/daily');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
}
