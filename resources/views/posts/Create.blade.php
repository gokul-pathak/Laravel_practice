@extends('layouts.app')


@section('content')
    <h1>Create Post</h1>
    <form method="POST" action="/posts">
        @csrf
        <input type="text" name="title" placeholder="enter title...">
        <input type="submit" name="submit">
    </form>
@endsection
