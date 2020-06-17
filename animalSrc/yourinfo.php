

<header class="row">

        <?php

if($user->isLoggedIn()){
    ?>
    
    <ul>
        
        <p>Name: <a href="index.php"><?php echo escape($user->data()->name) ?></a></p></li>
      <li><p>E-mail: <?php echo escape($user->data()->e_mail) ?></a></p></li>
      <li><p>Tel. Nr.: <?php echo escape($user->data()->contacts)?></p></li>
      <li><p>Logo</p> </li>
          <li><img style="width:200px"  class="output" src="users/<?php echo escape($user->data()->username).'/'.'logo'.'/'.escape($user->data()->logo)?>"/></li>
      <li>
    </ul>
  
    <?php
    if($user->hasPermission('admin')){
        echo '<p> You are an Administrator</p>';
    }

}else {
    
    echo '<p>You need to <a href="index.php">log in</a> 
    or <a href="index.php">register</a></p>';
    ?>   
    <div  class="reg">
    <button class="col- btn btn-primary">Login</button>
    <button class="col- btn btn-secondary">Sign up</button></div>

    <?php
}
?>
<!-- Navigacija -->
</header>