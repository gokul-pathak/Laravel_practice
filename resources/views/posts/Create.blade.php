@extends('layouts.app')


@section('content')

    <form method="POST" action="/posts">
        <input type="text" name="title" placeholder="enter title...">
        <input type="submit" name="submit">
    </form>
    @yield('footer')
