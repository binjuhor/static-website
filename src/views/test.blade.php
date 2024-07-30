@extends('layouts.app')

@section('page_title', 'Test')

@section('content')
    <h1>Welcome to the test page</h1>
    <p>This is the test page content.</p>
    @include('components.nav')

@endsection