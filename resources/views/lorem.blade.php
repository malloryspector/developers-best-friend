@extends('layouts.master')

@section('title')
  Lorem Ipsum Generator
@stop

@section('styling')
  <link href="/css/lorem.css" rel="stylesheet">
@stop

@section('jumbotron')
  <h1>Lorem Ipsum Generator</h1>
  <p>A convenient way to fill your mock-ups and applications with content.</p>
@stop

@section('tools')
  <div class="tool-container">
    <h2>Select Your Options</h2>
    <form method="POST" action="/lorem-ipsum">
      <input type='hidden'value='{{ csrf_token() }}' name='_token' >
      <div class="form-group">
        {{-- Number of Paragraphs --}}
        <label for="number_of_paragraphs">Number of Paragraphs (9 max)</label>
        <input type="text" class="form-control" id="number_of_paragraphs" name="number_of_paragraphs" value="{{ old('number_of_paragraphs', $number_of_paragraphs) }}">
        <div class="error">
          @if($errors->get('number_of_paragraphs'))
            @foreach($errors->get('number_of_paragraphs') as $error)
              {{ $error }}
            @endforeach
          @endif
        </div>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br>
  </div>
  <div class="result-container">
    <h2>Paragraphs</h2>
    @if (isset($paragraphs))
      @foreach ($paragraphs as $paragraph)
        <p>{{ $paragraph }}</p>
      @endforeach
    @else
        <p>Generated paragraphs will go here.</p>
    @endif
  </div>
@stop
