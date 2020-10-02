<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExportTest extends TestCase
{
    /**
     * A basic test page export.
     *
     * @return void
     */
    public function testExport()
    {
      echo "\n ---- Page : export ---- \n";
      $response = $this->visit('export');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page export data.
     *
     * @return void
     */
    public function testExportData()
    {
      echo "\n ---- Page : export/data ---- \n";
      $response = $this->visit('export/data');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
    /**
     * A basic test page export history.
     *
     * @return void
     */
    public function testExportHistory()
    {
      echo "\n ---- Page : export/history ---- \n";
      $response = $this->visit('export/history');
      $this->assertResponseStatus($response->response->getStatusCode());
      echo "Response is ". $response->response->getStatusCode();
      echo "\n";
    }
}
