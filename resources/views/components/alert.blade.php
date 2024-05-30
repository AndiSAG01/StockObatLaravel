
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-block">
    <strong>{{ $message }}</strong>
</div>
@elseif ($message = Session::get('info'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@elseif ($errors->all())
<div class="alert alert-danger fw-bold" role="alert">Data is invalid 😣</div>  
@endif
