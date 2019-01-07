<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Error</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:700,900" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>404</h1>
        </div>
        <h2>Oops! This Page Could Not Be Found</h2>
        @if($error)
            <div>
                <h3 class="capital-first-letter">info</h3>
                <div class="info">
                    {{ $error }}
                </div>
            </div>
        @endif
        <div>
            <h2 class="capital-first-letter">contact the developer to solve the issue</h2>
            <div class="body capital-first-letter">
                <a href="https://www.facebook.com/Ahmed0Helal0Ahmed" target="_blank">facebook</a>
                <a href="https://www.linkedin.com/in/ahmedhelalahmed" target="_blank">linked in</a>
                <a href="mailto:Ahmed.Helal.Ahmed.Ali@gmail.com">Email Me</a>
            </div>
        </div>
    </div>
</div>

</body>

</html>

