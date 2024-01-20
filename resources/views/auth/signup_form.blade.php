@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
  <div class="form-container">
    <h1 class="form-title">{{ $pageTitle }}</h1>
    <form
      class="form"
      method="POST"
      action="{{ route('auth.signup') }}"
    >
      @csrf

      <div class="form-item">
        <label>Name:</label>
        <input
          class="form-input" 
          type="text" 
          value="{{ old('name') }}"
          name="name"
        >
        @error('name')
          <div class="alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-item">
        <label>Email:</label>
        <input
          class="form-input"
          type="text"
          value="{{ old('email') }}"
          name="email"
        >
        @error('email')
          <div class="alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-item">
        <label>Password:</label>
        <input
          class="form-input"
          type="password"
          value=""
          name="password"
        >
        @error('password')
          <div class="alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="form-button">Submit</button>
    </form>
  </div>
@endsection