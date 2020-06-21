@extends('layouts.app')

@section('title')Главная страница@endsection

@section('content')
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><p>Добро пожаловать.</p><p>Новоиспеченный портал РИО</p></h1>
                <p class="lead my-3">Здесь вы можетесь ознакомиться с публикациями авторов ЧГУ им. И.Н.Ульянова а также найти необходимую информацию касающуюся деятельности отдела.</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
        </div>
        <h2 class="font-italic">Последние публикации</h2>
        <div class="row mb-4">
            @foreach ($last as $record)
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $record->name }}</h3>
                            <p><small>{{ $record->author }}</small></p>
                            <div class="mb-1 text-muted">{{ $record->created_at }}</div>
                            <p class="card-text mb-auto">{{ mb_strimwidth($record->description, 0, 100, "...") }}</p>
                            <a href="#" class="stretched-link">Подробнее</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{ asset('storage/'.$record->image) }}" alt="image" width="200" height="230">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Новости из-под нашего пера:
                </h3>

                <div class="blog-post">
                    <h2 class="blog-post-title">Первый</h2>
                    <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                    <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
                    <hr>
                    <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                    <blockquote>
                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </blockquote>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div><!-- /.blog-post -->

                <div class="blog-post">
                    <h2 class="blog-post-title">Второй</h2>
                    <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

                    <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                    <blockquote>
                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </blockquote>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                </div><!-- /.blog-post -->

                <div class="blog-post">
                    <h2 class="blog-post-title">Третий</h2>
                    <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <ul>
                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                        <li>Donec id elit non mi porta gravida at eget metus.</li>
                        <li>Nulla vitae elit libero, a pharetra augue.</li>
                    </ul>
                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                </div>
                <!-- /.blog-post -->

                <nav class="blog-pagination mb-5">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>

            </div>

            <!-- /.blog-main -->
            <aside class="col-md-4 blog-sidebar">
                <div class="p-4">
                    <h4 class="font-italic">Нормативные документы</h4>
                    <ol class="list-unstyled mb-0">
                        @foreach($documents as $document)
                            <li><a href="{{ route('documents.download', $document->id) }}">{{ $document->name }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <div class="p-4">
                    <h4 class="font-italic">Веб ресурсы</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">CHUVSU</a></li>
                        <li><a href="https://edu.gov.ru/">EDU GOV</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">Случайный факт о нашем отделе</h4>
                    <p class="mb-0">{{ $fact->text }}</p>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main>
@endsection
