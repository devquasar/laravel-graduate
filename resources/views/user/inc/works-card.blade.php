<div class="col-md-6 mb-3">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-100 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">{{ $work->name }}</h3>
            <p><small>{{ $work->author }}</small></p>
            <div class="mb-1 text-muted">{{ $work->created_at }}</div>
            <p class="card-text mb-auto">{{ $work->description }}</p>
            <a href="#" class="stretched-link">Подробнее</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{ asset('storage/'.$work->image) }}" alt="book" width="200" height="230">
        </div>
    </div>
</div>
