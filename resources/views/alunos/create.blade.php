@extends('layouts.app')

@section('content')
  <h3>Cadastrar Aluno(a)</h3>

  <form method="POST" action="/alunos">
    @csrf
    @include('alunos.partials.form')
  </form>
@endsection