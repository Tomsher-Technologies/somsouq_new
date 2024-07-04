@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close btn-custom-close" aria-label="Close" style="float: right"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close btn-custom-close" aria-label="Close" style="float: right"></button>
    </div>
@endif
