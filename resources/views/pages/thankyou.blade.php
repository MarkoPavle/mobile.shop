@extends('layouts.home')
@section('title', 'Thank You')

@section('content')
    @include('inc.notifications')
    <div class="container" style="margin: 40%">
        <h1 class="sidebar-title">Thank you come again</h1>
        <div>
            <button class="button-primary full-width"><a href="{{ route('homepage') }}">Home Page</a></button>
        </div>
    </div>
    @endsection