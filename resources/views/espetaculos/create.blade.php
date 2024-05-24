@extends('layouts.app')

@section('content')
  <form method="POST" action="/espetaculos">
    @csrf
    @include('espetaculos.partials.form')
  </form>
@endsection