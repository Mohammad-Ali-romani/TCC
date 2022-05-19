<div>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> {{__('views/component.technical computer college')}} </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="عرض/إخفاء لوحة التنقل">
          <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="{{__('views/component.search')}}" aria-label="{{__('views/component.search')}}">
        <div class="navbar-nav">
{{--          <div class="nav-item text-nowrap">--}}
{{--            <a class="nav-link px-3" href="Sing in.html"> {{__('views/component.logout')}}</a>--}}
{{--          </div>--}}
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- line 15 commented by mohammad Alqahf  2022/5/14  5:22  cuz doing error in page programs --}}
{{--                     {{ Auth::user()->name }}--}}
                </a>


                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a href="{{ url('/profile') }}" class="dropdown-item">Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </div><a href=""></a>
      </header>
</div>
