
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.min.css">
    {{-- <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body, html {
        height: 100%;
        font-family: 'Crimson Text', Times, serif, serif;
        
        }
    .bg{

        background-image: url("bg.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    .mine{
        background-color:rgba(12, 12, 38, 0.1);
    }
    
    .my-btn{
        color: rgba(10,132,95,1);
        opacity: 0.5;
    }


    .myother{
        display: flex;
        align-items: center; /* horizontal */
        justify-content: center;
    }

    .mydiv{
        position: absolute;
        top: 0; bottom: 0; left: auto; right: 10vw;
        margin: auto;
        height: 55%;
        overflow: auto;
        
    }
    h2{
        font-weight: bold;
    }
    
    
    </style>
</head>
<body class="bg">
    <div class="myother">
<div class="p-5 mydiv container text-center text-white col-4"
    style="background-color:rgba(255, 255, 255, 0.1);border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
    <h2>This is HR software with heart.</h2>
    <h5 class="text-justify">Our HR software collects and organizes all the information you gather throughout the employee life cycle, then helps you
    use it to achieve great things. Whether you’re hiring, onboarding, preparing compensation, or building culture, Andromeda
    gives you the time and insights to focus on your most important asset—your people.</h5>
    <a href="/login" class="btn btn-light pl-5 pr-5 btn-outline-info text-white my-btn mt-5">Login</a>
    </div>
</div>


</body>

</html>