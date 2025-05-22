@extends('layouts.app')

@section('content')
  <h3>Cadastrar Turma</h3>
  
  <form method="POST" action="/turmas">
    @csrf
    @include('turmas.partials.form')
  </form>
@endsection