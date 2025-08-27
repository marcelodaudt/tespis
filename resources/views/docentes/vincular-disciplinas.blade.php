@extends('layouts.app')

@section('content')
  <h3>Vincular Disciplina ao Docente: {{ $docente->nome_docente }} {{ $docente->sobrenome_docente }}</h3>

  <form method="POST" action="{{ route('docentes.vincular-disciplinas', $docente->id) }}">
    @csrf
    @include('docentes.partials.bond')
  </form>
@endsection
