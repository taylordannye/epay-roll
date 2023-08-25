<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a free account now! - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/utilities/style.css?v=1.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/utilities/components/header.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('storage/utilities/auth/authorization.css?v=1.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/fonts/icofont/icofont.min.css?v=1.0') }}">
</head>

<body class="antialiased">
    @include('utilities.auth.header')
    <main class="auth-container">
        <div class="auth-wrapper">
            <form action="#" method="POST" autocomplete="off" class="onboarding" id="authentication">
                <div class="auth-heading">
                    <h1>Create your account</h1>
                </div>
                <button type="button" class="o2auth-wrapper">
                    <img class="o2auth-img"
                        src="{{ asset('storage/assets/images/02auth/29b6600agh288c2748374jjfd8439843.png') }}"
                        alt="Google">
                    <div class="text">Continue with Google</div>
                </button>
                <div class="divider-liner">
                    <span class="line"></span>Or continue with email<span class="line"></span>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="example@gmail.com"
                        @required(true)>
                </div>
                <div class="btn-group">
                    <button type="submit" id="submit" class="submit-btn">Get Signup Authorization</button>
                    <div id="loader" class="loader-wrapper">
                        <!-- Ripple Loader -->
                        <div class="ripple-loader">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <div class="auth-membership-status">
                    <p>Already have a {{ config('app.name') }} account? <a href="{{ route('signin') }}">Sign-in</a></p>
                </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('storage/utilities/auth/js/processing.js') }}"></script>
</body>

</html>
