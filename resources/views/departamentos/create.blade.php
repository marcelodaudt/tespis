@extends('layouts.app')

@section('content')
  <form method="POST" action="/departamentos">
    @csrf
    @include('departamentos.partials.form')
  </form>
@endsection