@extends('layouts.master')

@section('title')
  Random User Generator
@stop

@section('jumbotron')
  <h1>Random User Generator</h1>
  <p>Text goes here</p>
@stop

@section('tools')
  <div class="col-md-6">
    <h2>Form</h2>
    <form method="POST" action="/random-user-generator">
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <div class="form-group">
        <input type="checkbox" id="first_name">
        <label for="first_name">First Name</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Output</h2>
  </div>
@stop
