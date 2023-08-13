<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return "this is working the number is ".$id;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return"i am the method that creates stuff..";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "this is the show method yayyyyy".$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function contact(){

        $people = ['Ram', 'Nabin', 'Binod', 'Kiran'];
        return view('contact', compact('people'));
    }

    public function show_post($id, $name, $passw){
        // return view('post')->with('id',$id);
        return view('post', compact('id', 'name', 'passw'));
    }
}
