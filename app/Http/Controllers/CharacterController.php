<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use DB;

class CharacterController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $people = DB::table('characters')->orderby('characters.name')->get(); 

        return view('characters', compact('people'));
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
        $client = new \Guzzle\Service\Client('https://ghibliapi.herokuapp.com/people');

        $response = $client->get()->send();
        $people_data = $response->json();

        $people = DB::table('characters')->orderby('characters.name')->get(); 

        foreach($people_data as $p){
            DB::beginTransaction();
            $insert = Character::create([
                'character_id' => $p['id'],
                'name' => $p['name'],
                'gender' => $p['gender'],
                'age' => $p['age'],
                'eye_color' => $p['eye_color'],
                'hair_color' => $p['hair_color'],            
                //'film' => $p['films'],            
            ]);

            /*if($validator->fails()){
                return redirect('/home')
                        ->withErros($validator);
            }*/

            if($insert){           
                DB::commit();
                //dd("commit");
            }
            else{
                DB::rollback();
            }
        }

        $people = DB::table('characters')->orderby('characters.name')->get();
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
