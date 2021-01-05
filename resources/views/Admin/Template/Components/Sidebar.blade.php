<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{--    <a href="{{route('admin_dashboard')}}" class="brand-link">--}}
    {{--        <img src="{{asset('Admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"--}}
    {{--             class="brand-image img-circle elevation-3" style="opacity: .8">--}}
    {{--        <span class="brand-text font-weight-light">Admin</span>--}}
    {{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('Admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{strtoupper(Auth::user()->username)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin_dashboard')}}"
                        class="nav-link {{request()->is('*dashboard*')? "active":""}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">LAYANAN INFORMASI</li>
                <li class="nav-item has-treeview {{request()->is('*home*')? "menu-open":""}}">
                    <a href="#" class="nav-link {{request()->is('*home*')? "active":""}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin_home_infodesa')}}"
                                class="nav-link {{request()->is('*infodesa*')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Desa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin_home_perangkatdesa')}}"
                                class="nav-link {{request()->is('*perangkatdesa*')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perangkat Desa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin_home_bpd')}}"
                                class="nav-link {{request()->is('*bpd*')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BPD</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_berita_index')}}"
                        class="nav-link {{request()->is('*berita*')? 'active':''}}">
                        <i class="nav-icon fas fa-newspaper"></i></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin_tanyajawab')}}"
                        class="nav-link {{request()->is('*tanyajawab*')? 'active':''}}">
                        <i class="nav-icon fas fa-hands-helping"></i></i>
                        <p>
                            Tanya Jawab
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('admin_transparansi_index')}}"
                        class="nav-link {{request()->is('*transparansi*')? 'active':''}}">
                        <i class="nav-icon fas fa-money-bill-wave"></i></i>
                        <p>
                            Transparansi Desa
                        </p>
                    </a>
                </li>

                <li class="nav-header">LAYANAN ADMINISTRATIF</li>
                <li class="nav-item">
                    <a href="{{route('data_kk_index')}}"
                        class="nav-link {{request()->is('*kartu-keluarga*')? 'active':''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kartu Keluarga
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{route('admin_surat_permohonan_index')}}"
                class="nav-link {{request()->is('*surat/permohonan*')? 'active':''}}">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                    Surat Permohonan
                </p>
                </a>
                </li> --}}
                <li class="nav-item has-treeview {{request()->is('*surat*')? "menu-open":""}}">
                    <a href="#" class="nav-link {{request()->is('*surat*')? "active":""}}">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            Surat
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin_surat_permohonan_index')}}"
                                class="nav-link {{request()->is('*surat/permohonan*')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permohonan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin_surat_pengantar_pindah_index')}}"
                                class="nav-link {{request()->is('*surat/pengantar-pindah')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengantar Pindah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin_template_surat_index')}}"
                                class="nav-link {{request()->is('*surat/template*')? "active":""}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Template</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">ARSIP INTERNAL</li>
                <li class="nav-item">
                    <a href="{{route('admin_kritiksaran')}}"
                        class="nav-link {{request()->is('*arsip-statis*')? 'active':''}}">
                        <i class="nav-icon fas fa-award"></i>
                        <p>
                            Arsip Statis
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('posyandu.index')}}" class="nav-link {{request()->is('*arsip-dinamis*')? 'active':''}}">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>
                            Arsip Dinamis
                        </p>
                    </a>
                </li>

                <li class="nav-header">EVALUASI PELAYANAN</li>
                <li class="nav-item">
                    <a href="{{route('admin_kritiksaran')}}"
                        class="nav-link {{request()->is('*kritiksaran*')? 'active':''}}">
                        <i class="nav-icon fas fa-award"></i>
                        <p>
                            Kritik dan Saran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('posyandu.index')}}" class="nav-link {{request()->is('*posyandu*')? 'active':''}}">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p>
                            Posyandu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin_pengaturan')}}"
                        class="nav-link {{request()->is('*pengaturan*')? 'active':''}}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
