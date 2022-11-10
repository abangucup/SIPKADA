<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{Request::is('dashboard') ? 'active' : ''}}"> <a href="{{ route('dashboard')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a> </li>
                <li class="{{Request::is('dashboard/bobot') ? 'active' : ''}}"> <a href="pricing.html"><i class="fa fa-percent"></i> <span>Bobot</span></a></li>
                <li class="{{Request::is('dashboard/penerima') ? 'active' : ''}}"> <a href="pricing.html"><i class="fa fa-hand-holding-heart"></i><span>Penerima Bantuan</span></a> </li>
                <li class="{{Request::is('dashboard/rank') ? 'active' : ''}}"> <a href="pricing.html"><i class="fa fe-table"></i><span>Rangking</span></a> </li>
                <li class="{{Request::is('dashboard/user') ? 'active' : ''}}"> <a href="{{ route('user.index')}}"><i class="fa fa-user"></i><span>User</span></a> </li>
                <li class="{{Request::is('dashboard/laporan') ? 'active' : ''}}"> <a href="pricing.html"><i class="fas fa-book"></i> <span>Laporan</span></a> </li>
            </ul>
        </div>
    </div>
</div>