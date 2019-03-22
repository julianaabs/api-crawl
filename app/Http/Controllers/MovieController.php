<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use DB;

class MovieController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = new \Guzzle\Service\Client('https://ghibliapi.herokuapp.com/films');

        $response = $client->get()->send();
        $movie_data = $response->json();

        foreach($movie_data as $m){
            DB::beginTransaction();
            $insert = Movie::create([
                'movie_id' => $m['id'],
                'title' => $m['title'],
                'description' => $m['description'],
                'director' => $m['director'],
                'producer' => $m['producer'],
                'year' => $m['release_date'],
                'rt_score' => $m['rt_score'],
            
            ]);
            if($insert){
                DB::commit();
                //dd("commit");
            }
            else{
                DB::rollback();
            }
        }

        $movies = DB::table('movies')->orderby('movies.title')->get();

        return view('movies', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        //
    }
}
