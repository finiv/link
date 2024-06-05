@extends('layouts.app')

@section('title', 'History')

@section('content')
    <h1>History</h1>
    <ul class="list-group">
        @foreach($history as $entry)
            <li class="list-group-item">
                Random Number: {{ $entry->random_number }}, Result: {{ $entry->result }}, Win Amount: {{ $entry->win_amount }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('access.page', ['link' => $link]) }}" class="btn btn-primary mt-3">Back</a>
@endsection
