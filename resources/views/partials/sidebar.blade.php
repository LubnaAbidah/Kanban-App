<div class="sidebar">
  <div class="sidebar-container">
  <a class="sidebar-link" href="{{ route('home') }}"> <!-- Diperbarui -->
      <span class="material-icons sidebar-icon">home</span>
      <p class="sidebar-text">Home</p>
    </a>
    
    <a class="sidebar-link" href="{{ route('tasks.index') }}">
      <span class="material-icons sidebar-icon">list</span>
      <p class="sidebar-text">Task List</p>
    </a>

    <a class="sidebar-link" href="{{ route('tasks.progress') }}">
      <span class="material-icons sidebar-icon">check_box</span>
      <p class="sidebar-text">Task Progress</p>
    </a>
    
    @if (Auth::check())
      <a class="sidebar-link" href=""
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="material-icons sidebar-icon">logout</span>
        <p class="sidebar-text">Logout</p>
      </a>
      <form id="logout-form" action="" method="POST" style="display: none;">
        @csrf
      </form>
    @endif
  </div>
</div>