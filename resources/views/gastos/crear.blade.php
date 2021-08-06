@extends('layouts.app')

@section('form.crear')

    <div class="container">
        <form class="col s12" action="{{ route('pagos.store') }}" method="post">
            @csrf
            <div class="container">
                <div class="input-group input-group-sm mb-3">
                    <input placeholder="Ej. Luz, Gas..." class="form-control" name="nombre_gasto" type="text" required>
                </div>
                <div class="mb-3">
                    <textarea placeholder="Ej. regalo de cumpleaños.. (opcional)" class="form-control" rows="3" name="descripcion" class="materialize-textarea"></textarea>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input class="form-control"  name="monto" placeholder="$" type="number" required>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" name="pagado" type="radio"  checked="checked" value="0" required />
                    <span>Pago realizado</span>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="pagado" type="radio"  value="1" required />
                    <span>Pago aún no realizado</span>
                </div>

                <input type="date"  name="fecha" required>
                <label for="fecha">Fecha de pago</label>
                    
                <select class="form-select"  name="categoria" required>
                    <option value="" disabled selected>Selecciona una categoria</option>
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="container">
                <div class="container">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Agregar </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection