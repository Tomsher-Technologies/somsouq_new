@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close btn-custom" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close btn-custom" aria-label="Close"></button>
    </div>
@endif
