@extends('layouts.master')

@section('title')
  Developer's Best Friend
@stop

@section('jumbotron')
  <h1>Developer's Best Friend</h1>
  <p>Just a few handy generators to help fill your site with content.</p>
@stop

@section('tools')
  <div class="col-md-4">
    <h2>Lorem Ipsum Generator</h2>
    <p>Need some filler text to populate your site? The Lorem Ipsum Generator tool is convenient for mock-ups or filling your application with content. Choose how many paragraphs you need and generate text with just a click of a button.</p>
    <a class="btn btn-default" href="/lorem-ipsum" role="button">Generate Lorem Ipsum</a>
  </div>
  <div class="col-md-4">
    <h2>Random User Generator</h2>
    <p>The random user generator is a simple tool to help create random and fake users to use in any project. Choose from 8 options of data to generate for each user.</p>
    <a class="btn btn-default" href="/random-user-generator" role="button">Generate Users</a>
  </div>
  <div class="col-md-4">
    <h2>xkcd Password Generator</h2>
    <p>Inspired by the xkcd password strength comic this application lets you generate a random password phrase based on the criteria you choose. This style of password is difficult to guess but easier to remember then generating a string of random numbers and letters.</p>
    <a class="btn btn-default" href="/xkcd-password-generator" role="button">Generate Passwords</a>
  </div>
@stop
