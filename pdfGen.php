<?php
// nuotrauku tikrinimas
    $target_dir = "uploads/";
    // Count # of uploaded files in array
    $total = count($_FILES['fileToUpload']['name']);
    for($i=0; $i<$total;$i++){
        if ($_FILES['fileToUpload']['name'][$i]!=""){

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
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
            if ($_FILES["fileToUpload"]["size"][$i] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "bmp" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
?>
<?php
require_once 'core/init.php';
$user = new User();

    
require __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$stylesheets = __DIR__ .'/css/stylePDF.css';
$stylesheet = file_get_contents($stylesheets);
$mpdf->WriteHTML($stylesheet,1);
if($user->isLoggedIn()){
    if($user->data()->logo!=null){
   $logo = '<div class="logoContainer"><img class="userlogo" src="users/'.escape($user->data()->username).'/'.'logo'.'/'.escape($user->data()->logo).'"alt="Logo"/></div>' ;}
    if($user->data()->contacts!=null)
     $phone = '<p>Tel.: '.$user->data()->contacts.'</p>';
     else {$phone = '';}
    if($user->data()->e_mail!=null)
     $email = '<p>E-mail: '.$user->data()->e_mail.'</p>';
     else {$email = '';}
}
    $mpdf->WriteHTML(
        $logo.
    '<h2>Info</h2>'.
    '<p>Name: '.$user->data()->name.' '.'</p>'
    .$phone.
     $email.
    '<p>Animal Name: '.$_POST['AnimalName'].'</p>'.
    '<p> Gender: '.$_POST['gender'].'</p>'.
    '<p> Date: '.$_POST['date'].'</p>'.
    '<p> Owner: '.$_POST['owner'].'</p>'.
    '<p>Phone number: '.$_POST['phone'].'</p>'.
    '<p>Adress: '.$_POST['address'].'</p>'.
    '<h2>Findings</h2>'.
    '<p class ="findings">'.$_POST['data'].'</p>'
    );
    $mpdf->WriteHTML('<h2>Images</h2>');
    // $x=var_dump($_POST);
    // $mpdf->WriteHTML($x);
?>
<?php
// Fotografiju ikelimas
for($i=0; $i<$total;$i++){

    if ($_FILES['fileToUpload']['name'][$i]!=""){
        // $mpdf->AddPage();
        $mpdf->WriteHTML('<div class="IMGconteiner"><img class="img" src = "./uploads/'.$_FILES['fileToUpload']['name'][$i].'"></div>');
        unlink('./uploads/'.$_FILES['fileToUpload']['name'][$i]);
    }
}
?>
<?php
// PDF isvedimas ir istrinimas is laikino folderio
$mpdf->Output($_POST['AnimalName']."_".$_POST['owner'].'.pdf','I');    
?>