<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | RPL</a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">RPL</a>
        </div>

        <ul class="sidebar-menu">

    <li class="menu-header">Menu</li>

    <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="{{ Request::is('product*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.product') }}">
            <i class="fas fa-box"></i>
            <span>Produk</span>
        </a>
    </li>


    <li class="{{ Request::is('history*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.history') }}">
            <i class="fas fa-book"></i>
            <span>Riwayat Pembelian</span>
        </a>
    </li>

    <li class="{{ Request::is('flash-sale*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.flashsale') }}">
            <i class="fas fa-tags"></i>
            <span>Flash Sale</span>
        </a>
    </li>

</ul>
    </aside>
</div>