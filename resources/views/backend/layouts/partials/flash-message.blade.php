
@if(Session::has('alert-success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('alert-success') }}
</div>
@endif