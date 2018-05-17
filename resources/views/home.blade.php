@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('home.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Добавить статью</a>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Описание</th>
            <th>Дата добавления</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td><a href="{{route('show', $article->id)}}"> {{$article->title}}</a></td>
                    <td>{{$article->description_short}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('home.destroy', $article->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('home.edit', $article)}}"><i class="fa fa-edit"></i></a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$articles->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
