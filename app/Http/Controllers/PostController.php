<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //        return $request->all();
        Post::create($request->all());

        // $input = $request->all();

        // $input['title'] = $request->title;

        // Post::create($request->all());

        // $post = new Post;
        // $post->title=$request->title;
        // $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return $request->all();
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$post = Post::whereId($id)->delete();
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
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
