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
  <div class="col-md-4 formbackground">
    <h2>Select Your Options</h2>
    <form method="POST" action="/random-user-generator">
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      <div class="form-group">
        {{-- Number of Users --}}
        <label for="number_of_users">Number of Users</label>
        <input type="text" class="form-control" id="number_of_users" name="number_of_users" value="{{ $number_of_users or 'Number of Users (9 max)' }}">
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
        <input type="checkbox" id="name" name="name" @if (isset($name)) {{ "checked='checked'" }} @endif>
        <label for="name">Name</label><br>
        {{-- Address --}}
        <input type="checkbox" id="address" name="address" @if (isset($address)) {{ "checked='checked'" }} @endif>
        <label for="address">Address</label><br>
        {{-- Email --}}
        <input type="checkbox" id="email" name="email" @if (isset($email)) {{ "checked='checked'" }} @endif>
        <label for="email">E-Mail</label><br>
        {{-- Phone Number --}}
        <input type="checkbox" id="phone_number" name="phone_number" @if (isset($phone_number)) {{ "checked='checked'" }} @endif>
        <label for="phone_number">Phone Number</label>
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <br>
  </div>
  <div class="col-md-8">
    <h2>Generated Users</h2>
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
