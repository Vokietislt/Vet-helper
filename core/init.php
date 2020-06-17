<?php
session_start();
// GlOBALS
$GLOBALS['config'] = array(
    'mysql'=> array(
        'host'=> '127.0.0.1',
        'username'=>'root',
        'password'=>'',
        'db' => 'vet-helper'
    ),
    'remember' => array(
        'cookie_name'=>'hash',
        'cookie_expiry'=> 6404800
    ),
    'session' => array(
        'session_name'=>'user',
        'token_name' => 'token'
    )
    );
// Class register
spl_autoload_register (function ($class){
require_once 'clases/'.$class.'.php';
});
// Functions
require_once 'functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
   $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session',array('hash','=',$hash));
    if ($hashCheck->results()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}