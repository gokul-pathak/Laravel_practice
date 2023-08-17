@extends('layouts.app')


@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="enter title..." value="{{ $post->title }}">
        <input type="submit" name="submit">
    </form>
@endsection
