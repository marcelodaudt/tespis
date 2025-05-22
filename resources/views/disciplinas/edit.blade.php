@extends('layouts.app')

@section('content')
  <form method="POST" action="/disciplinas/{{ $disciplina->id }}">
    @csrf
    @method('patch')
    @include('disciplinas.partials.form')
  </form>
@endsection