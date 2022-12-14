{{-- header --}}
<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{ asset('assets/img/logo_sistem.png')}}" width="50" height="70" alt="logo">
            <span class="logoclass">SIPKADA</span>
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
    <a class="mobile_btn" id="mobile_btn"><i class="fas fa-bars"></i> </a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('assets/img/logo_sistem.png')}}" width="31"
                        alt="Soeng Souy">
                </span>
                <span>{{ auth()->user()->name}}</span>
            </a>
            
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm"> <img src="{{ asset('assets/img/logo_sistem.png')}}"
                            alt="User Image" class="avatar-img rounded-circle"> </div>
                    <div class="user-text">
                        <h6>{{ auth()->user()->name}}</h6>
                        <p class="text-center mt-2">{{auth()->user()->kelurahan->nama ?? ''}}</p>
                    </div>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                </form>
            </div>
        </li>
    </ul>
    
</div>