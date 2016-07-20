<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SoapBox\Formatter\Formatter;
use GuzzleHttp\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Density\DensityInterface as DensityInterface;

class DensityController extends Controller
{

    public function __construct(DensityInterface $density)
    {
        $this->density = $density;
    }

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
        try {
            $this->density->getTweets($handle, $count);
            $tweet_count = $this->density->calculate();
            if ($type == 'xml') {
                $data = $this->density->xml();
            } elseif ($type == 'json') {
                $data = $this->density->json();
            } else {
                return view('chart', ['tweet_count' => $tweet_count, 'handle' => $handle]);
            }
            return response($data['data'], 200)->header('Content-Type', $data['contenType']);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
