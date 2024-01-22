@extends('layouts.master')

@section('pageTitle', 'Home') 

@section('main')
  <div class="container">
    <div class="main">
      <div class="task-summary-container">
     
        @if (Auth::check())
          <h1 class="task-summary-greeting">
            Hi, {{ Auth::user()->name }} !
          </h1>
        @else
          <h1 class="task-summary-greeting">Hi, Guest!</h1>
        @endif 
       <h1 class="task-summary-heading">Summary of Your Tasks</h1>

      <div  class="task-summary-list">
        <span class="material-icons">check_circle</span>
        <h2>You have completed {{ $completed_count }} task</h2>
      </div>

      <div class="task-summary-list">
        <span class="material-icons">list</span>
        <h2>You still have {{ $uncompleted_count }} tasks left</h2>
      </div>
    </div>
  </div>
@endsection