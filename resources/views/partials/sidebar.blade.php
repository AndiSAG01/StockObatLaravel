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
   <hr class="sidebar-divider">
  <li class="nav-item">
   <a class="nav-link" href="{{ route('user.index') }}">
    <i class="fas fa-solid fa-user"></i>
     <span>Data User</span>
   </a>
 </li>
   <hr class="sidebar-divider">
  <li class="nav-item">
   <a class="nav-link" href="{{ route('supplier.index') }}">
    <i class="fas fa-solid fa-users"></i>
     <span>Data Supplier</span>
   </a>
 </li>
   <hr class="sidebar-divider">
   <li class="nav-item">
    <a class="nav-link" href="{{ route('medicines.index') }}">
      <i class="fas fa-solid fa-tablets"></i>
      <span>Data Obat</span>
    </a>
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
 </ul>