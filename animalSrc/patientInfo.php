<!-- Formos išskleidžiamas mygtukas -->
<div class="dropdown row">
  <!-- <button class="col- btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
  Animal information </button> -->

<!-- Išskleidžiama Forma informacijai -->
<!-- <div class=" col- dropdown-menu formSize"     aria-labelledby="dropdownMenu3">                   -->
    <!-- <form class=" forma form-group" action="pdfGen.php" method="post" id="ownerForm"> -->
<form method="post" enctype="multipart/form-data" action= "pdfGen.php" class=" forma form-group col-" target="_blank" >
  <label for="AnimalName">Animal name</label>      <input value=" " type="text" name="AnimalName" id="AnimalName" value=""><br>
  <label for="date">Date </label><input value="" type="date" id="Date" name="date" value=""><br>
  <div class="select">
      <label for="gender">Gender</label> 
      <select class="" id="Gender" name="gender">
        <option value="Mare">Mare</option>
        <option value="Gelding">Gelding</option>
        <option value="Stalion">Stalion</option>
      </select> 
  </div>
  <label for="age">Age</label>  <input type="number" id="Age"  name="age"    value=""><br>
  <label for="owner">Owner</label>  <input type="text"   id="Owner"   value="" name="owner"><br>
  <label for="phone">Phone </label> <input name ="phone"type="text" id="Phone"   value="+370"><br>
  <label for="address">Address </label> <input type="text"  name="address" id="Address" value="">
<!-- </div> -->