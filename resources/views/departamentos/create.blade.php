@extends('layouts.app')

@section('content')
  <h3>Cadastrar Departamento</h3>
  
  <form method="POST" action="/departamentos">
    @csrf
    @include('departamentos.partials.form')
  </form>
@endsection