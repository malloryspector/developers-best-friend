@extends('layouts.master')

@section('title')
  xkcd Style Password Generator
@stop

@section('jumbotron')
  <h1>xkcd Style Password Generator</h1>
  <p>Text goes here</p>
@stop

@section('tools')
  <div class="col-md-6">
    <h2>Form</h2>
    <form method="POST" action="/xkcd-password-generator">
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <div class="form-group">
        {{-- Word Count Section --}}
        <label for="number_of_words">Number of Words</label>
        <input type="text" class="form-control" id="number_of_words" placeholder="Number of Words (max 9)">
      </div>
      <div class="form-group">
        {{-- Number Option Section --}}
        <input type="checkbox" id="add_a_number">
        <label for="add_a_number">Add a number</label>
        <select class="form-control" id="additional_numbers">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <label for="additional_numbers">number(s) total</label>
      </div>
      <div class="form-group">
        {{-- Symbol Option Section --}}
        <input type="checkbox" id="add_a_symbol">
        <label for="add_a_symbol">Add a symbol</label>
        <select class="form-control" id="additional_symbols">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <label for="additional_symbols">symbol(s) total</label>
      </div>
      <div class="form-group">
        {{-- Separator Section --}}
        <label for="separator">Choose your separator</label>
        <select class="form-control" id="separator">
          <option>hyphen</option>
          <option>space</option>
          <option>no space</option>
          <option>dot</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Output</h2>
  </div>
@stop
