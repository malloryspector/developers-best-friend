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
      <input type='hidden' value='{{ csrf_token() }}' name='_token'>
      <div class="form-group">
        {{-- Word Count Section --}}
        <label for="number_of_words">Number of Words</label>
        <input type="text" class="form-control" id="number_of_words" name="number_of_words" value="{{ $number_of_words or 'Number of Words (9 max)' }}">
        @if($errors->get('number_of_words'))
          @foreach($errors->get('number_of_words') as $error)
            {{ $error }}
          @endforeach
        @endif
      </div>
      <div class="form-group">
        {{-- Number Option Section --}}
        <input type="checkbox" id="add_a_number" name="add_a_number" @if (isset($add_a_number)) {{ "checked='checked'" }} @endif>
        <label for="add_a_number">Add a number</label>
        <select class="form-control" id="additional_numbers" name="additional_numbers">
          <option @if (isset($additional_numbers) && $additional_numbers == 1) {{ "selected='true'" }} @endif>1</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 2) {{ "selected='true'" }} @endif>2</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 3) {{ "selected='true'" }} @endif>3</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 4) {{ "selected='true'" }} @endif>4</option>
          <option @if (isset($additional_numbers) && $additional_numbers == 5) {{ "selected='true'" }} @endif>5</option>
        </select>
        <label for="additional_numbers">number(s) total</label>
      </div>
      <div class="form-group">
        {{-- Symbol Option Section --}}
        <input type="checkbox" id="add_a_symbol" name="add_a_symbol" @if (isset($add_a_symbol)) {{ "checked='checked'" }} @endif>
        <label for="add_a_symbol">Add a symbol</label>
        <select class="form-control" id="additional_symbols" name="additional_symbols">
          <option @if (isset($additional_symbols) && $additional_symbols == 1) {{ "selected='true'" }} @endif>1</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 2) {{ "selected='true'" }} @endif>2</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 3) {{ "selected='true'" }} @endif>3</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 4) {{ "selected='true'" }} @endif>4</option>
          <option @if (isset($additional_symbols) && $additional_symbols == 5) {{ "selected='true'" }} @endif>5</option>
        </select>
        <label for="additional_symbols">symbol(s) total</label>
      </div>
      <div class="form-group">
        {{-- Separator Section --}}
        <label for="separator">Choose your separator</label>
        <select class="form-control" id="separator" name="separator">
          <option @if (isset($separator) && $separator == "-") {{ "selected='true'" }} @endif>hyphen</option>
          <option @if (isset($separator) && $separator == " ") {{ "selected='true'" }} @endif>space</option>
          <option @if (isset($separator) && $separator == "") {{ "selected='true'" }} @endif>no space</option>
          <option @if (isset($separator) && $separator == ".") {{ "selected='true'" }} @endif>dot</option>
        </select>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Output</h2>
    @if (isset($password))
      <p>{{ $password }}</p>
    @endif
  </div>
@stop
