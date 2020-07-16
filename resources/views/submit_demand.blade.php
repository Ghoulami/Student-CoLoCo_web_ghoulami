@extends('layout')
@section('content')

@section('wizard-css')
    <link rel="stylesheet" href="../assets/css/wizard.css"> 
@endsection

@section('title')
    <title>Submit new demand</title>
@endsection
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Submit new demand</h1>               
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
                    <form action="{{route('demand.store')}}" method="post" enctype="multipart/form-data">   
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
                                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label>Demand title <small>(required)</small></label>
                                            <input name="title" type="text" class="form-control" placeholder="Super villa ...">

                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('max_price') ? ' has-error' : '' }}">
                                            <label>Property price <small>(required)</small></label>
                                            <input name="max_price" type="number" step="0.5" class="form-control" placeholder="3330000">
                                           
                                            @if ($errors->has('max_price'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('max_price') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input name="telephone" type="text" class="form-control" placeholder="+1 473 843 7436" value="{{Auth::user()->phone}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  End step 1 -->

                            <div class="tab-pane" id="step2">
                                <h4 class="info-text"> what you looking for ? </h4>
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
                                    <br>
                                </div>
                            </div>
                            <!-- End step 2 -->
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