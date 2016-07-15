<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Twitter;
use SoapBox\Formatter\Formatter;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;

class DensityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $handle = Input::get('handle');
        $count = Input::get('count');
        $type = Input::get('type');
        try
        {
           $tweets = Twitter::getUserTimeline([
               'screen_name' => $handle,
               'count' => $count,
               'format'      => 'json'
           ]);
            $tweet_count = Helper::parseTweet(json_decode($tweets));
            if($type == 'xml') {
                $xml = Helper::formatResponsexml($tweet_count);
                return response($xml, 200)
                    ->header('Content-Type', 'text/xml');
            } else if($type == 'json') {
                $res['data'] = $tweet_count;
            } else {
                return view('chart', ['tweet_count' => $tweet_count, 'handle'=>$handle]);
            }

        }
        catch (Exception $e)
        {
           dd($e->getMessage());
        }

        return response()->json(['tweetdensity' => $res], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
