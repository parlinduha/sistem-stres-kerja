@extends('layouts.welcome')

@section('content')
    <span class="mb-5">Pilih Jawaban yang relevan dengan yang anda alami</span>
    <p><strong>Dalam 2 minggu terakhir</strong>, seberapa sering masalah-masalah berikut ini mengganggu kamu?</p>
    <form action="{{ route('expert.store') }}" method="POST">
        @csrf
        <ul>
            @foreach ($indications as $indication)
                <li style="list-style: none;  padding:4px">
                    <div id="card">
                        <input type="checkbox" name="indications[]" value="{{ $indication->code_indication }}"
                            id="{{ $indication->code_indication }}">
                        <label for="{{ $indication->code_indication }}">{{ $indication->code_indication }} -
                            {{ $indication->name_indication }}</label>
                    </div>
                </li>
            @endforeach
        </ul>
        <button type="submit" class="myButton">Submit</button>
    </form>
@endsection
@section('styles')
    <style>
        .myButton {
            background-color: #44c767;
            border-radius: 28px;
            border: 1px solid #18ab29;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 16px;
            padding: 8px 56px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #2f6627;
        }

        .myButton:hover {
            background-color: #5cbf2a;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }
    </style>
@endsection
