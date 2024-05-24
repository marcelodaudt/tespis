@extends('layouts.app')

@section('content')
  <form method="POST" action="/turmas/{{ $turma->id }}">
    @csrf
    @method('patch')
    @include('turmas.partials.form')
  </form>
@endsection