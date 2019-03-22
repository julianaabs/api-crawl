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

        /** Get the API data */
        $client = new \Guzzle\Service\Client('https://ghibliapi.herokuapp.com/films');
        $response = $client->get()->send();
        /** Store response as JSON */
        $movie_data = $response->json();

        /** Get all data from Movies table */
        $movies = DB::table('movies')->orderby('movies.title')->get();
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

            /** Validate the rules to create another object on database */
            if($validator->fails()){
                return redirect('/home')
                        ->withErros($validator);
            }

            if($insert){           
                DB::commit();
            }
            else{
                DB::rollback();
            }
        }
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
