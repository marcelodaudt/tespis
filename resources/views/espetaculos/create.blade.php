@extends('layouts.app')

@section('content')
  <h3>Cadastrar Espetáculo</h3>

  <form method="POST" action="/espetaculos">
    @csrf
    @include('espetaculos.partials.form')
  </form>
@endsection