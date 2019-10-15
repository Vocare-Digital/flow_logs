<?php

class ProcessControllerTest extends TestCase
{
    public function testGetProcesses()
    {
        $response = $this->json('GET', '/v1/process');
        $this->assertEquals(200, $this->response->status());
    }

    public function testSuccessfulCreateProcess()
    {
        $response = $this->json('POST', '/v1/process', [
            'name' => 'Test Process'
        ]);
        $this->assertEquals(201, $this->response->status());
    }

    public function testUnsuccessfulCreateProcess()
    {
        $response = $this->json('POST', '/v1/process', [
            'description' => ''
        ]);
        $this->assertEquals(422, $this->response->status());
    }

    public function testGetProcess()
    {
        $response = $this->json('GET', '/v1/process/1');
        $this->assertEquals(200, $this->response->status());
    }

}
