@extends('layouts.app')

@section('content')
  <form method="POST" action="/espetaculos/{{ $espetaculo->id }}">
    @csrf
    @method('patch')
    @include('espetaculos.partials.form')
  </form>
@endsection