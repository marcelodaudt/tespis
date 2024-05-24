@extends('layouts.app')

@section('content')
  <form method="POST" action="/docentes">
    @csrf
    @include('docentes.partials.form')
  </form>
@endsection