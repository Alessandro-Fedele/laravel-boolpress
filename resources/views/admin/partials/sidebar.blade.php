<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    @if(Route::has("admin.posts.index"))
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.posts.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Post</span></a>
    </li>
    @endif
</ul>