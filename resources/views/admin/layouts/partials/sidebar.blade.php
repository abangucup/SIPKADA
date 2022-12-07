<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if (auth()->user()->role == 'admin')
            <ul>
                <li class="{{Request::is('dashboard') ? 'active' : ''}}">
                    <a href="{{ route('dashboard')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="list-divider"></li>  
                <li class="{{Request::is('dashboard/kriteria') ? 'active' : ''}}">
                    <a href="{{ route('kriteria.index')}}"><i class="fa fa-percent"></i> 
                        <span>Kriteria</span>
                    </a>
                </li>
                
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Survey </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li>
                            <a href="{{ route('survey.index')}}" class="{{Request::is('dashboard/survey') ? 'active' : ''}}"> Penerima Bantuan </a>
                        </li>
                    </ul>
                </li>

                
                <li class="{{Request::is('dashboard/rank') ?? Request::is('dashboard/rank/filter') ? 'active' : ''}}">
                    <a href="{{ route('rank')}}"><i class="fa fa-trophy"></i><span>Rangking</span></a>
                </li>
                <li class="{{Request::is('dashboard/kelurahan') ? 'active' : ''}}">
                    <a href="{{ route('kelurahan.index')}}"><i class="fa fa-map"></i><span>Kelurahan</span></a>
                </li>
                <li class="{{Request::is('dashboard/user') ? 'active' : ''}}">
                    <a href="{{ route('user.index')}}"><i class="fa fa-user"></i><span>User</span></a>
                </li>
                {{-- <li class="{{Request::is('dashboard/laporan') ? 'active' : ''}}">
                    <a href="pricing.html"><i class="fas fa-book"></i> <span>Laporan</span></a>
                </li> --}}
            </ul>
            @elseif(auth()->user()->role == 'kelurahan')
            <ul>
                <li class="{{Request::is('kelurahan') ? 'active' : ''}}">
                    <a href="{{ route('dashboard.kelurahan')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{Request::is('kelurahan/penerima') ? 'active' : ''}}">
                    <a href="{{ route('penerima.index')}}"><i class="fa fa-hand-holding-heart"></i><span>Data Penerima</span></a>
                </li>
                <li class="{{Request::is('kelurahan/detail') ? 'active' : ''}}">
                    <a href="{{ route('penerima.detail')}}"><i class="fa fa-hand-holding-heart"></i><span>Detail Perhitungan</span></a>
                </li>
                <li class="{{Request::is('kelurahan/laporan') ? 'active' : ''}}">
                    <a href="{{route('laporan.penerima')}}"><i class="fas fa-book"></i> <span>Laporan</span></a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</div>