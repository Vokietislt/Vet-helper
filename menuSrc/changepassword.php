<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()){
    Redirect::to('index.php');
}
if (Input::exists()){
    if(Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'password_current'=>array(
                'required'=>true,
                'min'=>6
            ),
            'password_new'=>array(
                'required'=>true,
                'min'=>6
            ),
            'password_new_again'=>array(
                'required'=>true,
                'min'=>6,
                'matches'=>'password_new'
            )
            ));
            if($validation->passed()){

            if(Hash::make(Input::get('password_current'),$user->data()->salt) !== $user->data()->password) {
                        echo 'Your current password is wrong';
                    }
                else {
                    $salt = Hash::salt(16);
                    $user -> update(array(
                        'password' => Hash::make(Input::get('password_new'),$salt),
                        'salt'=> $salt
                    ));
                    Session::flash('home','Your password has been changed!');
                    Redirect::to('index.php');
                }
            }else {
                foreach( $validation->errors() as $error){
                    Redirect::to('index.php');
                    Session::flash('home',$error, '<br>');

                }
            }
    }
}
?>
<form action="changepassword.php" method="post">
    <div class="field">
    <label for="password_current">Current password: </label>
    <input type="password" id="password_current" name="password_current"  autocomplete="off" >
    </div>
    <div class="field">
    <label for="password_new">Choose a password: </label>
    <input type="password" id="password_new" name="password_new"  autocomplete="off" >
    </div>
    <div class="field">
    <label for="password_new_again">Enter your password: </label>
    <input type="password" id="password_new_again" name="password_new_again" autocomplete="off" >
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Change">
</form>