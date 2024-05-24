@extends('layouts.app')

@section('content')
  <form method="POST" action="/alunos">
    @csrf
    @include('alunos.partials.form')
  </form>
@endsection