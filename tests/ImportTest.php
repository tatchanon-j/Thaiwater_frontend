<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImportTest extends TestCase
{
    /**
     * A basic test page import.
     *
     * @return void
     */
    public function testImport()
    {
      echo "\n ---- Page : import ---- \n";
      $response = $this->visit('import');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page import data.
     *
     * @return void
     */
    public function testImportData()
    {
      echo "\n ---- Page : import/data ---- \n";
      $response = $this->visit('import/data');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page import image.
     *
     * @return void
     */
    public function testImportImage()
    {
      echo "\n ---- Page : import/image ---- \n";
      $response = $this->visit('import/image');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page import history.
     *
     * @return void
     */
    public function testImportHistory()
    {
      echo "\n ---- Page : import/history ---- \n";
      $response = $this->visit('import/history');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
}
