  <!--  -->
  <!-- IMG -->
  <div class="dropdown row img">
    <button class="col- btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      IMG </button>
      <div class=" col- dropdown-menu formSize"     aria-labelledby="dropdownMenu3">
      <?php
          for($output =1;$output<=10;$output++){
  echo'<input  type="file" accept="image/*"  name="fileToUpload[]" onchange="loadFile(event,'.$output.')" ><img id="output'.$output.'" class="output"/>';
          }
      ?>
      </div>
    </div>
    <!-- informacija -->
          
</form>
<script>
  var loadFile = function(event,id) {
    var output = document.getElementById('output'+id);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
</div>  