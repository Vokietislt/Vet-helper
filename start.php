<html>
<head>
<meta charset charset="UTF-8">

	<title>Vet-Helper</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/startStyles.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
</head>
<body>
    <div class="container">
    <img src="img/logo.svg" class="logo mx-auto d-block " alt="">
<div class="row">
</div>
    <div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-login">
<div class="panel-heading">
<div class="row">
<div class="col-xs-6">
<a href="#" class="active" id="login-form-link">Login</a>
</div>
<div class="col-xs-6">
<a href="#" id="register-form-link">Register</a>
</div>
</div>
<hr>
</div>
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
<?php
if(Session::exists('home')){
    echo '<div class="mx-auto">'.Session::flash('home').'</div>';
}?>
    <!-- LOGIN -->
<form id="login-form" action="login.php" method="post"  style="display: block;">
    <div class="form-group">
        <input type="text" name="username_login" id="login_username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" name="password" id="login_password" autocomplete="off" class="form-control" placeholder="password">
    </div>
    <div class="form-group text-center">
        <input type="checkbox"  class="" name="remember" id="remember">
        <label for="remember"> Remember Me</label>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="login-submit" id="login-submit"  class="form-control btn btn-login" value="Log In">
            </div>
        </div>
        
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
    <input type="hidden" name="token" value="<?php echo $token ?>">  
</div>
</form>
<!-- REGISTRATION -->
<form id="register-form" action="register.php" method="post" role="form" style="display: none;">
<div class="form-group">
<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo escape(Input::get('username')); ?>">
</div>
<div class="form-group">
<input autofill="true" type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo escape(Input::get('email')); ?>">
</div>
<div class="form-group">
<input type="password" name="password_reg" id="password_reg" tabindex="2" class="form-control" placeholder="Password">
</div>
<div class="form-group">
<input type="password" name="password_again" id="password_again" tabindex="2" class="form-control" placeholder="Confirm Password">
</div>
<div class="form-group">
<input type="text" name="name" id="name" tabindex="2" class="form-control" placeholder="Name" value="<?php echo escape(Input::get('username')); ?>">
</div>
<div class="form-group">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
</div>
<input type="hidden" name="token" value="<?php echo $token;?>">  
</div>

</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
    $(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

});

</script>

</body>
</html>
