@extends('layouts.app')

@section('content')
  <h3>Cadastrar Curso</h3>

  <form method="POST" action="/cursos">
    @csrf
    @include('cursos.partials.form')
  </form>
@endsection