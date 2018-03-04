@extends('main')

@section('Title','| Koszyk')

@section('content')

  <div class="row">
      <div class="col-md-10">
        <h1 class="strong">Twój koszyk</h1>
      </div>
      <div class="col-md-2">
        <a href="{{ route('home') }}" class="btn btn-lg btn-primary float-right">Wróć do sklepu</a>

      </div>
      <div class="col-md-12">
          <hr>
      </div>
  </div>

  <div class="row" style="padding-top: 15px;">
    <div class="col-md-8 offset-md-2">
        
        <table class="table" >
            <thead>
              
              <th>Nazwa produktu</th>
              <th>Ilość</th>
              <th>Kwota</th>
              <th></th>
            </thead>
            <tbody>
                
                @foreach ($total as $tl) 
                  <tr>
                    <th>{{ $tl->first()->title }}</th>
                    <td>{{ $tl->count() }}</td>
                    <td>{{ $tl->first()->price * $tl->count() }}zł</td>
                    <td>
                        {!! Form::open(['route' => ['products.destroy', $tl->first()->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Usuń', ['class' => 'btn btn-danger btn-sm float-right']) !!}
                        {!! Form::close() !!}
                    </td>
                  </tr>                   
                @endforeach
                  <tr>
                    <td></td>
                    <td style="text-align: right">Wartość koszyka: </td>
                    <th>{{ $price }}zł</th>
                    <td></td>
                  </tr>       
            </tbody>
        </table>

        
    </div>
  </div>

@endsection