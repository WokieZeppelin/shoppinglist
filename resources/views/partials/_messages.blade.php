@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
      <strong>Sukces:</strong> {{ Session::get('success')}}
    </div>

@endif

@if (Session::has('emptyCart'))

    <div class="alert alert-danger" role="alert">
      {{ Session::get('emptyCart')}}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
      <strong>Błędy: </strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{  $error  }}</li>

      @endforeach
      </ul>
    </div>

@endif