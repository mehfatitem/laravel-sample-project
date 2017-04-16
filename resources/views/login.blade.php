<?php
  $contact = Session::get('contact');
  if($contact != NULL || $contact != ''){
    redirect()->to('/users')->send();
  }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  @include('style_css')
</head>
@if (count($errors) > 0)
  <div class = "alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<?php if(strlen($data)>0){?>
  <div class="alert alert-danger" >
    <ul>
      <li>{{$data}}</li>
    </ul>
  </div>
<?php } ?>
<body>
  <div class="links" style="margin-top : 10px;margin-bottom : 10px;">
    <a href="/">Ana Sayfa</a>
  </div>
  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
           <fieldset>
              <?php echo Form::open(array('id' => 'loginForm', null, 'onsubmit' => 'return false;'));?>
              <label id="lab-email" name="lab-email">Kullanıcı Adı</label>
              <?php echo Form::text('username',null, array('id'=>'username')); ?><br>
              <label id="lab-password" name="lab-password">Şifre</label>
              <?php echo Form::password('password', array('id'=>'password')); ?><br>
              <?php echo Form::submit('Oturum Aç',array('id' => 'login-button')); ?>
              <?php echo Form::close();?>
           </fieldset>
        </div>
        <div style="visibility:hidden;margin-top:10px;font-weight:bold;" class="alert alert-danger" id="result"></div>
      </div>
    </div>
    </div>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
@include('main_js');
</body>
</html>
