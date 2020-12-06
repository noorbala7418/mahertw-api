<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterV1Controller extends Controller
{
    public $client;

    public function homeTimeline()
    {
        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key' => env('TWITTER_API_KEY'),
            'consumer_secret' => env('TWITTER_API_SECRET_KEY'),
            'token' => env('TWITTER_ACCESS_TOKEN'),
            'token_secret' => env('TWITTER_ACCESS_TOKEN_SECRET')
        ]);
        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth',
        ]);

        // Set the "auth" request option to "oauth" to sign using oauth

        $res = $client->get('statuses/home_timeline.json', []);
        $data = json_decode($res->getBody());
        return $data;
    }
}
