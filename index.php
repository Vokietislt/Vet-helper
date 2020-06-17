<?php
require_once 'core/init.php';


    $token=Token::generate();
    $user = new User();
if($user->isLoggedIn()){
 include ('menu.php');

}else {
    include ('start.php');
}