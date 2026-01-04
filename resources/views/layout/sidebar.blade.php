        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">
            @auth
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('image/logo.png') }}" width="40" height="40" class="img-profile rounded-circle">
                </div>
                <div class="sidebar-brand-text mx-1">Rizkies Cheww</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request() -> is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Akun Pengguna -->
            <li class="nav-item {{ request() -> is('user') ? 'active' : '' }}">
                <a class="nav-link" href="/user">
                    <i class="fas fa-user"></i>
                    <span>Manajemen Akun</span></a>
            </li>            
            
            <!-- Nav Item - Manajemen Produk -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduk"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-box"></i>
                    <span>Manajemen Produk</span>
                </a>
                <div id="collapseProduk" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Produk</h6>
                        <a class="collapse-item" href="/produk">Produk</a>
                        <a class="collapse-item" href="/kategori">Kategori</a>
                        <a class="collapse-item" href="/promosi">Promosi</a>
                    </div>
                </div>
            </li> 

            <!-- Nav Item - Manajemen Inventori -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventori"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-warehouse"></i>
                    <span>Manajemen Inventori</span>
                </a>
                <div id="collapseInventori" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Inventori</h6>
                        <a class="collapse-item" href="/supplier">Supplier</a>
                        <a class="collapse-item" href="/bahan">Bahan</a>
                    </div>
                </div>
            </li> 

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>
            
            
            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTransaksi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi</h6>
                        <a class="collapse-item" href="/transaksi">Transaksi</a>
                        <a class="collapse-item" href="/detailTransaksi">Detail Transaksi</a>
                        <a class="collapse-item" href="/pembayaran">Pembayaran</a>
                    </div>
                </div>
            </li> 

            <!-- Heading -->
            <div class="sidebar-heading">
                Pelayanan
            </div>

            <!-- Nav Item - Inbox/Pengaduan -->
            <li class="nav-item {{ request() -> is('inbox') ? 'active' : '' }}">
                <a class="nav-link" href="/inbox">
                    <i class="fas fa-inbox"></i>
                    <span>Inbox</span></a>
            </li>

            <li class="nav-item {{ request() -> is('testimoni') ? 'active' : '' }}">
                <a class="nav-link" href="/testimoni">
                    <i class="fas fa-comment-dots"></i>
                    <span>Testimoni</span></a>
            </li>
            @endauth
        </ul>