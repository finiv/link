@extends('layouts.app')

@section('title', 'Registration Successful')

@section('content')
    <h1>Registration Successful</h1>
    <p>Your unique link: <a href="{{ route('access.page', ['link' => $link]) }}">{{ route('access.page', ['link' => $link]) }}</a></p>
@endsection
