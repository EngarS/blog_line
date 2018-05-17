@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$article->title }}</h1>

        <br>

       {{$article->description}}

        <hr>

        <div class="row">
            <div class="col-md-4">Дата создания статьи: {{$article->created_at}}</div>
            <div class="col-md-4"></div>
            <div class="col-md-4">Автор: {{$article->created_by}}</div>
        </div>

    </div>

@endsection
