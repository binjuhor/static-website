@extends('layouts.app')

@section('page_title', 'Home page')

@section('content')
    <div class="gsa-widget" data-widget="swimming"  data-wid="1" data-id="1"></div>
    <div class="gsa-widget" data-widget="news" data-wid="3" data-id="1"></div>
    <div class="gsa-widget" data-widget="news" data-wid="3" data-id="2"></div>
    <div class="gsa-widget" data-widget="finished-heats" data-wid="2" data-id="1"></div>
    <script src="http://gsa-website.test/resources/assets/js/widgetloader.js"></script>
@endsection