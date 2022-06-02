@extends('layouts.app')

@section('content')
    <h1 class="text-base md:text-2xl">Reservaciones</h1>
    <div class="container">
        @include('Home.items.buttons')
    </div>
    <div class="container">
        @include('Home.items.search')
    </div>
    @include('Home.items.table')
    <!-- Passing BASE URL to AJAX -->
    <input id="url" type="hidden" value="{{ \Request::url() }}">
    <input id="baseUrl" type="hidden" value="{{ \Request::root() }}">

@endsection
@section('modal')
@include('Home.create')
@endsection
@section('script')
    <script src="{{ asset('js/actions/home.js') }}"></script>
@endsection
