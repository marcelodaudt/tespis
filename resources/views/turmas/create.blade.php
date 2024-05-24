@extends('layouts.app')

@section('content')
  <form method="POST" action="/turmas">
    @csrf
    @include('turmas.partials.form')
  </form>
@endsection