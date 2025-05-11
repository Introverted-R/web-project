<header>
    <h1>Admin Dashboard</h1>
    <div class="user-controls">
        <a href="{{ url('profile') }}">Profile</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>