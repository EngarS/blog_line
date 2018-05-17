@extends('layouts.app')

@section('content')

    <div class="container">

        @forelse ($articles as $article)
            <h1> <a href="{{route('show', $article->id)}}"> {{$article->title}} </a> </h1>

            <div class="row">
                <div class="col-md-4"><h5>Дата создания статьи: {{date('d-m-Y', strtotime($article->created_at))}}</h5></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"><h5>Автор: {{\App\User::find($article->created_by)->name}}</h5></div>
            </div>

            <br>
            <hr>

            {{$article->description_short}}
            <div class="row">
                <div class="col-md-offset-11"><a href="{{route('show', $article->id)}}"> Продолжить </a></div>
            </div>
            <hr size=5>

        @empty
            <tr>
                <td colspan="3" class="text-center"><h2>Пока нет статей. Зайдите позже.</h2></td>
            </tr>
        @endforelse

    </div>

@endsection
