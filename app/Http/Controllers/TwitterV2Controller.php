<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterV2Controller extends Controller
{
    public $client;

    public function singleTweet($id)
    {
        $client = new Client([
            'base_uri' => 'https://api.twitter.com/2/',
        ]);
        $res = $client->get("tweets/$id",
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('TWITTER_BEARER_TOKEN'),
                ]
            ]
        )->getBody();

        return response($res, 200, [
            'content-type' => 'application/json;charset=utf-8'
        ]);
    }

    public function multipleTweet($ids)
    {
        $client = new Client([
            'base_uri' => 'https://api.twitter.com/2/',
        ]);

        $params = [
            'ids' => $ids,
            'tweet.fields' => 'created_at',
            'user.fields' => 'created_at',
            'expansions' => 'author_id',
        ];
        $res = $client->get("tweets",
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('TWITTER_BEARER_TOKEN'),
                ],
                'query' => [
                    'ids' => $params['ids'],
                    'tweet.fields' => $params['tweet.fields'],
                    'user.fields' => $params['user.fields'],
                    'expansions' => $params['expansions'],
                ],
            ]
        )->getBody();

        return response($res, 200, [
            'content-type' => 'application/json;charset=utf-8'
        ]);
    }
}
