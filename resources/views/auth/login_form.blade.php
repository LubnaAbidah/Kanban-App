@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
  <div class="form-container">
    <h1 class="form-title">{{ $pageTitle }}</h1>
    <form class="form" method="POST" action="{{ route('auth.login') }}">
      @csrf
      <div class="form-item">
        <label>Email:</label>
        <input class="form-input" type="text" value="{{ old('email') }}" name="email" required>
        @error('email')
          <div class="alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-item">
        <label>Password:</label>
        <input class="form-input" type="password" value="" name="password" required>
        @error('password')
          <div class="alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="form-button">Submit</button>
    </form>

    <p class="auth-link">You don't have an account? <a href="{{ route('auth.signup') }}">Register here</a></p>
  </div>
@endsection