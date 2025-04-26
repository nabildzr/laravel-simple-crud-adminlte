@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    {!! session('success') !!}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    {!! session('error') !!}
  </div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <p>Perhatian.</p>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif