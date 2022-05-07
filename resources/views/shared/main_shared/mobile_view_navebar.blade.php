<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar__button">
        <img src="{{ asset('icons/home.svg') }}">
    </a>

    <a href="#" class="navbar__button">
        <img src="{{ asset('icons/search.svg') }}" />
    </a>

    <a href="#" class="navbar__button">
        <img src="{{ asset('image/reels.svg') }}" />
    </a>

    <a href="#" class="navbar__button">
        <img src="{{ asset('icons/heart.svg') }}" /> </a>

    <a href="{{ route('profile') }}" <button class="navbar__button profile-button">
        <div class="profile-button__border"></div>
        <div class="profile-button__picture">
            <img src="storage/profile_image/{{ Auth::user()->user_image }}" alt="User Picture" />
        </div>
        </button>
    </a>
</nav>
