@extends('layouts.app')

@section('content')
  <form method="POST" action="/docentes/{{ $docente->id }}">
    @csrf
    @method('patch')
    @include('docentes.partials.form')
  </form>
@endsection