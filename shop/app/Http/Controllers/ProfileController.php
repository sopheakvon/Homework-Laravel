<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profile::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // move image to folder storage
        $request->file('image')->store('public/images');
        //insert to database 
        $profile = new Profile();
        $profile->user_id = $request->user_id;
        $profile->city = $request->city;
        $profile->image = $request->file('image')->hashName();
        $profile->save();
        return response()->json(['Message' => 'profile save successfully' ],201);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::findOrFail($id);

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
         // move image to folder storage
         $request->file('image')->store('public/images');
         //insert to database 
         $profile = Profile::findOrFail($id);
         $profile->user_id = $request->user_id;
         $profile->city = $request->city;
         $profile->image = $request->file('image')->hashName();
         $profile->save();
         return response()->json(['Message' => 'profile updated successfully' ],201);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Profile::destroy($id);
        if ($isDelete == 1)
        return response()->json(['message' => "Delete successfully"],200); 
        return response()->json(["message" => "ID not exist"],404); 
    }
}
