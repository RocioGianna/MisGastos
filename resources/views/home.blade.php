@extends('layouts.app')

@section('content')
  <div class="container">
    <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('pagos.create') }}"><i class="material-icons">add</i></a> 
    <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('pagos.index') }}">indewx</a> 
  </div>
@endsection
