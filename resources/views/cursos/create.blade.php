@extends('layouts.app')

@section('content')
  <form method="POST" action="/cursos">
    @csrf
    @include('cursos.partials.form')
  </form>
@endsection