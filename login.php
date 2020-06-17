<?php
require_once 'core/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))){

     $validate = new Validate();
     $validation = $validate->check($_POST,array(
        'username_login'=> array('required'=>true),
        'password'=> array('required'=>true)
     ));

     if ($validation->passed()){
      // log user in 
      $user = new User();
      $remember = Input::get('remember') === 'on'  ? true : false;
      $login = $user->login(Input::get('username_login'), Input::get('password'), $remember) ;
        if ($login){
            Redirect::to('index.php');
            
        } else{
            Session::flash('home','Username or password do not match!');
            Redirect::to('index.php');}
     } else {
         foreach ($validation->errors() as $error){
             $er+= $error+'<br>';
            }
            Session::flash('home','Username or password do not match!');
            Redirect::to('index.php');
     }
     
    }else{echo ' no token';}
}

?>
