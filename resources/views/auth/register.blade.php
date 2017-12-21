@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input placeholder="your name " id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input placeholder="ex: username@mail.com" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('kontak') ? ' has-error' : '' }}">
                            <label for="kontak" class="col-md-4 control-label">Kontak Person</label>

                            <div class="col-md-6">
                                <input placeholder="ex: 081234xxx or @telegram @line @instagram" id="kontak" type="kontak" class="form-control" name="kontak" value="{{ old('kontak') }}" required>

                                @if ($errors->has('kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('no_rek') ? ' has-error' : '' }}">
                            <label for="no_rek" class="col-md-4 control-label">Atm</label>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="name_rek" id="name_rek" class="form-control">
                                            <option >...</option>
                                            <option value="mandiri">Mandiri</option>
                                            <option value="bri">BRI</option>
                                            <option value="bni">BNI</option>
                                            <option value="jateng">Jateng</option>
                                        <!-- <input id="no_rek" type="no_rek" class="form-control" name="no_rek" value="{{ old('no_rek') }}" required> -->
                                        </select>                                
                                    </div>
                                    <div class="col-md-8">                                
                                        <input id="no_rek" type="no_rek" class="form-control" name="no_rek" value="{{ old('no_rek') }}" required>
                                    </div>
                                </div>

                                @if ($errors->has('no_rek'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_rek') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
