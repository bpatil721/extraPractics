<div>
   <div class="container-fluide">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.user') }}">Users</a></li>
                            <li><a href="/admin/posts">Posts</a></li>
                            <li><a href="/admin/categories">Categories</a></li>
                        </ul>
                    </div>
                    <button id="logout" data-url="{{ route('admin-logout') }}" data-redirect="{{ url('/admin-login') }}" class="btn btn-primary">Logout</button>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        {{ $slot }}
                    </div>
                </div>
            </div>
   </div>
</div>