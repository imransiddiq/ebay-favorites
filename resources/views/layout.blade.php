<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="" />
        <title>EBAY</title>
        
        <!-- Custom styles for this template -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}" media="all" />
        @if(!Request::is('/') || Request::is('contact-us'))
        <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all" />
        @endif
        <!-- Awesome Fonts -->
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        
        <!-- Bootstrap core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>

    <div class="pushy pushy-left">  
        <div id="sidebar" class="ui inverted left vertical menu responsive_nav">
            <a class="item" href="{{url('/')}}">
               <img src="{{url('images/menu_icon_home.png')}}"> Home
            </a>
            <a class="item" href="#">
               <img src="images/menu_icon_rate.png"> Rate us
            </a>
            <a class="item" href="#">
               <img src="{{url('images/menu_icon_fb.png')}}"> facebook
            </a>
            <a class="item" href="{{url('contact-us')}}">
               <img src="{{url('images/menu_icon_contact.png')}}"> contact us
            </a>
            <a class="item" href="#">
               <img src="{{url('images/menu_icon_settings.png')}}"> setting
            </a>
            <a class="item" href="#">
               <img src="{{url('images/menu_icon_about.png')}}"> about
            </a>
        </div>
    </div>

    <div class="ui fixed inverted main menu devcasts responsive push show-for-medium-up main-menu responsive_nav_btn">
        <a class="item menu-btn">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
    </div>
        
        <!-- ===== Start Header ===== -->
        <header class="head">
        	<div class="container">
                <div class="favourites">
                    <div class="favourites_img">
                        <img src="images/top_cart.png">
                        <div class="favourites_txt">Favorites <span>from eBay</span></div>
                    </div>

                    @if(!Request::is('/'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main_navbar">
                                <nav>
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="#">Rate us</a></li>
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="{{url('contact-us')}}">Contact us</a></li>
                                        <li><a href="#">Setting</a></li>
                                        <li><a href="#">About</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </header>
        <!-- ===== End Header ===== -->
        
        <!-- ===== Start Banner ===== -->
        
        @if(Request::is('/') || Request::is('contact-us') || Request::is('no-bids'))
        <section class="banner">
        </section>
        @endif

        @yield('content')
        
        <!-- ===== End Bannner ===== -->
    
    	<!-- ===== Start Bootstrap core JavaScript ===== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/docs.min.js')}}"></script>
        <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
        <script async src="//static.addtoany.com/menu/page.js"></script>
        <script src="{{asset('js/custome.js')}}"></script>
        <a href="#" class="scrollup">Scroll to Top</a>
        <!-- ===== End Bootstrap core JavaScript ===== -->
    </body>
</html>
