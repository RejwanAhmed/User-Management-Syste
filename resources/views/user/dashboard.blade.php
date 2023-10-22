@extends('layouts.main')
@section('content')
    <h1 class = "text-center">Welcome To {{ Auth()->user()->firstName }} Dashboard</h1>
@endsection
