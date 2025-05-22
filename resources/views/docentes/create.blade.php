@extends('layouts.app')

@section('content')
  <h3>Cadastrar Professor(a)</h3>

  <form method="POST" action="/docentes">
    @csrf
    @include('docentes.partials.form')
  </form>
@endsection