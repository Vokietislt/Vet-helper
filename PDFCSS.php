<?php
require_once 'core/init.php';
    $user = new User();
if(!$user->isLoggedIn()){
    Session::flash('home','Not logged in');
    Redirect::to('index.php'); 
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="vendor/jquery.js"></script> 
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="<?php echo 'users/'.escape($user->data()->username).'/pdfstyle.css'?>">
    <title>VH-Animals Menu</title>
</head>
<body>
<div class="setup">
<label for="logoSize">Logo size</label>
<input  id="logoSize" name='logoSize' type="text" value="0"><br>
<label for="logoContainer">Logo place</label>
<select  id="logoContainer" name='logoContainer' value='center' >
<option value="center">Center</option>
<option value="start">Start</option>
<option value="end">End</option>
</select><br>
<label for="h2">Headings color</label>
<input  id="h2" name='h2' type="color" value= '#ffffff'><br>
<label for="BC">Backgroud color</label>
<input  id="BC" name='BC' type="color" value= '#ffffff' ><br>
<label for="p">Text color</label>
<input  id="p" name='p' type="color" value= '#ffffff' ><br>

<label for="IMG">IMG size</label>
<input  id="IMG" name='IMG' type="text" value="0"><br>
<label for="IMGconteiner">IMG place</label>
<select  id="IMGconteiner" name='IMGconteiner' value='center' >
<option value="center">Center</option>
<option value="start">Start</option>
<option value="end">End</option>
</select><br>
<form action="savePDFCSS.php" method="post">
<input type="hidden" name="data" id="data" value="">
<input type="submit" class="btn btn-primary"onclick="setFile()" value="Save changes">
</form>
<div class="btn btn-primary" id="close">Close</div>
</div>
<div class="btn btn-primary" id="open">Open</div>
<div class='pdf'>
<?php
   if($user->data()->logo!=null){
   $logo = '<div class="logoContainer"><img class="userlogo" src="users/'.escape($user->data()->username).'/'.'logo'.'/'.escape($user->data()->logo).'"alt="Logo"/></div>' ;}
    if($user->data()->contacts!=null)
     $phone = '<p>Tel.: '.$user->data()->contacts.'</p>';
     else {$phone = '';}
    if($user->data()->e_mail!=null)
     $email = '<p>E-mail: '.$user->data()->e_mail.'</p>';
     else {$email = '';}

    echo $logo.
    '<h2>Info</h2>'.
    '<p>Name: '.$user->data()->name.' '.'</p>'
    .$phone.
     $email.
    '<p>Animal Name: '.'Animal Name'.'</p>'.
    '<p> Gender: '.'Gender'.'</p>'.
    '<p> Date: '.'Date'.'</p>'.
    '<p> Owner: '.'Owner'.'</p>'.
    '<p>Phone number: '.'+370000'.'</p>'.
    '<p>Adress: '.'Adresss'.'</p>'.
    '<h2>Findings</h2>'.
    '<p class ="findings">'.'Information you found about animal'.'</p>';

   echo '<h2>Images</h2>';

   for ($i=0; $i <= 5; $i++) { 
    echo '<div class="IMGconteiner"><img class="img" src="users/'.escape($user->data()->username).'/'.'logo'.'/'.escape($user->data()->logo).'"alt="img"/></div>';
   }
?>
</div>
<script>
$( document ).ready(main);

   $('#logoSize').change(function(){
    $('.userlogo').css({
    'width': $(this).val()
   })
   })
   $('#IMG').change(function(){
    $('.img').css({
    'width': $(this).val()
   })
   })

$('#BC').change(function(){
    $('.pdf').css({
    'background-color':$(this).val()
    })
})
$('#p').change(function(){
    $('p').css({
    'color':$(this).val()
    })
})
$('#h2').change(function(){
    $('h2').css({
    'color':$(this).val()
    })
})
$('#logoContainer').change(function(){
    $('.logoContainer').css({
    'text-align':$(this).val()
    })
})
$('#IMGconteiner').change(function(){
    $('.IMGconteiner').css({
    'text-align':$(this).val()
    })
})
$('#close').click(function(){
    $('.setup').css({
    'display':'none'
    })
    $('#open').css({
    'display':'block'
    })
})
$('#open').click(function(){
    $('.setup').css({
    'display':'block'
    })
    $('#open').css({
    'display':'none'
    })
})
   




function main (){
$('.pdf').css({
    'width':'100%',
    'background-color':'white'
})
$('.logoContainer').css({
    
    'text-align':'center'
})
$('.userlogo').css({
    'background-color':'white'
})
$('.img').css({
    'background-color':'white'
})
$('.setup').css({
    'position': '-webkit-sticky',
    'position':'sticky',
    'top':'0px',
    'width':'100%',
    'background-color':'white'    
})
$('#open').css({
    'display':'none',
    'position': '-webkit-sticky',
    'position':'sticky',
    'top':'0px',
    'width':'100%',
   
   
})

}
function setFile(){
x= '.userlogo{width:'+ $('#logoSize').val()+'}'


$('#data').attr('value',x)
}
</script>
