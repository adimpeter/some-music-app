<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testGuzzle(){
        $query = 'eminem';
        $url = "https://deezerdevs-deezer.p.rapidapi.com/search?q=" . $query;
        $test_url = "https://www.deezer.com/track/13692803";
        $header_array = [
            'headers' => [
                    "X-RapidAPI-Host" => "deezerdevs-deezer.p.rapidapi.com",
                    "X-RapidAPI-Key" => "e3b8d8a103mshbb4f37b74ba71f8p1724b0jsn8db3023da545"
                ]
            ];
        
        $client = new \GuzzleHttp\Client($header_array);
        $res = $client->request('GET', $test_url);
        // echo $res->getStatusCode();
        // // "200"
        // echo $res->getHeader('content-type')[0];
        // // 'application/json; charset=utf8'
        // echo $res->getBody();

        // $values = json_decode($res->getBody(), true);
        // $singleValue = $values['data'][0];
        // $audio = $singleValue['preview'];

        // return view('test.test', compact('audio', 'singleValue'));

        // dd($singleValue);

        dd($res->getBody());

        $data = json_decode($res->getBody(), true);
        return response($data, 200);
    }
}
