@extends('layout')

@section('title')
    <title>Home page</title>
@endsection

@section('content')
    <div class="slide-2">
        <div id="slider" class="sl-slider-wrapper">
            <div class="sl-slider">
                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div class="sl-slide-inner ">

                        <div class="bg-img bg-img-1" style="background-image: url(assets/img/slide2/1.jpg);"></div>                             
                        <blockquote><cite><a href="{{route('offer.show',['offer'=>$offers[0]->id])}}">{{$offers[0]->property_name}}</a></cite>
                            <p>{{substr ($offers[0]->description, 0, 100 )}}...</p>
                            <span class="pull-left"><b> Area :</b>{{$offers[0]->area}} m²</span>
                            <span class="proerty-price pull-right">{{$offers[0]->property_price}} MAD</span>
                            <div class="property-icon">
                                <img src="assets/img/icon/bed.png">(5)|
                                <img src="assets/img/icon/shawer.png">(2)|
                                <img src="assets/img/icon/cars.png">(1)  
                            </div>
                        </blockquote>
                    </div>
                </div> 

                <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">

                    <div class="sl-slide-inner ">

                        <div class="bg-img bg-img-1" style="background-image: url(assets/img/slide2/1.jpg);"></div>                             
                        <blockquote><cite><a href="{{route('offer.show' ,['offer'=>$offers[1]->id])}}">{{$offers[1]->property_name}}</a></cite>
                            <p>{{substr ($offers[1]->description, 0, 100 )}}...</p>
                            <span class="pull-left"><b> Area :</b>{{$offers[1]->area}} m²</span>
                            <span class="proerty-price pull-right">{{$offers[1]->property_price}} MAD</span>
                            <div class="property-icon">
                                <img src="assets/img/icon/bed.png">(5)|
                                <img src="assets/img/icon/shawer.png">(2)|
                                <img src="assets/img/icon/cars.png">(1)  
                            </div>
                        </blockquote>
                    </div>
                </div>    

                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">

                    <div class="sl-slide-inner ">

                        <div class="bg-img bg-img-1" style="background-image: url(assets/img/slide2/1.jpg);"></div>                             
                        <blockquote><cite><a href="{{route('offer.show' ,['offer'=>$offers[2]->id])}}">{{$offers[2]->property_name}}</a></cite>
                            <p>{{substr ($offers[2]->description, 0, 100 )}}...</p>
                            <span class="pull-left"><b> Area :</b>{{$offers[2]->area}} m²</span>
                            <span class="proerty-price pull-right">{{$offers[2]->property_price}} MAD</span>
                            <div class="property-icon">
                                <img src="assets/img/icon/bed.png">(5)|
                                <img src="assets/img/icon/shawer.png">(2)|
                                <img src="assets/img/icon/cars.png">(1)  
                            </div>
                        </blockquote>
                    </div>
                </div>


                <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">

                    <div class="sl-slide-inner ">

                        <div class="bg-img bg-img-1" style="background-image: url(assets/img/slide2/1.jpg);"></div>                             
                        <blockquote><cite><a href="{{route('offer.show' ,['offer'=>$offers[3]->id])}}">{{$offers[3]->property_name}}</a></cite>
                            <p>{{substr ($offers[3]->description, 0, 100 )}}...</p>
                            <span class="pull-left"><b> Area :</b>{{$offers[3]->area}} m²</span>
                            <span class="proerty-price pull-right">{{$offers[3]->property_price}} MAD</span>
                            <div class="property-icon">
                                <img src="assets/img/icon/bed.png">(5)|
                                <img src="assets/img/icon/shawer.png">(2)|
                                <img src="assets/img/icon/cars.png">(1)  
                            </div>
                        </blockquote>
                    </div>
                </div>

            </div><!-- /sl-slider -->

            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span> 
            </nav>
        </div><!-- /slider-wrapper -->
    </div>

    <!-- property area -->
    <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Top submitted property</h2>
                    <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies . </p>
                </div>
            </div>

            <div class="row">
                <div class="proerty-th">
                    @foreach ($offers as $offer)
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{route('offer.show' ,['offer'=>$offer->id])}}" ><img src="storage/{{$offer->imgPath}}" style="width:304px; height:248px;"></a>
                                </div>
                                <div class="item-entry overflow">
                                    <h5><a href="{{route('offer.show' ,['offer'=>$offer->id])}}" >{{$offer->property_name}} </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Area :</b> {{$offer->area}} </span>
                                    <span class="proerty-price pull-right">{{$offer->property_price}} MAD</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-tree more-proerty text-center">
                            <div class="item-tree-icon">
                                <i class="fa fa-th"></i>
                            </div>
                            <div class="more-entry overflow">
                                <h5><a href="{{route('offer.index')}}" >CAN'T DECIDE ? </a></h5>
                                <h5 class="tree-sub-ttl">Show all properties</h5>
                                <a class="btn border-btn more-black" href="{{route('offer.index')}}" >All properties</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Welcome area -->
    <div class="Welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 Welcome-entry  col-sm-12">
                    <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                        <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                    <!-- /.feature title -->
                                    <h2>GARO ESTATE </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div  class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-home pe-4x"></i>
                                        </div>
                                        <h3>Any property</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-users pe-4x"></i>
                                        </div>
                                        <h3>More Clients</h3>
                                    </div>
                                </div>


                                <div class="col-xs-12 text-center">
                                    <i class="welcome-circle"></i>
                                </div>

                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-notebook pe-4x"></i>
                                        </div>
                                        <h3>Easy to use</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-help2 pe-4x"></i>
                                        </div>
                                        <h3>Any help </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- boy-sale area -->
    <div class="boy-sale-area">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                    <div class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-search"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>DO YOU WANT TO PUT A DEMAND?</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>                                        
                        </div>
                        <div class="asks-first-arrow">
                            <a href="{{route('demand.create')}}"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                    <div  class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>TO SEE DEMANDS EXIST</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                        </div>
                        <div class="asks-first-arrow">
                            <a href="{{route('demand.index')}}"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p  class="asks-call">QUESTIONS? CALL US  : <span class="strong"> + 3-123- 424-5700</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
