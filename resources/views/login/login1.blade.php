<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Control de Asistencia</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    {!!Html::style('css/materialicons.css')!!}

    {!!Html::style('plugins/bootstrap/css/bootstrap.css')!!}

    {!!Html::style('plugins/node-waves/waves.css')!!}
    {!!Html::style('plugins/animate-css/animate.css')!!}
    {!!Html::style('css/style.css')!!}

</head>

<body class="login-page">
    <div class="login-box">
        @if($errors->any())
            <div class="alert alert-danger alert-bold-border fade in alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Oops!</strong> Debes corregir los siguientes errores para poder continuar     
                    <ul class="inline-popups">
                        @foreach ($errors->all() as $error)
                            <li  class="alert-link">{{ $error }}</li>
                        @endforeach
                    </ul>
            </div>
            @endif
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{route('postLogin')}}">
                    <div class="msg">Inicio de Sesion</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                        </div>
                        <div class="col-xs-4">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">INICIAR</button>
                        </div>
                        <div class="col-xs-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {!!Html::script('plugins/jquery/jquery.min.js')!!}
    {!!Html::script('plugins/bootstrap/js/bootstrap.js')!!}
    {!!Html::script('plugins/jquery-validation/jquery.validate.js')!!}
    {!!Html::script('plugins/node-waves/waves.js')!!}
    
    {!!Html::script('js/admin.js')!!}

</body>

</html>