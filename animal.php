<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/content.css">
<script src="vendor/jquery.js"></script>


</head>
<!-- HTML BODY -->
<body >
<?php require_once 'core/init.php';

if(Session::exists('animal')){
        echo'<p>'.Session::flash('animal').'</p>';
    }
    $user = new User();?>
<?php include('animalSrc/nav.php');?>
<div class="content">

<!-- Pradedamas content -->


<div class='invis'>
<?php include('animalSrc/patientInfo.php');?>
<div class="row">
<!-- PDF download -->
<div class="col-sm"></div>
<div class="col-">
<input  type="submit" name="submit" value="Create PDF" class="btn btn-success" id="genPDF" class="deletebtn" >
    <!-- Įrašai -->

  <input type="hidden" id="forData" name="data" value="">
  <input type="hidden" id="forImg" name="img" value="">
  </div>
  
<div class="col-">
<?php include('animalSrc/img.php');?>

</div>

</div>
</div>
<div type="text" id="cia">
    </div>

<div class='invis'>
<br>
    <!-- informacija -->
    
<?php include('animalSrc/puses.php');?>
<!-- Section 2 -->
<div class="bendras row">

  <!--Gyvūno lentelė  -->
  <div id="list1" class="col-"></div>
  <div id="list2" class="col-">
  </div>
  <?php include('lentele.php');?>
  <!-- Gyvūno Paveikslas -->
  </div>
  <!-- <img d="paveikslelis" class="col-lm float-right" src="./img/arklio/skeletas.jpg" alt="Arklys" name="Arklys" usemap="#Arklys"> -->
</div>
<div class='invis'>
<?php include('animalSrc/yourinfo.php');?>
</div>
<!-- Content end -->
</div></div>
<!-- Java scripts -->
<script src="scripts/app.js" charset="utf-8"></script>
</body>
</html>