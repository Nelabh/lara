<!DOCTYPE html>
 <html class="no-js">
    <head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TECH-TREK | One board, Two roads</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/main.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/Buttons/buttons.css')}}">
        <link rel="stylesheet" href="{{URL::asset('public/common/assets/css/Buttons/normalize.css')}}">
      </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <header>
          <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-1 col-xs-1">
                        <a href="{{URL::asset('/')}}"><img src="{{URL::asset('public/common/assets/img/tt.png')}}" height="80px" ></a></div>
                    <div class="col-md-11 col-xs-11">
                        <nav class="navbar navbar-default ">
                            <div class="container-fluid">
                              
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                         @if(!Auth::check())
                                        <li class="active"><a href="{{URL::asset('/')}}">Home</a></li>
                                        <li><a href="{{URL::asset('rules')}}">Rules</a></li>
                                        <li><a href="{{URL::asset('signup')}}">Sign Up</a></li>
                                        <li><a href="{{URL::asset('login')}}">Login</a></li>
                                       @else
                                        <li><a href="{{URL::asset('dashboard')}}">Dashboard</a></li>                                   
                                        <li><a href="{{URL::asset('logout')}}">Log Out</a></li>
                                        <li><a href="{{URL::asset('rules')}}">Rules</a></li>
                                        @endif
                                        <li><a href="{{URL::asset('#')}}">Leaderboard</a></li>
                                        <li><a href="{{URL::asset('#')}}">Forum</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>    
                    </div>
                    <!-- nav bar ends -->
                </div>    
            </div>
        </header>
        
        @yield('content')
        <script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')}}"></script>
        <script src="{{URL::asset('public/common/assets/js/vendor/jquery-1.11.1.min.js')}}"></script>
        <script src="{{URL::asset('public/common/assets/js/bootstrap.js')}}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    </body>
</html>
