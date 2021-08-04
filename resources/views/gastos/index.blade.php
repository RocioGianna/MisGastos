@extends('layouts.app')

@section('index')
    <h1>fecha mes y año</h1>
    <div class="container">
        <table class="highlight">
            <thead>
              <tr>
                  <th>Gasto</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Pago finalizado</th>
                  <th>Categoria</th>
                  <th>Editar</th>
                  <th>Borrar</th>
              </tr>
            </thead>
    
            <tbody>
                @foreach ($pagos as $pago)  
                    <tr>
                        <td>{{ $pago->gasto}}</td>
                        <td>{{ $pago->descripcion }}</td>
                        <td>{{ $pago->precio }}</td>
                        <td>{{ $pago->pagado }}</td>
                        <td>{{ $pago->nombre }}</td>
                        <td><a href="{{ route('pagos.edit', $pago->id) }}"><i class="small material-icons">create</i></a></td>
                        <td><a href="#"><i class="small material-icons font-size">delete_forever</i></a></td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection