@extends('layouts.app')

@section('content')
  <form method="POST" action="/cursos/{{ $curso->id }}">
    @csrf
    @method('patch')
    @include('cursos.partials.form')
  </form>
@endsection