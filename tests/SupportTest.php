<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SupportTest extends TestCase
{
    /**
     * A basic test page support rain.
     *
     * @return void
     */
    public function testSupportRain()
    {
      echo "\n ---- Page : support/rain ---- \n";
      $response = $this->visit('support/rain');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
      echo "\n ---- Page : support/rain/1 ---- \n";
      $response = $this->visit('support/rain/1');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page support dam.
     *
     * @return void
     */
    public function testSupportDam()
    {
      echo "\n ---- Page : support/dam ---- \n";
      $response = $this->visit('support/dam');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
      echo "\n ---- Page : support/dam/1 ---- \n";
      $response = $this->visit('support/dam/1');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page support watercourse.
     *
     * @return void
     */
    public function testSupportWatercourse()
    {
      echo "\n ---- Page : support/watercourse ---- \n";
      $response = $this->visit('support/watercourse');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
      echo "\n ---- Page : support/watercourse/1 ---- \n";
      $response = $this->visit('support/watercourse/1');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
}
