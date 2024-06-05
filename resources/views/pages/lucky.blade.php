@extends('layouts.app')

@section('title', 'I\'m Feeling Lucky')

@section('content')
    <h1>I'm Feeling Lucky</h1>
    <p>Random Number: {{ $luckyResults->randomNumber }}</p>
    <p>Result: {{ $luckyResults->result }}</p>
    <p>Win Amount: {{ $luckyResults->winAmount }}</p>
    <a href="{{ route('access.page', ['link' => $link]) }}" class="btn btn-primary">Back</a>
@endsection
