<?php

use Laravel\Lumen\Testing\DatabaseMigrations;


class ProcessLogTest extends TestCase
{
    use DatabaseMigrations;
    
    
    public function testSuccessfulGetProcessLogs()
    {
        $response = $this->json('GET', '/v1/process/1/logs');
        $this->assertEquals(200, $this->response->status());
    }

    public function testSuccessfulCreateProcessLog()
    {
        $response = $this->json('POST', '/v1/process/1/logs', [

        ]);
        $this->assertEquals(201, $this->response->status());
    }

    public function testUnsuccessfulCreateProcessLog()
    {
        $response = $this->json('POST', '/v1/process/1/logs', []);
        $this->assertEquals(422, $this->response->status());
    }

    public function testSuccessfulGetProcessLog()
    {
        $response = $this->json('GET', '/v1/process/1/log/1');
        $this->assertEquals(200, $this->response->status());
    }

    public function testUnsuccessfulGetProcessLog()
    {
        $response = $this->json('GET', '/v1/process/1/log/10000000');
        $this->assertEquals(404, $this->response->status());
    }
}
