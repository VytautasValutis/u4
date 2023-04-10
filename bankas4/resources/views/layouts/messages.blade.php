@if (Session::has('ok'))
    <div class="alert alert-success">
        {{ Session::get('ok') }}
    </div>
@endif
