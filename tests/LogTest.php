<?php

class LogTest extends TestCase
{
    public function testGetLogs()
    {
        $response = $this->json('GET', '/v1/logs');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetProcessLog()
    {
        $response = $this->json('GET', '/v1/logs/test_system');
        $this->assertEquals(200, $this->response->status());
    }

    public function testBadCreateRequest()
    {
        $response = $this->json('POST', '/v1/log', []);
        $this->assertEquals(422, $this->response->status());
    }

    public function testCorrectCreateRequest()
    {
        $response = $this->json('POST', '/v1/log', [
            'process_name' => 'test',
            'additional_info' => array('test' => 1),
            'severity' => 'test3'
        ]);
        $this->assertEquals(201, $this->response->status());
    }
}
