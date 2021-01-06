@if(count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $err)
    {{ $err }}<br>
    @endforeach

</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    <strong>Thông Báo! </strong>{{ session('error') }}
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    <strong>Thông Báo! </strong>{{ session('success') }}
</div>
@endif