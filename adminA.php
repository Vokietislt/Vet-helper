<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>VH-Animals Menu</title>
</head>
<body>
<?php
require_once 'core/init.php';

// if(Session::exists('animal')){
//         echo'<p>'.Session::flash('animal').'</p>';
//     }
    $user = new User();
if(!$user->isLoggedIn()){
    
    Session::flash('home','Not logged in');
    Redirect::to('index.php'); 
}
if(!$user->hasPermission('admin')){        
    Session::flash('home','No permission');
    Redirect::to('index.php');
}
$animal=DB::getInstance()->getAll('animal',' DISTINCT animal');

foreach ($animal as $animals ){
foreach($animals as $val){    
    foreach ($val as $vals){
        // echo $vals.'<Br>';
     echo '<a style="display:none" class=" animals btn btn-primary ml-3" href="#" class="animals" value="'.$vals.'">'.$vals.'</a>';
        get($vals);
    }
}
}
function get($what){
    $practises =DB::getInstance()->getAll("animal WHERE animal = '{$what}'" ,'practise');
    // print_r ($practises);
    foreach ($practises as $practise ){
    foreach($practise as $val2){
    foreach($val2 as $key=>$vals2){
    //    echo '<br>'.$key.' '.$vals2;

    echo '<a  style="display:none" class=" '.$what.' practices btn btn-primary ml-3" href="adminA.php?animal='.$what.'&practise='.$vals2.'" value="'.$vals2.'">'.$vals2.'</a>';

    }
    }
    }
}
echo '<div class="choose">';
if($user->hasPermission('admin')){
echo $user->data()->name;}
    ?>
<button class="nAnimal btn btn-primary">New animal</button>
<button class="nPractise btn btn-primary">New practise</button> 
<button class="uPractise btn btn-primary">Upadate practise</button> 
</div>
<script>
  $('.uPractise').click(function(){
        $('.choose').css('display','none');
        $('.animals').css('display','inline-block')
        $('.back').css('display','inline-block')
    })
    $('.animals').click(function(){
        $('.animals').css('display','none')
        $('.'+$(this).attr('value')).css('display','inline-block')

    })
    $('.back').click(function(){
        $('.animals').css('display','none')
        $('.back').css('display','none')
        $('.practices').css('display','none')
        $('.new').css('display','inline-block')
    });
</script>
</body>
</html>	 
