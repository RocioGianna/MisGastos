@extends('layouts.app')

@section('edit.form')
    <div class="row">
        {{ $pago->id }}
        <form class="col s12" action="{{ route('pagos.store') }}" method="get">
            @csrf
            <div class="container">
                <div class="container">
                    <div class=" col s3">
                        <input  name="nombre_gasto" type="text" value="{{ old('nombre_gasto') }}" class="validate">
                        <label for="nombre_gasto">Gasto</label>

                        <textarea name="descripcion" value="{{ old('descripcion') }}" class="materialize-textarea"></textarea>
                        <label for="descripcion">Descripción</label>

                        <input name="monto" placeholder="$" type="number" value="{{ old('monto') }}" class="validate">
                        <label for="monto">Monto</label>

                        <label>
                            <input name="pagado" type="checkbox" class="filled-in"  class="validate" value="0" />
                            <span>Pago realizado</span>
                        </label>

                        <input type="date" name="fecha" class="validate">
                        <label for="fecha">Fecha de pago</label>

                        <a href=""><i class="material-icons">done</i>Guardar Cambios</a>
                        <a href="{{ route('pagos.index') }}"><i class="material-icons">clear</i> Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection