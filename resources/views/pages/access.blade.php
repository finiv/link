@extends('layouts.app')

@section('title', 'Special Page')

@section('content')
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Your link: {{ $link }}</p>
    <form action="{{ route('generate.new.link', ['link' => $link]) }}" method="POST" class="mb-2">
        @csrf
        <button type="submit" class="btn btn-warning">Generate New Link</button>
    </form>
    <form action="{{ route('deactivate.link', ['link' => $link]) }}" method="POST" class="mb-2">
        @csrf
        <button type="submit" class="btn btn-danger">Deactivate Link</button>
    </form>
    <form action="{{ route('imfeelinglucky', ['link' => $link]) }}" method="POST" class="mb-2">
        @csrf
        <button type="submit" class="btn btn-success">I'm Feeling Lucky</button>
    </form>
    <a href="{{ route('history', ['link' => $link]) }}" class="btn btn-info">History</a>
@endsection
