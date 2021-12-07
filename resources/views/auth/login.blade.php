<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Global Pharma Sign UP</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/style2.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Simonetta&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
   <div class="row">
    <div class="header ">
        <div class="page-headline bg-info">
            <h1>GLOBAL PHARMA</h1>
        </div>
        <div class="form-box col-lg-12 col-md-6 col-sm-4">
            {{-- <div class="button-box d-block text-center">
                <div id="btn"> </div>
                <button type="button" class="toggle-btn " onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div> --}}
            <h2>Login</h2>
            <form class="input-group" id="login" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" class="input-field" name="email" placeholder="Email" required>
                <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box">
                <span> {{ __('Remember Me') }}</span>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            {{-- Registration section --}}
            {{-- <form class="input-group " id="register" method="POST" action="{{ route('register') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="text" class="input-field" name="name" placeholder="Your Full Name" required>
                <input type="email" class="input-field" name="email" placeholder=" Email Address" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <input type="password" class="input-field" name="password_confirmation" placeholder="Confirm Password"
                    required>
                <input type="tel" class="input-field" name="phone" placeholder="Phone Number" required>
                <textarea class="input-field" name="address" cols="20" rows="2"
                    placeholder="Enter Your Address"></textarea>

                <input class="input-field " accept="image/*" name="photo" type="file">
                <input type="number" class="input-field" name="nid_number" placeholder="NID Number" required>
                <input type="text" class="input-field" name="city" placeholder="Your City Name" required>
                <input type="text" class="input-field" name="position" placeholder="joining Position - Ex.sellsman"
                    required>

                <input type="checkbox" class="check-box">
                <span>I agree<a href="#"> to the terms & conditions</a></span>
                <button type="submit" class="submit-btn">Registration</button>
            </form> --}}
        </div>


        <script>
            var show = document.getElementById("nav-link");

            function showMenu() {
                show.style.right = "0";
            }

            function closeMenu() {
                show.style.right = "-220px";
            }
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");

            function register() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

            function login() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0";
            }
        </script>
    </div>
   </div>
</body>

</html>
