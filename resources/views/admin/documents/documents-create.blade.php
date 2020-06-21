@extends('admin.layouts.app')

@section('title')Добавление документы@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Добавить документ</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Название публикации</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <label for="href">Документ: </label>
                    <div class="form-group">
                        <label class="btn btn btn-outline-dark btn-file">
                            Загрузить <input type="file" style="display: none;" name="href" id="href" class="form-control">
                        </label>
                    </div>
                    <button type="submit" class="btn btn btn-outline-primary"><i class="fa fa-plus"></i> Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
