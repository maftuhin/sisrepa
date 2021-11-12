<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('image/icon.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin SiRePa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('image/ic_avatar.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/transaction" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Transactions</p>
                    </a>
                </li>
                @if(Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/skpd" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>SKPD</p>
                    </a>
                </li>
                @endif
                <li class="nav-header">AKUN</li>
                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#confirm-logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="text">Log out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="modal fade" id="confirm-logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <b>Keluar</b>
                </div>
                <div class="modal-body">
                    Keluar Dari Aplikasi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="/logout" class="btn btn-danger btn-ok"><b>Keluar</b></a>
                </div>
            </div>
        </div>
    </div>