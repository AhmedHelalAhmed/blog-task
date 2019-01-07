<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="simple blog">
    <meta name="author" content="mumm">

    <title>Simple Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/welcome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="/welcome/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="/welcome/css/coming-soon.min.css" rel="stylesheet">

</head>

<body>

<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="/welcome/mp4/bg.mp4" type="video/mp4">
</video>

<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <h1 class="mb-3">Simple Blog</h1>

                    <p class="mb-5">Welcome to <strong>Simple Blog</strong> where you can write posts</p>
                    <div class="input-group input-group-newsletter">

                        <div class="input-group-append">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a class="btn btn-secondary"  href="{{ url('/home') }}">Home</a>
                                        @if(\App\User::isAdmin())

                                        <a  class="btn btn-secondary"  href="{{ url("/admin") }}">
                                            Dashboard
                                        </a>

                                        @endif


                                    @else
                                        <a  class="btn btn-secondary" href="{{ route('login') }}">Login</a>
                                        <a class="btn btn-secondary"  href="{{ route('register') }}">Register</a>
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="https://twitter.com/ahmedhelalahmed">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="https://github.com/AhmedHelalAhmed/blog-task">
                <i class="fab fa-github"></i>
            </a>
        </li>
        <li class="list-unstyled-item">
            <a href="https://www.linkedin.com/in/ahmedhelalahmed/">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
    </ul>
</div>

<!-- Bootstrap core JavaScript -->
<script src="/welcome/vendor/jquery/jquery.min.js"></script>
<script src="/welcome/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/welcome/js/coming-soon.min.js"></script>

</body>

</html>
