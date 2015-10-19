@extends('layouts.master')

@section('title')
  xkcd Style Password Generator
@stop

@section('styling')
  <link href="/css/password.css" rel="stylesheet">
@stop

@section('jumbotron')
  <h1>xkcd Style Password Generator</h1>
  <p>Generate password phrases that are difficult to guess but easy to remember.</p>
@stop

@section('tools')
  <div class="col-md-4 formbackground">
    <h2>Select Your Options</h2>
    <form method="POST" action="/xkcd-password-generator">
      <input type='hidden' value='{{ csrf_token() }}' name='_token'>
      <div class="form-group">
        {{-- Word Count Section --}}
        <label for="number_of_words">Number of Words (9 max)</label>
        <input type="text" class="form-control" id="number_of_words" name="number_of_words" value="{{ old('number_of_words', $number_of_words) }}">
        <div class="error">
          @if($errors->get('number_of_words'))
            @foreach($errors->get('number_of_words') as $error)
              {{ $error }}
            @endforeach
          @endif
        </div>
      </div>
      <div class="form-group">
        {{-- Number Option Section --}}
        <input type="checkbox" id="add_a_number" name="add_a_number" @if (isset($add_a_number)) {{ "checked='checked'" }} @endif>
        <label for="add_a_number">Add a number</label><br>
        <label for="additional_numbers">How many numbers?</label>
        <select class="form-control" id="additional_numbers" name="additional_numbers">
          <option @if (isset($additional_numbers) && $additional_numbers == 1) {{ "selected='true'" }} @endif>1</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 2) {{ "selected='true'" }} @endif>2</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 3) {{ "selected='true'" }} @endif>3</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 4) {{ "selected='true'" }} @endif>4</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 5) {{ "selected='true'" }} @endif>5</option>
        </select>
      </div>
      <div class="form-group">
        {{-- Symbol Option Section --}}
        <input type="checkbox" id="add_a_symbol" name="add_a_symbol" @if (isset($add_a_symbol)) {{ "checked='checked'" }} @endif>
        <label for="add_a_symbol">Add a symbol</label><br>
        <label for="additional_symbols">How many symbols?</label>
        <select class="form-control" id="additional_symbols" name="additional_symbols">
          <option @if (isset($additional_symbols) && $additional_symbols == 1) {{ "selected='true'" }} @endif>1</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 2) {{ "selected='true'" }} @endif>2</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 3) {{ "selected='true'" }} @endif>3</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 4) {{ "selected='true'" }} @endif>4</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 5) {{ "selected='true'" }} @endif>5</option>
        </select>
      </div>
      <div class="form-group">
        {{-- Separator Section --}}
        <label for="separator">Choose your separator</label>
        <select class="form-control" id="separator" name="separator">
          <option @if (isset($separator) && $separator == "hyphen") {{ "selected='true'" }} @endif>hyphen</option>
          <option @if (isset($separator) && $separator == "space") {{ "selected='true'" }} @endif>space</option>
          <option @if (isset($separator) && $separator == "no space") {{ "selected='true'" }} @endif>no space</option>
          <option @if (isset($separator) && $separator == "dot") {{ "selected='true'" }} @endif>dot</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br>
  </div>
  <div class="col-md-8">
    <h2>Password</h2>
    @if (isset($password))
      <h3>{{ $password }}</h3>
    @else
      <p>Generated password will go here.</p>
    @endif
  </div>
@stop
