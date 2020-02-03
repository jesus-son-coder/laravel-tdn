@extends('layouts.base')

@section('content')
    <h1>The Best URL Shortener out there !</h1>

    <form action="" method="POST">
        <input type="text" placeholder="Enter your original URL here..." style="width:200px">
        <input type="submit" value="Shorten URL">
    </form>
@endsection

