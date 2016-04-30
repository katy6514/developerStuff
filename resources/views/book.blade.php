@extends('_master')

@section('header')
  <h1>Book Create example</h1>
@stop


@section('content')

  <form method='POST' action='/books/create'>
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <input type='text' name='title'>
      <input type='submit' value='Submit'>
  </form>


@stop
