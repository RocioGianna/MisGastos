@extends('layouts.app')

@section('form.crear')

    <div class="row">
        <form class="col s12" action="{{ route('pagos.store') }}" method="post">
            @csrf
            <div class="container">
                <div class="container">
                    <div class=" col s3">
                        <input  name="nombre_gasto" type="text" class="validate">
                        <label for="nombre_gasto">Gasto</label>

                        <textarea name="descripcion" class="materialize-textarea"></textarea>
                        <label for="descripcion">Descripción</label>

                        <input name="monto" placeholder="$" type="number" class="validate">
                        <label for="monto">Monto</label>

                        <label>
                            <input name="pagado" type="checkbox" class="filled-in" checked="checked" class="validate" value="0" />
                            <span>Pago realizado</span>
                        </label>

                        <input type="date" name="fecha" class="validate">
                        <label for="fecha">Fecha de pago</label>
                        
                        <select name="categoria" >
                            <option value="" disabled selected>Selecciona una categoria</option>
                            @foreach ($categorias as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Categoria</label>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="container">
                    <div class="col">
                        <button class="btn waves-effect " type="submit">Agregar </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection