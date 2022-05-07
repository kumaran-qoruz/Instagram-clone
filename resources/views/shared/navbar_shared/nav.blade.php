<link rel="stylesheet" href="{{ asset('css/instamain.css') }}">

<header class="header">
    <nav class="header__content">
        <div class="header__buttons">
            <a href="{{ route('home') }}" class="header__home">
                <img src="{{ asset('image/logo.PNG') }}" class="brand-img instalogo" alt="">
            </a>
        </div>

        <div class="header__search">
            <input type="text" placeholder="Search" />
            <img src="{{ asset('icons/search.svg') }}" class="brand-img" alt="">
        </div>

        <div class="header__buttons header__buttons--mobile">
            <a href="#">
                <img src="{{ asset('icons/addnew.svg') }}">
            </a>

            <a href="#">
                <img src="{{ asset('icons/messager.svg') }}">
            </a>
        </div>

        <div class="header__buttons header__buttons--desktop">
            <a href="{{ route('home') }}">
                <img src="{{ asset('icons/home.svg') }}" />

            </a>
            <a class="" href="#">
                <img src="{{ asset('icons/messager.svg') }}" />
            </a>
            <a class="" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <img src="{{ asset('icons/addnew.svg') }}" />
            </a>
            <a class="" href="#">
                <img src="{{ asset('icons/compass.svg') }}" />
            </a>
            <a class="" href="#">
                <img src="{{ asset('icons/heart.svg') }}" />
            </a>
            <div class="dropdown ">

                <img class="dropdown-toggle profile-button__picture"
                    src="storage/profile_image/{{ Auth::user()->user_image }}" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false" />

                <ul class="dropdown-menu mt-2  ml-3 dropdown-menu-lg-end containers" aria-labelledby="dropdownMenuLink">

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                            <img src="{{ asset('icons/profile.svg') }}" />
                            <span class="ml-3">MyProfile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <img src="{{ asset('icons/saved.svg') }}" />
                            <span class="ml-3">save</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <img src="{{ asset('icons/setting.svg') }}" />
                            <span class="ml-3">setting</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('register') }}">
                            <img src="{{ asset('icons/switchacc.svg') }}" />
                            <span class="ml-3">switch acount</span>
                        </a>
                    </li>

                    <li>
                        <hr class="m-0">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <div class="container__arrow container__arrow--tr">
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>
@include('shared.navbar_shared.modal')

