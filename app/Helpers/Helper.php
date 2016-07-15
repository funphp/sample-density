<?php

namespace App\Helpers;

class Helper
{
    public static function parseTweet(array $tweets)
    {
       for($i=0;$i<=23;$i++) {
           $tweet_count[$i]['hour']=$i;
           $tweet_count[$i]['count']=0;
       }

        foreach($tweets as $tweet) {
            $hour = date('H',strtotime($tweet->created_at));
            $tweet_count[(int)$hour]['count']+=1;
       }
        return $tweet_count;

    }

    public static function formatResponsexml($tweet_count)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><response/>');
        $tweetdensity = $xml->addChild('tweetdensity');
        foreach ($tweet_count as $key => $value) {
            $data = $tweetdensity->addChild("data");
            $data->addChild('hour', $value['hour']);
            $data->addChild('count', $value['count']);
        }
        return $xml->asXML();

    }
}