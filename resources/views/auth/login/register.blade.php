<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login Form
            </div>
            <div class="title signup">
                Signup Form
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form method="POST" action="{{ route('login') }}" class="login">
                    @csrf
                    <div class="field">
                        <input type="email" placeholder="Email Address"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                    </div>
                    <div class="pass-link">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <button type="submit" value="Login">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="signup-link">
                        Not a member? <a href="">Signup now</a>
                    </div>
                </form>
                <form action="{{ route('register') }}" class="signup" method="POST">
                    @csrf
                    <div class="field">
                        <input type="text" placeholder="Name"
                            class="form-control @error('name') is-invalid @enderror" required autocomplete="name"
                            autofocus value="{{ old('name') }}">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Phone" class="form-control required autocomplete="phone"
                            autofocus value="{{ old('phone') }}">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Address" class="form-control required autocomplete="address"
                            autofocus value="{{ old('address') }}">
                    </div>
                    <div class="field">
                        <input type="email" placeholder="Email Address"
                            class="form-control @error('email_address') is-invalid @enderror" required
                            autocomplete="email_address" autofocus value="{{ old('email_address') }}">
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <button type="submit" value="Signup">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</body>

</html>
