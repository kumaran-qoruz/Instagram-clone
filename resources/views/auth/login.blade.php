
<link rel="stylesheet" href="{{asset('css/login.css')}}" class="hrref">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    class="hre">


<div class="container">
    <div class="box">
        <div class="heading"></div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <input id="username" type="name"  name="email" placeholder="Phone number, username, or email" />
                <label for="username">Phone number, username, or email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="field">
                <input id="password" type="password" placeholder="password" name="password"
                required autocomplete="current-password">
                <label for="password">Password</label>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="login-button" title="login">Log In</button>
            <div class="separator">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
            </div>
            <div class="other">
                <button class="fb-login-btn" type="button">
                    <i class="fa fa-facebook-official fb-icon"></i>
                    <span class="">Log in with Facebook</span>
                </button>
                @if (Route::has('password.request'))
                    <a class="forgot-password" href=" {{ route('password.request') }}">Forgot password?</a>

                @endif

            </div>
        </form>
    </div>
    <div class="box">
        <p>Don't have an account? <a class="signup" href="{{route('register')}}">Sign Up</a></p>
    </div>
</div>

