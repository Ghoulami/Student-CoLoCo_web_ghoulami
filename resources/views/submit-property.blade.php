@extends('layout')
@section('content')

@section('wizard-css')
    <link rel="stylesheet" href="../assets/css/wizard.css"> 
@endsection

@section('title')
    <title>Submit new property</title>
@endsection

<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Submit new property</h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix" > 
            <div class="wizard-container"> 

                <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                    <form action="{{route('offer.store')}}" method="post" enctype="multipart/form-data">   
                        @csrf                     
                        <div class="wizard-header">
                            <h3>
                                <b>Submit</b> YOUR PROPERTY <br>
                                <small>Lorem ipsum dolor sit amet, consectetur adipisicing.</small>
                            </h3>
                        </div>

                        <ul>
                            <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                            <li><a href="#step2" data-toggle="tab">Step 2 </a></li>
                            <li><a href="#step3" data-toggle="tab">Step 3 </a></li>
                            <li><a href="#step4" data-toggle="tab">Finished </a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane" id="step1">
                                <div class="row p-b-15  ">
                                    <h4 class="info-text"> Let's start with the basic information (with validation)</h4>
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title=""/>
                                                <input type="file" id="wizard-picture" name="imgPath">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('propertyname') ? ' has-error' : '' }}">
                                            <label>Property name <small>(required)</small></label>
                                            <input name="propertyname" type="text" class="form-control" placeholder="Super villa ...">

                                            @if ($errors->has('propertyname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('propertyname') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('propertyprice') ? ' has-error' : '' }}">
                                            <label>Property price <small>(required)</small></label>
                                            <input name="propertyprice" type="text" class="form-control" placeholder="3330000">
                                           
                                            @if ($errors->has('propertyprice'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('propertyprice') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input name="phone" type="text" class="form-control" placeholder="+1 473 843 7436" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 1 -->

                            <div class="tab-pane" id="step2">
                                <h4 class="info-text"> How much your Property is Beautiful ? </h4>
                                <div class="row">
                                    <div class="col-sm-12"> 
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <label>Property Description :</label>
                                                <textarea name="discrition" class="form-control" ></textarea>
                                            </div> 
                                        </div> 
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <div class="form-group{{ $errors->has('Capacity') ? ' has-error' : '' }}">
                                                <label>Capacity :</label>
                                                <input type="number" name="Capacity" class="form-control" placeholder="capacity..."></textarea>
                                                @if ($errors->has('Capacity'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('Capacity') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Property City :</label>
                                                <select name="city" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select your city">
                                                    <option>Tanger</option>
                                                    <option>Rabat</option>
                                                    <option>Casablanca</option>
                                                    <option>Beni mellal</option>
                                                    <option>Marraekch</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Property Adresse  :</label>
                                                <input type="text" name="adresse" class="form-control" placeholder="Adresse..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                                <label>Area  :</label>
                                                <input type="number" name="area" step="0.1" class="form-control" placeholder="area m²..."></textarea>
                                                @if ($errors->has('area'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('area') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-top-15">
                                        @forelse ($facilities as $facilitie)
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="{{$facilitie->id}}" value="{{$facilitie->id}}" name="facilities[]"> {{$facilitie->name}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> 
                                        @empty
                                        <div class="col-sm-12"> 
                                            <div class="col-sm-12"> 
                                                <div class="form-group">
                                                    <label>No facilitie found :</label>
                                                    <textarea name="discrition" class="form-control" ></textarea>
                                                </div> 
                                            </div> 
                                        </div>
                                        @endforelse
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                                <label>Latitude :</label>
                                                <input type="number" name="lat" class="form-control" placeholder="lat..."></textarea>
                                                @if ($errors->has('lat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lat') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                                                <label>Longitude :</label>
                                                <input type="number" name="lng" class="form-control" placeholder="lng..."></textarea>
                                                @if ($errors->has('lng'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lng') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!-- End step 2 -->

                            <div class="tab-pane" id="step3">                                        
                                <h4 class="info-text">Give us somme images</h4>
                                <div class="row">  
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-images">Chose Images :</label>
                                            <input class="form-control" type="file" id="property-images" name="images[]" multiple >
                                            <p class="help-block">Select multipel images for your property .</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 3 -->


                            <div class="tab-pane" id="step4">                                        
                                <h4 class="info-text"> Finished and submit </h4>
                                <div class="row">  
                                    <div class="col-sm-12">
                                        <div class="">
                                            <p>
                                                <label><strong>Terms and Conditions</strong></label>
                                                By accessing or using  GARO ESTATE services, such as 
                                                posting your property advertisement with your personal 
                                                information on our website you agree to the
                                                collection, use and disclosure of your personal information 
                                                in the legal proper manner
                                            </p>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" /> <strong>Accept termes and conditions.</strong>
                                                </label>
                                            </div> 

                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <!--  End step 4 -->

                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-primary' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>                                            
                        </div>	
                    </form>
                </div>
                <!-- End submit form -->
            </div> 
        </div>
    </div>
</div>
@section('wizard')
<script src="../assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="../assets/js/wizard.js"></script>
@endsection

@section('validate')
    <script src="../assets/js/jquery.validate.min.js"></script>
@endsection
@endsection