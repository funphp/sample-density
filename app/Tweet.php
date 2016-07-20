<?php
namespace App;

use Twitter;

class Tweet
{


    public function getTweets($handle, $count)
    {
        return Twitter::getUserTimeline([
            'screen_name' => $handle,
            'count' => $count,
            'format' => 'json'
        ]);
    }
}
