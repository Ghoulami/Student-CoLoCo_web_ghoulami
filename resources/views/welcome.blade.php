@extends('layout')

@section('title')
    <title>Home page</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <style type="text/css">
        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:400px;
        }
    </style>
@endsection

@section('content')
    <div class="slide-2">
        <div id="slider" class="sl-slider-wrapper">
            <div class="sl-slider">
            @if (!empty($offers[0]))
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner ">
                        <div class="bg-img bg-img-1" style="background-image: url(assets/img/slide2/1.jpg);"></div>                             
                        <blockquote><cite><a href="{{route('offer.show' ,['offer'=>$offers[0]->id])}}">{{$offers[0]->property_name}}</a></cite>
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
            @endif

            @if (!empty($offers[1]))
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
            @endif

            @if (!empty($offers[2]))
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
            @endif
            
            @if (!empty($offers[3]))
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
            @endif
            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span> 
            </nav>
            </div>
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
    <div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>Get the location</h2>
            </div>
        </div>
        <div class="container">
            <div id="map"></div>
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

    
        <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
	    <script type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
            var lat = 31.794525;
            var lng = -7.0849336;
            var macarte = null;
            var i = 0;
            var offers =  <?php echo json_encode($offers); ?>;
            var len = offers.length;
            
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lng], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
            }
            window.onload = function(){
		        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
		        initMap(); 
            };

            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lng], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © OpenStreetMap/ODbL - rendu OSM France',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
                // Nous parcourons la liste des villes
                for (i=0; i < len; i++) {
                console.log(offers[i]['property_name']);
                console.log(offers[i]['lat']);
                console.log(offers[i]['lng']);
                
                var marker = L.marker([offers[i]['lat'], offers[i]['lng']]).addTo(macarte);
                    marker.bindPopup(offers[i]['property_name']);
                }         	
            }
        </script>
@endsection
