@extends('layouts.master')

@section('title')
  Random User Generator
@stop

@section('styling')
  <link href="/css/random.css" rel="stylesheet">
@stop

@section('jumbotron')
  <h1>Random User Generator</h1>
  <p>Create random and fake users to use in any project.</p>
@stop

@section('tools')
  <div class="tool-container">
    <h2>Select Your Options</h2>
    <form method="POST" action="/random-user-generator">
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <div class="form-group">
        {{-- Number of Users --}}
        <label for="number_of_users">Number of Users (9 max)</label>
        <input type="text" class="form-control" id="number_of_users" name="number_of_users" value="{{ old('number_of_users', $number_of_users) }}">
        <div class="error">
          @if($errors->get('number_of_users'))
            @foreach($errors->get('number_of_users') as $error)
              {{ $error }}
            @endforeach
          @endif
        </div>
      </div>
      <div class="form-group">
        {{-- Name --}}
        <input type="checkbox" id="name" name="name" @if (isset($name)) {{ 'checked' }} @endif>
        <label for="name">Name</label><br>
        {{-- Address --}}
        <input type="checkbox" id="address" name="address" @if (isset($address)) {{ 'checked' }} @endif>
        <label for="address">Address</label><br>
        {{-- Email --}}
        <input type="checkbox" id="email" name="email" @if (isset($email)) {{ 'checked' }} @endif>
        <label for="email">E-Mail</label><br>
        {{-- Phone Number --}}
        <input type="checkbox" id="phone_number" name="phone_number" @if (isset($phone_number)) {{ 'checked' }} @endif>
        <label for="phone_number">Phone Number</label><br>
        {{-- Username --}}
        <input type="checkbox" id="username" name="username" @if (isset($username)) {{ 'checked' }} @endif>
        <label for="username">Username</label><br>
        {{-- Password --}}
        <input type="checkbox" id="password" name="password" @if (isset($password)) {{ 'checked' }} @endif>
        <label for="password">Password</label><br>
        {{-- Birthday --}}
        <input type="checkbox" id="birthday" name="birthday" @if (isset($birthday)) {{ 'checked' }} @endif>
        <label for="birthday">Birthday</label><br>
        {{-- Blurb --}}
        <input type="checkbox" id="blurb" name="blurb" @if (isset($blurb)) {{ 'checked' }} @endif>
        <label for="blurb">Profile Description</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br>
  </div>
  <div class="result-container">
    <h2>Generated Users</h2>
    @if (isset($user_info))
      @foreach ($user_info as $user => $information)
        @if (isset($information['name']))
          <strong>Name: </strong>{{ $information['name'] }}<br>
        @endif
        @if (isset($information['address']))
          <strong>Address: </strong>{{ $information['address'] }}<br>
        @endif
        @if (isset($information['email']))
          <strong>Email: </strong>{{ $information['email'] }}<br>
        @endif
        @if (isset($information['phone_number']))
          <strong>Phone Number: </strong>{{ $information['phone_number'] }}<br>
        @endif
        @if (isset($information['username']))
          <strong>Username: </strong>{{ $information['username'] }}<br>
        @endif
        @if (isset($information['password']))
          <strong>Password: </strong>{{ $information['password'] }}<br>
        @endif
        @if (isset($information['birthday']))
          <strong>Birthday: </strong>{{ $information['birthday'] }}<br>
        @endif
        @if (isset($information['blurb']))
          <strong>Profile Description: </strong>{{ $information['blurb'] }}<br>
        @endif
        <br>
      @endforeach
    @else
      <p>Generated users will go here.</p>
    @endif
  </div>
@stop
