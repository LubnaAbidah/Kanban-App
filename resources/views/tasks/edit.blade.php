@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
  <div class="form-container">
    <h1 class="form-title">{{ $pageTitle }}</h1>
    <form class="form" method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-item">
        <label>Name:</label>
        <input
        input class="form-input" type="text" value="{{ old('name', $task->name) }}" name="name">
      </div>

      <div class="form-item">
        <label>Detail:</label>
        <textarea class="form-text-area" name="detail">{{ old('detail', $task->detail) }}</textarea>
      </div>

      <div class="form-item">
        <label>Due Date:</label>
        <input
          class="form-input"
          type="date"
          value="{{ old('due_date', $task->due_date) }}"
        name="due_date">
      </div>

      <div class="form-item">
        <label>Progress:</label>
        <select class="form-input" data-value="{{ $task ? $task->value : old('status') }}">
        <option @if(old('status') == 'not_started') selected @endif value="not_started">
            Not Started
          </option>
          <option @if(old('status') == 'in_progress') selected @endif value="in_progress">
            In Progress
          </option>
          <option @if(old('status') == 'in_review') selected @endif value="in_review">
            Waiting/In Review
          </option>
          <option @if(old('status') == 'completed') selected @endif value="completed">
            Completed
          </option>
        </select>
      </div>
      <button type="submit" class="form-button">Submit</button>
    </form>
  </div>
@endsection