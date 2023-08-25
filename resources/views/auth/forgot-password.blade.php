<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's help you recover your password - {{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/utilities/style.css?v=1.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/utilities/components/header.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('storage/utilities/auth/authorization.css?v=1.0') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/fonts/icofont/icofont.min.css?v=1.0') }}">
</head>

<body class="antialiased">
    @include('utilities.auth.header')
    <main class="auth-container">
        <div class="auth-wrapper">
            <form action="#" method="POST" autocomplete="off" class="onboarding" id="onboarding">
                <div class="auth-heading">
                    <h1>Recover account access</h1>
                </div>
                <div class="divider-liner">
                    <span class="line"></span>Enter email-id to reset password<span class="line"></span>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="example@gmail.com"
                        @required(true)>
                </div>
                <div class="btn-group">
                    <button type="submit" class="submit-btn">Send reset instructions</button>
                </div>
                <div class="auth-membership-status max-m">
                    <p>I remember my {{ config('app.name') }} password now! <a href="{{ route('signin') }}">Sign-in</a>
                    </p>
                </div>
            </form>
            {{-- <div class="auth-recover-instructions">
                <div class="spwanner">
                    <p>Not sure what to do? Try this steps...</p>
                    <i id="spwanner-display" class="icofont-caret-down"></i>
                </div>
                <div class="instructions-manual-script">
                    <p>1. Enter email to be sent the password reset instruction.</p>
                    <p>2. Check you inbox/junk folder to view the instructions.</p>
                    <p>3. Click on the link and reset your password.</p>
                    <p id="helpdesk"><a href="">Contact support</a> if the abouve steps don't work.</p>
                </div>
            </div> --}}
        </div>
    </main>
</body>

</html>
