@extends('layouts.welcome')
@section('content')
    <h1>Diagnosa</h1>
    <div class="jumbotron">
        <h1 class="display-4">Hello, {{ Auth::user()->name }}!</h1>
        <p class="lead">Sudah siap melakukan diagnosa sekarang ?</p>
        <p>Silahkan klik tombol untuk melanjutkan.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('diagnosis.index') }}">Start</a>
    </div>
@endsection
