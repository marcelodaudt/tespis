@extends('layouts.app')

@section('content')
  <h3>Cadastrar Disciplina</h3>

  <form method="POST" action="/disciplinas">
    @csrf
    @include('disciplinas.partials.form')
  </form>
@endsection