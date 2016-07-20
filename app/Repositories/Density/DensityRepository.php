<?php
namespace App\Repositories\Density;

use App\Repositories\Density\DensityInterface as DensityInterface;
use App\Tweet;

class DensityRepository implements DensityInterface
{
    public $tweets;
    public $tweet;
    public $tweet_count;

    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
        for ($i = 0; $i <= 23; $i++) {
            $this->tweet_count[$i]['hour'] = $i;
            $this->tweet_count[$i]['count'] = 0;
        }
    }

    public function getTweets($handle, $count)
    {
        $this->tweets = json_decode($this->tweet->getTweets($handle, $count));
    }

    public function calculate()
    {
        foreach ($this->tweets as $tweet) {
            $hour = date('H', strtotime($tweet->created_at));
            $this->tweet_count[(int)$hour]['count'] += 1;
        }
        return $this->tweet_count;
    }
    public function xml()
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><response/>');
        $tweet_density = $xml->addChild('tweetdensity');
        foreach ($this->tweet_count as $key => $value) {
            $data = $tweet_density->addChild("data");
            $data->addChild('hour', $value['hour']);
            $data->addChild('count', $value['count']);
        }
        return ['data' => $xml->asXML(), 'contenType' => 'text/xml'];
    }

    public function json()
    {
        return ['data' => ['data' => ['tweetdensity' => $this->tweet_count]], 'contenType' => 'application/json'];
    }
}
