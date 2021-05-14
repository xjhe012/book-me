<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
    * @dataProvider getData
    * @param $arrayContent
    * @param $statusCode
    */
    public function testCreateUser($arrayContent,$statusCode)
    {
        $client = new Client();
        // print_r($arrayContent);
        // echo $statusCode;
        $response = $client->post('http://localhost:8081/msdynamics/public/api/user/create', [
            \GuzzleHttp\RequestOptions::JSON => $arrayContent,
            'http_errors' => false
        ]);
        // $code = $response->getStatusCode(); // 200
        // $reason = $response->getReasonPhrase(); // OK
        // $body = $response->getBody();
        // $remainingBytes = $body->getContents();
        // print_r($response->getStatusCode());
        $this->assertEquals($statusCode, $response->getStatusCode());

   
    }

    /**
    * @return array
    */
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
            ],422],
            [[
                'name'=>'Marcus plata',
                'password'=>'123456!',
                'email'=>'meplata@1go.ph'
            ],200],
            [[
                'name'=>'Ferdinand plata',
                'password'=>'123456!!!',
                'email'=>'feplata@1go.ph'
            ],422],
        ];
    }
}
