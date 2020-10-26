<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    .dropzone.dz-started .dz-message {
    opacity: 0; /* Don't let it disappear */
    }

    body,
    html {
        height: 100%;
        font-family: 'Crimson Text', Times, serif, serif;
        /* overflow: hidden; */

    }

    .mybg {

        background-image: url("../bgrotated.jpg");
        height: 100%;
        background-position: center;
        /* background-repeat: no-repeat; */
        background-size: cover;
    }

    .wholediv {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .wholecard1 {
        /* background-color: rgba(192,192,192,0.2); */
        background-color: rgba(0, 0, 0, 0);
    }

    .wholecard2 {
        background-color: rgba(35, 55, 72, 0.5);
    }

    a {
        color: white;
    }

    a:hover {
        color: #3462A6;
    }

    .myactive {
        color: #235678 !important;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }

    hr {
        background-color: red;
        height: 1px;
        border: 0;
    }
</style>
    
</head>

<body class="mybg">
    <div id="app">
        <div class="d-flex" id="wrapper">
    
            {{-- Sidebar --}}
            <div class="wholediv border-right justify-content-center text-center " id="sidebar-wrapper">
                <div class="sidebar-heading">
                    <img class=" img-thumbnail" src="/storage/avatars/{{Auth::user()->avatar}}"
                        style="width:160px; height:160px; border-radius:50%"></div>
                <div class="list-group list-group-flush">
                    <h2 class="text-white">{{Auth::user()->name}}</h2>
                    <br>
                    <a href="/home" class="list-group-item wholediv">Dashboard</a>
                    <a href="/profile/{{Auth::user()->id}}" class="list-group-item wholediv">Profile</a>
                    @if (Auth::user()->admin == 0)
                    <a href="{{route('request.submit')}}" class="list-group-item wholediv">Request Mission</a>
                    <a href="{{route('leavereq.submit')}}" class="list-group-item wholediv">Request Time Off</a>
                    <a href="{{route('report.upload')}}" class="list-group-item wholediv ">Submit Report</a>
                    @endif
                </div>
            </div>
            {{-- Navbar --}}
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-md wholediv shadow-lg">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Andromeda
                        </a>
                        <nav class="navbar navbar-dark bg-transparent">
                            <button class="navbar-toggler btn-outline-dark" type="button" data-toggle="collapse"
                                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </nav>
                        <div class="collapse  navbar-collapse" id="navbarToggleExternalContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item ">
                                    <a class="nav-link {{ Request::is('home') ? 'myactive' : '' }}" href="/home">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'requests.inbox' ? 'myactive' : '' }}"
                                        href="{{route('requests.inbox')}}">Requests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::currentRouteName() == 'reports.inbox' ? 'myactive' : '' }}"
                                        href="{{route('reports.inbox')}}">Reports</a>
                                </li>
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto ">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img class="mr-2 img-thumbnail" src="/storage/avatars/{{Auth::user()->avatar}}"
                                            style="width:40px; height:40px; border-radius:50%">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">
                                            User Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
        <main class="py-4">
            <div class="p-5 mt-3 container col-6 justify-content-center text-black"
                style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;">
                <form method="post" action="{{url('file/upload/store')}}" enctype="multipart/form-data" class="wholecard1 text-white dropzone" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;" id="dropzone">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col">
                            <label for="chosendate">Date</label>
                            <input type="text" name="date" class="bg-transparent text-white form-control datepicker" id="chosendate">
                        </div>
                    </div>      
                    <div class="form-group">
                        <div class="col">
                            <label for="InputTitle">Title</label>
                            <input type="text" name="title" class="bg-transparent text-white form-control" id="InputTitle" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label for="InputTextarea">Comment</label>
                            <textarea name="content" class="bg-transparent text-white form-control" id="InputTextarea" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div id="dropzonePreview" class="bg-transparent  dz-message p-5" style="border-radius: 5px; box-shadow: 2px 2px 20px 5px #474144;" data-dz-message>
                            {{-- <span>Drop files here or click to upload.</span> --}}
                        </div>
                    </div>
                    <div class="col text-center mt-2">
                    <input class="btn btn-dark" type="button" id="sbmtbtn" value="submit" />
                    </div>
                </form>
            </div>
        </main>
   </div>
    </div>
    </div>

<script type="text/javascript">
    Dropzone.options.dropzone =
    {
    
    maxFilesize: 20,
    renameFile: function(file) {
        var dt = new Date();
        var time = dt.getTime();
        return time+file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf,.doc,.epub",
    addRemoveLinks: true,
    timeout: 50000,
    autoProcessQueue: false,            
    autoDiscover: false,
    uploadMultiple: true,
    parallelUploads: 10,
    maxFiles: 10,

    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    previewsContainer: '#dropzonePreview', // we specify on which div id we must show the files
    clickable:'#dropzonePreview',
    removedfile: function(file) 
    {
        var name = file.upload.filename;
        $.ajax({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
            type: 'POST',
            url: '{{ url("file/delete") }}',
            data: {filename: name},
            success: function (data){
                console.log("File has been successfully removed!!");
            },
            error: function(e) {
                console.log(e);
            }});
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
    },

    accept: function(file, done) {
    console.log("uploaded");
    done();
    },
    // error: function(file, msg){
    // alert(msg);
    // },

    init: function() {
        
    var myDropzone = this;
    this.on("maxfilesexceeded", function(file){
    alert("You can't upload more than 10 files.");
    });
    
    // First change the button to actually tell Dropzone to process the queue.
    $("#sbmtbtn").on('click',function(e) {
    // Make sure that the form isn't actually being sent.
    if (myDropzone.getQueuedFiles().length > 0){
    e.preventDefault();
    e.stopPropagation();
    myDropzone.processQueue();}
    else {
    $("#dropzone").submit();
    }
    });

    this.on("successmultiple", function(files, response) {
        window.location.replace("/home");
    });

    }


};

    var today  = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#chosendate').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    minDate: today
    });

    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

</script>

</body>

</html>