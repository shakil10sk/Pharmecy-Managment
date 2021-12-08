<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Global Pharma</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.jpg') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/favicon.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/frontend/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Simonetta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

            {{-- <form class="input-group" id="login" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" class="input-field" name="email" placeholder="Email" required>
                <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box">
                <span> {{ __('Remember Me') }}</span>
                <button type="submit" class="submit-btn">Login</button>
            </form> --}}




    <div class="login-box">
        <h2>LOGIN </h2>
        <form  method="POST" action="{{ route('login') }}">
            @csrf
            <div class="user-box">
                <input type="text" name="email" required="">
            <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </button>
            <!--That's all-->
        </form>
    </div>
</body>
</html>
