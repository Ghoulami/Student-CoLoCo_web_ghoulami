@extends('layout')
@section('content')

@section('wizard-css')
    <link rel="stylesheet" href="../assets/css/wizard.css"> 
@endsection

@section('title')
    <title>My profile</title>
@endsection

<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Hello : <span class="orange strong">@if (is_null($client->last_name)) {{$client->username}} @else  {{$client->last_name.' '.$client->first_name}}@endif</span></h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header --> 

<!-- property area -->
<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">   
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{route('client.update' , ['client'=>$client->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="profiel-header">
                        <h3>
                            <b>BUILD</b> YOUR PROFILE <br>
                            <small>This information will let us know more about you.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img @if(is_null($client->imgPath)) src="" @else  src = "../storage/{{Auth::user()->imgPath}}" @endif class="picture-src" id="wizardPicturePreview" title=""/>
                                    <input type="file" id="wizard-picture" name="imgPath">
                                </div>
                                <h6>Choose Picture</h6>
                            </div>
                        </div>

                        <div class="col-sm-3 padding-top-25">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>First Name <small>(required)</small></label>
                                <input name="firstname" type="text" class="form-control" placeholder="First Name" value="{{ old('firstname', Auth::user()->first_name) }}">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Last Name <small>(required)</small></label>
                                <input name="lastname" type="text" class="form-control" placeholder="Last Name" value="{{ old('lastname' , Auth::user()->last_name) }}">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email <small>(required)</small></label>
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email', Auth::user()->email) }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password<small>(required)</small></label>
    
                                <input id="password" type="password" class="form-control" name="password" required>
    
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password <small>(required)</small></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
    
                        </div>  

                    </div>

                    <div class="clear">
                        <br>
                        <hr>
                        <br>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Facebook :</label>
                                <input name="facebook" type="text" class="form-control" placeholder="https://facebook.com/user" value="{{ old('facebook', Auth::user()->facebook)}}">
                            </div>
                            <div class="form-group">
                                <label>Twitter :</label>
                                <input name="twitter" type="text" class="form-control" placeholder="https://Twitter.com/@user" value="{{ old('twitter', Auth::user()->twitter)}}">
                            </div>
                            <div class="form-group">
                                <label>Website :</label>
                                <input name="website" type="text" class="form-control" placeholder="https://yoursite.com/" value="{{ old('website', Auth::user()->website)}}">
                            </div>
                        </div>  

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Public email :</label>
                                <input name="public_email" type="email" class="form-control" placeholder="p-email@rmail.com" value="{{ old('public_email', Auth::user()->public_email)}}">
                            </div>
                            <div class="form-group">
                                <label>Phone :</label>
                                <input name="phone" type="text" class="form-control" placeholder="+1 9090909090" value="{{ old('phone', Auth::user()->phone)}}">
                            </div>
                            <div class="form-group">
                                <label>FAX :</label>
                                <input name="fax" type="text" class="form-control" placeholder="+1 9090909090" value="{{ old('fax', Auth::user()->fax)}}">
                            </div>
                        </div>

                    </div>
            
                    <div class="col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-primary' name='finish' value='Finish' />
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->
</div>
</div>

@section('wizard')
<script src="../assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="../assets/js/wizard.js"></script>
@endsection
@endsection