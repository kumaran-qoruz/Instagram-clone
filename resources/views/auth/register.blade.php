<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    class="hre">
<link rel="stylesheet" href="{{asset('css/register.css')}}" class="href">

<main>
    <div class="page">
        <div class="header">
            <h1 class="logo"> <img src="https://i.imgur.com/zqpwkLQ.png" /></h1>
            <p>Sign up to see photos and videos from your friends.</p>
            <button><i class="fab fa-facebook-square"></i> Log in with Facebook</button>
            <div>
                <hr>
                <p>OR</p>
                <hr>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" type="text" placeholder="Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" placeholder="Full Name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                    value="{{ old('user_name') }}" required autocomplete="Username" placeholder="Username"
                    placeholder="Username" autofocus>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <button>Sign up</button>
            </form>

            <ul>
                <li>By signing up, you agree to our</li>
                <li><a href="">Terms</a></li>
                <li><a href="">Data Policy</a></li>
                <li>and</li>
                <li><a href="">Cookies Policy</a> .</li>
            </ul>
        </div>
    </div>
    <div class="option">
        <p>Have an account? <a href="{{ route('login') }}">Log in</a></p>
    </div>
    <div class="otherapps">
        <p>Get the app.</p>
        <button type="button"><i class="fab fa-apple"></i> App Store</button>
        <button type="button"><i class="fab fa-google-play"></i> Google Play</button>
    </div>
</main>
