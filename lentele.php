
<?php
$r=0;
// $users = DB::getInstance()->get('users',array ('username','=','alex'));
$miau = DB::getInstance()->getAll('animal WHERE animal = "'.$_GET['animal'].'" AND practise = "'.$_GET['practise'].'"', 'animal_data');
$lent="";
foreach($miau->results() as $miau){
    $x = $miau->animal_data;
    $lent = json_decode($x);
}
?>

<div class="row lentele">
  <div class="col-">
    <div class="list-group" id="list-tab" role="tablist">
   
<?php
    foreach($lent as $key=>$value){
      $key = str_replace('&nbsp;', '-', $key);
        echo '<a class="list-group-item list-group-item-action " id="list-'.$key.'-list" data-toggle="list" href="#list-'.$key.'" role="tab" aria-controls="'.$key.'">'.$key.'</a>';
    }
?> 
        </div>
    </div>

    <div class="col">
    <div class="tab-content" id="nav-tabContent">
    <?php
        foreach($lent as $key=>$value){
      $key = str_replace('&nbsp;', '-', $key);
      $key = str_replace(' ', '_', $key);
      echo'  <div class="tab-pane fade show" id="list-'.$key.'" role="tabpanel" aria-labelledby="list-'.$key.'-list">';
    ?>
<div class="row">
   <div class="col">
    <div class="list-group check" id="list-tab" role="tablist">
   
<?php
    foreach($value[0] as $key=>$val){
      $key = str_replace(' ', '-', $key);
      $key = str_replace(')', '', $key);
      $key = str_replace('(', '-', $key);
      $key = str_replace('.', '', $key);
      $key = str_replace('--', '-', $key);
      echo '<a class="list-group-item list-group-item-action 2ndlayer" id="list-'.$key.'-list" data-toggle="list" href="#list-'.$key.'" role="tab" aria-controls="'.$key.'">'.$key.'</a>';
    }
    
?> 

        </div>
        </div>
    
    

    <div class="col- irasai">
    <div class="tab-content irasai2" id="nav-tabContent">
    <?php 
    foreach($value[0] as $key=>$val){
      $key = str_replace(' ', '-', $key);
      $key = str_replace(')', '', $key);
      $key = str_replace('(', '-', $key);
      $key = str_replace('.', '', $key);
      $key = str_replace('--', '-', $key); 
// content.
$r++;
      echo'  <div class="tab-pane fade show " id="list-'.$key.'" role="tabpanel" aria-labelledby="list-'.$key.'-list">
      <select  class="form-control" name="" id="'.$key.'" multiple>';
      for ($i=1; $i<count($val);$i++){
          echo '<option value="'.$val[$i].'">'.$val[$i].'</option>';
         
      }
      echo'</select>';
      echo'<textarea class="form-control" type="text" name="" id=""></textarea>';
    echo '<button class="btn btn-primary transfer">Transfer</button>';
    //  end of content
    echo'</div>';}
    
    ?>
    
        
    
    </div>
  </div>
  </div>
 <?php   
//  end of content
    echo'</div>';}
    ?>
    <!-- tab content 1  -->
   
    </div>
  </div>
<!-- row -->
</div>

<?php
// echo $r;
?>
