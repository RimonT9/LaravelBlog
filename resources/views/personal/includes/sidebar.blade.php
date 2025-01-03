<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Main</p>
                </a>
            </li>
        </ul>
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('personal.liked.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>Liked of posts</p>
                </a>
            </li>
        </ul>
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>Comments</p>
                </a>
            </li>
        </ul>
    </div>
</aside>