<html>
<head>
<meta charset charset="UTF-8">
	<title>Vet-Helper</title>
   <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  
</head>
<body>  
<div clas="row ">
  <div class="">
   <div class=" my-4 d-flex justify-content-center "><img class="logo" src="img/logo.svg" alt="logo">
  </div> 
  <div>
   <?php echo 'Welcome '.$user->data()->username;?></div>
   <div class="col-">
    <?php
if(Session::exists('home')){
    echo '<div class="mx-auto">'.Session::flash('home').'</div>';
}?>
    </div>  
  </div>
</div>
    <div class="row content">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#animals" role="tab" aria-controls="home">Animals</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#update-profile" role="tab" aria-controls="profile">Update  profile</a>
      <!-- change password -->
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#changePassword" role="tab" aria-controls="messages">Change password</a>
      <!-- Settings -->
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#settings" role="tab" aria-controls="settings">Settings</a>
      <!-- about -->
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#about" role="tab" aria-controls="settings">About</a>
      <!-- logout -->
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#logout" role="tab" aria-controls="settings">Log out</a>
    </div>
  </div>
  <div class="col-8 white">
    <div class="tab-content" id="nav-tabContent">
      <!-- Animalas information -->
<?php include ('menuSrc/newAnimal.php');?>
<!-- Change password infro -->
       <div id="changePassword" class="tab-pane fade show "  role="tabpanel" aria-labelledby="list-home-list">
           <?php include ('menuSrc/changepassword.php')?>
       </div>
<!-- Settings info-->
      <div id="settings" class="tab-pane fade"  role="tabpanel" aria-labelledby="list-settings-list">

      <a class="btn btn-primary" href="PDFCSS.php">PDF styling</a>
      <a class="btn btn-primary" href="adminA.php">Use animals</a></div>
<!-- About -->
      <div id="about"class="tab-pane fade"  role="tabpanel" aria-labelledby="list-settings-list"> about aboutobabuot</div> 
<!-- <!-log out info-  --> 
      <div id="logout" class="tab-pane fade"  role="tabpanel" aria-labelledby="list-settings-list">    
          <a class="btn btn-primary"href="logout.php">Log out</a>
</div>
<!-- Update information -->
    
<div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="list-messages-list">
<?php include ('update.php');?> 
</div>
    </div>
  </div>
</div>

   

</form>
    <?php
    if($user->hasPermission('admin')){
        echo '<p> You are an Administrator</p>';
    }