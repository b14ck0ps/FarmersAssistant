@extends('layouts.app')
@section('content')
    <div class="text-center text-3xl m-10">
        <h1>Welcome {{ Auth::user()->getFullName() }}</h1>
    </div>
@endsection
