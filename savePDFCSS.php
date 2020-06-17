<?php

require_once 'core/init.php';
    $user = new User();
if(!$user->isLoggedIn()){
    Session::flash('home','Not logged in');
    Redirect::to('index.php'); 
}
echo $_POST['data'];
$myfile = fopen('users/'.escape($user->data()->username).'/pdfstyle.css', "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $_POST['data']);

fclose($myfile);


Redirect::to('PDFCSS.php'); 
?>