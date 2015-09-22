<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TECH-TREK | One board, Two roads</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
 <link rel="stylesheet" href="{{URL::asset('common/assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('common/assets/css/main.css')}}">
        <link rel="stylesheet" href="{{URL::asset('common/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('common/assets/css/Buttons/buttons.css')}}">
        <link rel="stylesheet" href="{{URL::asset('common/assets/css/Buttons/normalize.css')}}">
      </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <header>
          <div class="container-fluid">
                <div class="row">
                    <!-- nav bar starts -->
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <nav class="navbar navbar-default ">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
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
                                        <li><a href="{{URL::asset('#')}}">Rules</a></li>
                                        <li><a href="{{URL::asset('signup')}}">Sign Up</a></li>
                                        <li><a href="{{URL::asset('login')}}">Login</a></li>
                                       @else
                                        <li><a href="{{URL::asset('#')}}">Dashboard</a></li>                                   
                                        <li><a href="{{URL::asset('logout')}}">Log Out</a></li>
                                        <li><a href="{{URL::asset('#')}}">Rules</a></li>
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
        <div id="message">
            @if(Session::has('message'))
            <p id="msg">{{Session::get('message')}}</p>
            @endif
        </div>
        @yield('content')
        <script src="{{URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')}}"></script>
        <script src="{{URL::asset('common/assets/js/vendor/jquery-1.11.1.min.js')}}"></script>
        
        <script src="{{URL::asset('common/assets/js/bootstrap.js')}}"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src="{{URL::asset('//www.google-analytics.com/analytics.js')}}";
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
