<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Twitter;
use SoapBox\Formatter\Formatter;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
               'format'      => $type
           ]);

           if($type == 'xml') {

               $formatter = Formatter::make($tweets, Formatter::ARR);
               return response($formatter->toXml(), 200)
                   ->header('Content-Type', 'text/xml');
           }
           $data = json_decode($tweets, true);

          // try with third patry service to get tweets states
          // $client = new Client();
           //$res = $client->request('GET','http://api.twittercounter.com/?apikey=df00481c292e3b97d5b4c5393a3144c4&username='.$handle.'&output=JSONP&count=7');
           //$response = $request->send();
           //$data = $response->json();
          // echo $res->getStatusCode();
          // echo $res->getHeader('content-type');
           //$data = json_decode($res->getBody());

        }
        catch (Exception $e)
        {
           dd($e->getMessage());
        }

        return response()->json(['data' => $data], 200);

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
