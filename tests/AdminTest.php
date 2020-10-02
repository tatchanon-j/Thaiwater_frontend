<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase
{
    /**
     * A basic test page admin.
     *
     * @return void
     */
     public function testAdmin()
     {
       echo "\n ---- Page : admin ---- \n";
       $response = $this->visit('admin');
       $this->assertResponseStatus($response->response->getStatusCode());
       echo "Response is ". $response->response->getStatusCode();
       echo "\n";
    }
    /**
     * A basic test page admin group.
     *
     * @return void
     */
     public function testAdminGroup()
     {
       echo "\n ---- Page : admin/group ---- \n";
       $response = $this->visit('admin/group');
       $this->assertResponseStatus($response->response->getStatusCode());
       echo "Response is ". $response->response->getStatusCode();
       echo "\n";
    }
    /**
     * A basic test page admin user.
     *
     * @return void
     */
     public function testAdminUser()
     {
       echo "\n ---- Page : admin/user ---- \n";
       $response = $this->visit('admin/user');
       $this->assertResponseStatus($response->response->getStatusCode());
       echo "Response is ". $response->response->getStatusCode();
       echo "\n";
    }
}
