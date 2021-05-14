<?php

namespace Tests\Feature\tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use GuzzleHttp\Client;
class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @dataProvider getData
     */
    public function testExample($content,int $statusCode)
    {
        $client = new Client();
        
        //call login page
        $response = $this->get('/login');
        $response->assertStatus(200);
        //authenticate user
        $response = $client->post('http://localhost:8081/bookme/public/auth', [
            \GuzzleHttp\RequestOptions::JSON => $content,
            'http_errors' => false
        ]);
        $this->assertEquals($statusCode, $response->getStatusCode());
    }

    public function getData(): array
    {
        return [
            [[
               'name'=>'ferdz plata',
               'password'=>'123456!',
               'email'=>'feplata@1go.ph'
            ],200],
            [[
                'name'=>'Fatz plata',
                'password'=>'',
                'email'=>'fcplata@1go.ph'
            ],422]
        ];
    }
}
