@if (Session::has('info'))
    <div class="alert alert-primary mb-3" role="alert">
        {{ Session::get('info') }}
    </div>

@endif

@if (Session::has('success'))
    <div class="alert alert-success mb-3" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('delete'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ Session::get('delete') }}
    </div>
@endif
