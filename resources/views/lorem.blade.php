@extends('layouts.master')

@section('title')
  Lorem Ipsum Generator
@stop

@section('jumbotron')
  <h1>Lorem Ipsum Generator</h1>
  <p>Text goes here</p>
@stop

@section('tools')
  <div class="col-md-6">
    <h2>Form</h2>
    <form method="POST" action="/lorem-ipsum">
      <input type='hidden'value='{{ csrf_token() }}' name='_token' >
      <div class="form-group">
        {{-- Number of Paragraphs --}}
        <label for="number_of_paragraphs">Number of Paragraphs</label>
        <input type="text" class="form-control" id="number_of_paragraphs" name="number_of_paragraphs" placeholder="Number of Paragraphs">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Output</h2>
    @if (isset($paragraphs))
      @foreach ($paragraphs as $paragraph)
        <p>{{ $paragraph }}</p>
      @endforeach
    @endif
  </div>
@stop
