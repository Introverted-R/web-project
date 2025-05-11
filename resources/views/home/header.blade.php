<nav>
    <ul>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="#contact">About</a></li>
        <li><a href="#contact">Contact</a></li>
        
        @auth
        <li><a href="{{ url('post/create') }}">Create post</a></li>
        <li><a href="{{ url('post/fetch_posts') }}">My posts</a></li>
        <li class="dropdown">
            <button class="dropbtn">User Account</button>
            <div class="dropdown-content">
                <a href="{{ url('profile') }}">Profile</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @else
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
        <li>
            <form action="{{ route('posts.search') }}" method="GET">
                <input style="color:black" type="text" name="keyword" placeholder="Search posts...">
                <button type="submit">Search</button>
            </form>
        </li>
        <li>
           <form action="{{ route('posts.sort') }}" method="GET">
               <select name="sort_by" class="custom-select">
                   <option value="date">Sort by date</option>
                   <option value="user">Sort by user</option>
                   <option value="likes">Sort by likes</option>
               </select>
               <button type="submit">Sort</button>
           </form>
        </li>
    </ul>
</nav>
