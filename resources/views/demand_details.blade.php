<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Demands details</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/fontello.css">
        <link href="../assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="../assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="../assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="../assets/css/price-range.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="../assets/css/owl.theme.css">
        <link rel="stylesheet" href="../assets/css/owl.transitions.css">
        <link rel="stylesheet" href="../assets/css/lightslider.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
    </head>

    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                                <span><i class="pe-7s-mail"></i> your@company.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{Route('welcome')}}"><img src="../assets/img/logo.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        @guest
                            <a class="navbar-btn nav-button wow bounceInRight login" href="{{Route('register_singin')}}" data-wow-delay="0.4s">Login</a>
                        @endguest
                        @auth
                            @yield('submit')
                            <a class="navbar-btn nav-button wow fadeInRight" href="{{Route('demand.create')}}" data-wow-delay="0.4s">Submit</a>
                        @endauth
                        @auth
                        @if ($demand->client_id==Auth::user()->id)
                        <form class="inline" action="{{route('demand.destroy' , ['demand' => $demand->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="navbar-btn nav-button wow fadeInRight" type="submit" value="DELETE"/>
                        </form>
                        @endif
                        @endauth
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="/" class="">Home</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="{{route('demand.index')}}">Demands</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="{{route('offer.index')}}">Offers</a></li>
                        @auth
                        <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{ Auth::user()->username }} <b class="caret"></b></a>
                            <ul class="dropdown-menu navbar-nav">
                                <li>
                                    <a class="dropdown-item" href="{{ route('client.show',['client'=>Auth::user()->id]) }}"> {{ __('My Profile') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">{{$demand->title}}</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">   

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-2">
                        <div class="">
                            <div class="row">
                                <div class="light-slide-item">            
                                    <div class="clearfix">
                                        <div class="favorite-and-print">
                                            <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                            <a class="printer-icon " href="javascript:window.print()">
                                                <i class="fa fa-print"></i> 
                                            </a>
                                        </div> 

                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            <li data-thumb="../storage/{{$demand->imgPath}}"> 
                                                <img src="../storage/{{$demand->imgPath}}" />
                                            </li>                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-property-wrapper">

                                <div class="section">
                                    <h4 class="s-property-title">Description</h4>
                                    <div class="s-property-content">
                                        <p>{{$demand->description}}</p>
                                    </div>
                                </div>
                                <!-- End description area  -->

                                <div class="section additional-details">

                                    <h4 class="s-property-title">Additional Details</h4>

                                    <ul class="additional-details-list clearfix">
                                        <li>
                                            <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Capacity</span>
                                            <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$demand->capacity}}</span>
                                        </li>

                                        <li>
                                            <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Price</span>
                                            <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$demand->max_price}} MAD</span>
                                        </li>
                                        <li>
                                            <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">adresse</span>
                                            <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$demand->adresse}}</span>
                                        </li>

                                        <li>
                                            <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">area</span>
                                            <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$demand->area}} m²</span>
                                        </li>
                                        <li>
                                            <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Date</span>
                                            <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$demand->created_at}}</span>
                                        </li>

                                    </ul>
                                </div>  
                                <!-- End additional-details area  -->

                                <div class="section property-features">      

                                    <h4 class="s-property-title">Features</h4>                            
                                    <ul>
                                        @foreach ($demand->facilities()->get() as $facilitie)
                                            <li><a href="#">{{$facilitie->name}}</a></li>   
                                        @endforeach
                                    </ul>

                                </div>
                                <!-- End features area  -->

                                <div class="section property-share"> 
                                    <h4 class="s-property-title">Share width your friends </h4> 
                                    <div class="roperty-social">
                                        <ul> 
                                            <li><a title="Share this on dribbble " href="#"><img src="../assets/img/social_big/dribbble_grey.png"></a></li>                                         
                                            <li><a title="Share this on facebok " href="#"><img src="../assets/img/social_big/facebook_grey.png"></a></li> 
                                            <li><a title="Share this on delicious " href="#"><img src="../assets/img/social_big/delicious_grey.png"></a></li> 
                                            <li><a title="Share this on tumblr " href="#"><img src="../assets/img/social_big/tumblr_grey.png"></a></li> 
                                            <li><a title="Share this on digg " href="#"><img src="../assets/img/social_big/digg_grey.png"></a></li> 
                                            <li><a title="Share this on twitter " href="#"><img src="../assets/img/social_big/twitter_grey.png"></a></li> 
                                            <li><a title="Share this on linkedin " href="#"><img src="../assets/img/social_big/linkedin_grey.png"></a></li>                                        
                                        </ul>
                                    </div>
                                </div>
                                <!-- End video area  -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right property-style2">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <div class="single-property-header">                                          
                                            <h1 class="property-title">{{$demand->title}}</h1>
                                            <span class="property-price">Max : {{$demand->max_price}}MAD</span>
                                        </div>

                                        <div class="property-meta entry-meta clearfix ">   

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-tag">                                                                                      
                                                    <img src="../assets/img/icon/sale-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Status</span>
                                                    <span class="property-info-value">Rent demand</span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info icon-area">
                                                    <img src="../assets/img/icon/room-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Area</span>
                                                    <span class="property-info-value">{{$demand->area}}<b class="property-info-unit">m²</b></span>
                                                </span>
                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                                <span class="property-info-icon icon-bed">
                                                    <img src="../assets/img/icon/bed-orange.png">
                                                </span>
                                                <span class="property-info-entry">
                                                    <span class="property-info-label">Capacity</span>
                                                    <span class="property-info-value">{{$demand->capacity}}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="dealer-section-space">
                                            <span>Dealer information</span>
                                        </div>
                                        <div class="clear">
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href="">
                                                    <img src="../storage/{{$demand->client()->get()->first()->imgPath}}" class="img-circle">
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <a href="#">{{$demand->client()->get()->first()->last_name}} {{$demand->client()->get()->first()->first_name}}</a>
                                                </h3>
                                                <div class="dealer-social-media">
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a class="facebook" target="_blank" href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a class="gplus" target="_blank" href="">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                    <a class="linkedin" target="_blank" href="">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a> 
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>       
                                                </div>

                                            </div>
                                        </div>

                                        <div class="clear">
                                            <ul class="dealer-contacts">                                       
                                                <li><i class="pe-7s-map-marker strong"> </i> {{$demand->adresse}}</li>
                                                <li><i class="pe-7s-mail strong"> </i> {{$demand->client()->get()->first()->email}}</li>
                                                <li><i class="pe-7s-call strong"> </i>{{$demand->client()->get()->first()->phone}}</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                </div>

            </div>
        </div>

        <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                                <img src="../assets/img/footer-logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                                <p>Lorem ipsum dolor cum necessitatibus su quisquam molestias. Vel unde, blanditiis.</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                    <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                    <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="properties.html">Properties</a>  </li> 
                                    <li><a href="#">Services</a>  </li> 
                                    <li><a href="submit-property.html">Submit property </a></li> 
                                    <li><a href="contact.html">Contact us</a></li> 
                                    <li><a href="faq.html">fqa</a>  </li> 
                                    <li><a href="faq.html">Terms </a>  </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Last News</h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-blog">
                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="../assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 

                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="../assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 

                                    <li>
                                        <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                            <a href="single.html">
                                                <img src="../assets/img/demo/small-proerty-2.jpg">
                                            </a>
                                            <span class="blg-date">12-12-2016</span>

                                        </div>
                                        <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                            <h6> <a href="single.html">Add news functions </a></h6> 
                                            <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                        </div>
                                    </li> 


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Stay in touch</h4>
                                <div class="footer-title-line"></div>
                                <p>Lorem ipsum dolor sit amet, nulla  suscipit similique quisquam molestias. Vel unde, blanditiis.</p>

                                <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="E-mail ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form> 

                                <div class="social pull-right"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> (C) <a href="http://www.KimaroTec.com">KimaroTheme</a> , All rights reserved 2016  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 
                            <ul> 
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Property</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Faq</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="../assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="../assets/js/jquery-1.10.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/bootstrap-select.min.js"></script>
        <script src="../assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="../assets/js/easypiechart.min.js"></script>
        <script src="../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/wow.js"></script>
        <script src="../assets/js/icheck.min.js"></script>
        <script src="../assets/js/price-range.js"></script>
        <script type="text/javascript" src="../assets/js/lightslider.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
                            $(document).ready(function () {

                                $('#image-gallery').lightSlider({
                                    gallery: true,
                                    item: 1,
                                    thumbItem: 9,
                                    slideMargin: 0,
                                    speed: 500,
                                    auto: true,
                                    loop: true,
                                    onSliderLoad: function () {
                                        $('#image-gallery').removeClass('cS-hidden');
                                    }
                                });
                            });
        </script>

    </body>
</html>