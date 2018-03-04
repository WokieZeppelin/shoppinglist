@extends('main')

@section('Title','| Produkty')

@section('content')

  <div class="row">
      <div class="col-md-10">
        <h1 class="strong">Produkty</h1>
      </div>
      <div class="col-md-2">
        <a href="{{ route('products.showcart') }}" class="btn btn-lg btn-primary float-right">Koszyk</a>

      </div>
      <div class="col-md-12">
          <hr>
      </div>
  </div>

  <div class="row" style="padding-top: 15px;">
    <div class="col-md-8 offset-md-2">
        
        <table class="table" >
            <thead>
              <th>#</th>
              <th>Nazwa produktu</th>
              <th>Cena/szt</th>
              <th>Ilość</th>
              <th></th>
            </thead>
            <tbody>

              @foreach ($products as $product)
                  {!! Form::open(['route' => 'products.add']) !!}
                  <input name="title" type="hidden" value="{{ $product->title }}">
                  <tr>
                      <th>{{ $product->id }}</th>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->price }}zł</td>
                      <td>
                          {{ Form::number('quantity', null, [
                            'class' => 'form-control form-control-sm', 
                            'required' => '', 
                            'min' => '1', 
                            'placeholder' => 'Podaj ilość'])
                          }}
                      </td>
                      <td>
                        {!! Form::submit('Kup Teraz', ['class' => 'btn btn-success btn-sm float-right']) !!}
                        {!! Form::close() !!}
                      </td>  
                  </tr>

              @endforeach

            </tbody>
        </table>
        
    </div>
  </div>

@endsection