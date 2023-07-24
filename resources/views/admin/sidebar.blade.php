<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-center w-100">
        <a href="{{ route('adminindex') }}"class="brand-link">
            {{-- <img src="{{ asset('/lte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"> --}}
            <i class="fa-brands fa-uniregistry"></i>
            <span class="brand-text font-weight-light">MKM</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('adminindex') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showlistuser') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            List Users
                            <i class="right fa-solid fa-arrow-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showlistowner') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>
                            List Owners
                            <i class="right fa-solid fa-arrow-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showlistumkm') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-building"></i>
                        <p>
                            List UMKM
                            <i class="right fa-solid fa-arrow-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showlistproduct') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-bag-shopping"></i>
                        <p>
                            List Products
                            <i class="right fa-solid fa-arrow-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('showlisttransaction') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill"></i>
                        <p>
                            List Transactions
                            <i class="right fa-solid fa-arrow-right"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
