
<?php

require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()){
    Redirect::to('index.php');
}
if (Input::exists()){
    if(Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST,array(
            'name' =>array(
                'required'=>true,
                'min'=>2,
                'max'=>50
            ),
            'email' => array(
                // 'required'=>false,
                'min'=>4
            ),
            'contacts' => array(
                // 'required'=>false,
                'min'=>4
            ),
            'logo' => array(
                // 'required'=>false,
                'min'=>0
            )
            ));

            if($validation->passed()){
                try{
                    $user->update(array(
                        'name' => Input::get('name'),
                        'e_mail' => Input::get('email'),
                        'contacts' => Input::get('contacts'),
                        'logo' =>Input::get('logo')
                    ));
                Session::flash('home','Your details have updated');
                // Redirect::to('index.php');  
                }catch (Excption $e){
                    die($e->getMessage());
                }
            }
            else{
            foreach ($validate->errors() as $error){
                Session::flash('home',$error, '<br>');
            }}
    }
}
?>


<form action="update.php" method="post" enctype="multipart/form-data">
    <div class="field">
    <label for="name">Name: </label>
    <input type="text" name="name" value="<?php echo escape($user->data()->name) ?>">
    </div>
    <div class="field">
    <label for="email">E-mail: </label>
    <input type="text" name="email" value="<?php echo escape($user->data()->e_mail) ?>">
    </div>
    <div class="field">
    <label for="contacts">Contacts: </label>
    <input type="text" name="contacts" value="<?php echo escape($user->data()->contacts) ?>">
        <input type="hidden" name="token" value="<?php  echo Token::generate();?>">
        
    </div>
    <img  onerror="this.style.display='none'" alt="LOGO" style="width:200px" id="outputImg" class=" output" src="users/<?php echo escape($user->data()->username).'/'.'logo'.'/'.escape($user->data()->logo)?>"/>
    <label class = "btn btn-primary" for="fileToUpload">Choose file </label>
    <input class="btn btn-primary" accept="image/*" type="file" name="fileToUpload" id="fileToUpload" value="" onchange="loadFile(event)">
   <input  type="hidden" name="logo" value="<?php echo(escape($user->data()->logo))?>"><br>
   <input class="btn btn-primary mt-2" type="submit" value="Update">
</form>
<script>

  var loadFile = function(event) {
    var output = document.getElementById('outputImg');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      ('#outputImg').css('display','block');
    }
  };
</script>
<?php
// $structure = "users/{$user->data()->username}/logo/>";
// if (!mkdir($structure, 0777, true)) {
    // die('Failed to create folders...');
// }
$target_dir = "users/{$user->data()->username}/logo/";
@$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_FILES['fileToUpload'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if (@$_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "svg" ) {
    // echo "Sorry, only JPG, SVG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $files = glob('users/'.$user->data()->username.'/logo/*'); // get all file names
            foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
}
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// for($i=0; $i<$total;$i++){

//     if ($_FILES['fileToUpload']['name'][$i]!=""){
//         // $mpdf->AddPage();
        @$_POST['fileToUpload'] = $_FILES['fileToUpload'];
        echo '<br>';
        if($_POST['fileToUpload']!="")
       { $_POST['logo'] = Input::get('fileToUpload')['name'];}
      
//     } 
if($uploadOk != 0){
 try{
    $user->update(array(
        'logo' =>Input::get('logo')
    ));
Session::flash('home','Your details have updated');
Redirect::to('index.php');  
}catch (Excption $e){
    die($e->getMessage());
    Session::flash('home','Nope');
}
// Redirect::to('index.php');  
Session::flash('home','Your details have updated');

}
// }
@Redirect::to('index.php');  

?>