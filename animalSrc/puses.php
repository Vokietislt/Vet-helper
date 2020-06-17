           
<div class="row"> 
<!-- <a class="btn btn-success" href="##"onclick="navigacija(sesija_arklys)">Whole animal</a> -->
<div class="  col- btn-group btn-group-toggle" data-toggle="buttons">
<label class=" puses btn btn-success">
      <input type="button" class="puse btn" name="puse"  autocomplete="off" checked value ="Whole animal" >
    </label>
    <label class="puses btn btn-secondary">
      <button type="button" class="puse btn" name="puse" value ="Left"  autocomplete="off" > Right</button>
    </label>
    <label class="puses btn btn-secondary">
      <button type="button" class="puse btn" name="puse" value ="Right" autocomplete="off"> Left</button>
    </label>
    
  </div>
  </div>
  <script>
 $('.puse').click(function (){
    $('.puse').css({
         'bacground-color':'black',
         'color':'black'
     });
    $(this).css({
         'bacground-color':'#218838',
         'color':'white'
     });
    $('.2ndlayer').css('display','block');
   x=$('.2ndlayer:contains("'+$(this).val()+'")')|| $('.2ndlayer:contains("'+$(this).val().toLowerCase()+'")');
  
   
x.css('display','none');
// if(x.html('id'))

// $('.2ndlayer').css('display','none');
 });
  </script>