<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="/assets/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-solid fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li>
    @if (Auth()->user()->isAdmin == true)

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-solid fa-user"></i>
                <span>Data User</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('drugs.laporan') }}">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Laporan Stock Obat Masuk</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('transaction.laporan') }}">
                <i class="fas fa-fw fa-columns"></i>
                <span>Laporan Obat Keluar</span>
            </a>
        </li>

        <hr class="sidebar-divider">

    @elseif (Auth()->user()->isAdmin == false)
    
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('supplier.index') }}">
                <i class="fas fa-solid fa-users"></i>
                <span>Data Supplier</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
              aria-controls="collapseTable">
              <i class="fas fa-fw fa-table"></i>
              <span>Manajeman Obat</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('type.index') }}">Jenis</a>
                <a class="collapse-item" href="{{ route('satuan.index') }}">Satuan</a>
                <a class="collapse-item" href="{{ route('brand.index') }}">Merek</a>
                <a class="collapse-item" href="{{ route('medicines.index') }}">Data Obat</a>
              </div>
            </div>
          </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('drugs.index') }}">
                <i class="fas fa-fw fa-window-maximize"></i>
                <span>Data Obat Masuk</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('transaction.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Data Obat Keluar</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('drugs.laporan') }}">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Laporan Obat Masuk</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('transaction.laporan') }}">
                <i class="fas fa-fw fa-columns"></i>
                <span>Laporan Obat Keluar</span>
            </a>
        </li>

        <hr class="sidebar-divider">

    @endif



</ul>
