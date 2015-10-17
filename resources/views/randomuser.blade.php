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
        {{-- Number of Users --}}
        <label for="number_of_users">Number of Users</label>
        <input type="text" class="form-control" id="number_of_users" name="number_of_users" placeholder="Number of Users">
      </div>
      <div class="form-group">
        {{-- Name --}}
        <input type="checkbox" id="name" name="name">
        <label for="name">Name</label><br>
        {{-- Address --}}
        <input type="checkbox" id="address" name="address">
        <label for="address">Address</label><br>
        {{-- Email --}}
        <input type="checkbox" id="email" name="email">
        <label for="email">E-Mail</label><br>
        {{-- Phone Number --}}
        <input type="checkbox" id="phone_number" name="phone_number">
        <label for="phone_number">Phone Number</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-6">
    <h2>Output</h2>
    @if (isset($user_info))
      @foreach ($user_info as $user => $information)
        @if (isset($information['name']))
          {{ $information['name'] }}<br>
        @endif
        @if (isset($information['address']))
          {{ $information['address'] }}<br>
        @endif
        @if (isset($information['email']))
          {{ $information['email'] }}<br>
        @endif
        @if (isset($information['phone_number']))
          {{ $information['phone_number'] }}<br>
        @endif
        <br>
      @endforeach
    @endif
  </div>
@stop
