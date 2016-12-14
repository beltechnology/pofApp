<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>POF India</title><link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"/><link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/><link rel="stylesheet" type="text/css" href="../../css/style.css"/><link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css"><link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css"><link href='//fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium&lang=en' rel='stylesheet' type='text/css'><!-- jQuery library --><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script><!-- Latest compiled JavaScript --><script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <script type="text/javascript" src="../../js/bootstrap.min.js"></script> <script type="text/javascript" src="../../js/bootstrap.js"></script></head>
<body><div class="maincontant">
 <section id="header">
        <div class="container">
            <div class="row">
            
            <div class="main-header col-md-12">
            
            <div class="logo col-md-3">
              <img src="../../images/Logo.png" alt="logo" />
            </div>
            
            <div class="col-md-6">
            </div>
            
            <div class="logout col-md-3">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            
            <!--<div class="logout col-md-3">
           <a href="{{ url('/') }}"> <i class="fa fa-sign-in  fa-2x" ></i> </a>
            </div>
            
             <div class="logout col-md-3">
            <a href="{{ url('/register') }}"><i class="fa fa-user-plus  fa-2x"> </i></a>
            </div> -->
            
            </div>
            
            </div>
            
            </div>
        </div>
 </section>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.RESET_PASSWORD')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('messages.EMAIL_ADDRESS') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ trans('messages.PASSWORD')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">{{ trans('messages.CONFIRM_PASSWORD')}}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> {{ trans('messages.RESET_PASSWORD')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></div></div><section id="footer">        <div class="container">            <div class="row">                        <div class="main-footer col-md-12">                        <div class="copyright col-md-3">            <p>&copy {{ trans('messages.COPYRIGHT') }} <?php echo date('Y') ?></p>            </div>                        <div class="bel-techno col-md-6">            <p>{{ trans('messages.CREATED_AND_MAINTAINED') }}</p>            </div>                        <div class=" reserved col-md-3">            <p>{{ trans('messages.ALL_RIGHTS_RESERVED') }}</p>            </div>                      	</div>       </div>  </div> </section>
