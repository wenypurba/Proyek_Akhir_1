<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
					============================================= -->
					<div id="logo">
                        <a href="{{ url('/') }}" class="standard-logo mt-4" style="font-family: Lobster; font-weight: bold; font-size:25px; color: black; text-decoration:none;">Suplai <span style="font-family: Lobster; font-weight: bold; font-size:25px; color: green">Taniku</span></a>
                    </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul>
                    <!-- Mega Menu
                    ============================================= -->
                    <li><a href="{{ route('beranda.index') }}"  >Beranda</a></li>
                    @guest
                            @if (Route::has('login'))
                                <li><a href="{{ route('login') }}">{{ __('Masuk') }}</a></li>
                            @endif

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">{{ __('Daftar') }}</a></li>
                            @endif
                        @else

                            @can('role-create')
                            <li><a   href="{{ route('roles.index') }}">Role</a></li>
                            <li><a   href="{{ route('users.index') }}">Data Pengguna</a></li>
                            @endcan

                            @can('product-list')
                            <li><a   href="{{ route('products.index') }}">Produk</a></li>
                            <li><a   href="{{ route('users.index') }}">Edit Profil</a></li>

                            @endcan
                            <li><a   href="{{ route('logout') }}">Keluar</a></li>

                        @endguest
                </ul>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->


