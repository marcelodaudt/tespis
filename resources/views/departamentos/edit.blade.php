@extends('layouts.app')

@section('content')
  <form method="POST" action="/departamentos/{{ $departamento->id }}">
    @csrf
    @method('patch')
    @include('departamentos.partials.form')
  </form>
@endsection