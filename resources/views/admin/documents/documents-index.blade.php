@extends('admin.layouts.app')

@section('title')Документы@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Документы</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('documents.create')}}" class="btn btn-primary">Новый документ</a>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Путь в хранилище</td>
                    <td>Создан</td>
                    <td>Обновлен</td>
                    <td colspan = 3 class="text-center">Действия</td>
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{$document->id}}</td>
                        <td>{{$document->name}}</td>
                        <td>{{$document->href}}</td>
                        <td>{{ date('M d Y', strtotime($document->created_at)) }}</td>
                        <td>{{ date('M d Y', strtotime($document->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('documents.edit',$document->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('documents.show',$document->id)}}" class="btn btn-info"> <i class="fa fa-download"></i> </a>
                        </td>
                        <td>
                            <form action="{{ route('documents.destroy', $document->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
