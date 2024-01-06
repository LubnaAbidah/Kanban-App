@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
  <div class="form-container">
    <h1 class="form-title">{{ $pageTitle }}</h1>
    <form
      class="form"
      method="POST"
      action="{{ route('tasks.destroy', ['id' => $task->id]) }}"
    >
      @method('DELETE')
      @csrf
      <p>You are going to delete <strong>"{{ $task->name }}"</strong></p>
        <p>Are you sure?</p>
        <button
          type="submit"
          class="form-button"
        >
          Yes, delete it forever
        </button>
    </form>
  </div>
@endsection