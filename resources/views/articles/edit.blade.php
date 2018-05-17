@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Редактировать статью</h1>
        <br>
        <form class="form-horizontal" action="{{route('home.update', $article->id)}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('articles.partials.form')

        </form>

    </div>

@endsection