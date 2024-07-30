@extends('layouts.app')

@section('page_title', 'Test')

@section('content')
    <h1>This is sport page</h1>
    <p>This is the test page content.</p>
    @include('components.nav')
    @dd($id)
@endsection