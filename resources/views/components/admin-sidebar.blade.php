<aside class="admin-sidebar active"> 
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-kemenag.png') }}" alt="Logo">
        </div>
        <button class="menu-toggle-inside" id="sidebarTrigger">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> Dashboard
        </a>

        <a href="/admin/berita" class="nav-link {{ request()->is('admin/berita*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> Berita
        </a>

        <a href="/admin/struktural" class="nav-link {{ request()->is('admin/struktural*') ? 'active' : '' }}">
            <i class="bi bi-building"></i> Struktural Sekolah
        </a>

        <a href="/admin/ppdb" class="nav-link {{ request()->is('admin/ppdb*') ? 'active' : '' }}">
            <i class="bi bi-person-plus"></i> Kelola PPDB
        </a>

        <a href="/admin/daftar-siswa" class="nav-link {{ request()->is('admin/daftar-siswa*') ? 'active' : '' }}">
            <i class="bi bi-mortarboard"></i> Daftar Siswa
        </a>
        
        <a href="/admin/login" class="nav-link logout-link mt-auto">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </nav>
</aside>