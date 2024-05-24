@extends('layouts.app')

@section('content')
  <form method="POST" action="/disciplinas">
    @csrf
    @include('disciplinas.partials.form')
  </form>
@endsection