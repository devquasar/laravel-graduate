@extends('layouts.app')

@section('title-block')Публикации@endsection

@section('content')
    <div class="row mb-4">
        @foreach ($works as $work)
            @include('user.inc.works-card')
        @endforeach
    </div>
@endsection
