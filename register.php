
<?php
require_once 'core/init.php';


if (Input::exists()){
    if (Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST , array(
            
            'username' => array(
                'required'=> true,
                'min '=> 2,
                'max' => 20,
                'unique'=> 'users'
            ),
            'password_reg' => array(
                'required' => true,
                'min'=> 6
            ),
            'password_again' => array(
                'required' =>true,
                'matches' => 'password_reg'
            ), 
            'email' => array(
                'required' =>false,
            ), 
            'name' => array(
                'required' => true,
                'min' =>2,
                'max' => 50
                )
            ));
        if ($validation->passed()){
            $user = new User();
            $salt = Hash::salt(16);
            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password_reg'),$salt),
                    'salt' => $salt,
                    'e_mail' => Input::get('email'),
                    'name' => Input::get('name'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group_id' => 1
                ));
                mkdir('users/'.Input::get('username'));
                mkdir('users/'.Input::get('username').'/logo');
                Session::flash('home','You have been registered and can now log in!');
                Redirect::to('index.php');

            }catch (Exception $e){
                    die($e->getMessage());
                }
                Session::flash('home','You registered succsessfully');
                Redirect::to('index.html');
        } else {
            $er="";
                foreach($validation->errors() as $error){
                    $er.= $error.'<br>';
                }
                Session::flash('home',$er);
                Redirect::to('index.php');
            }
        }
        else{echo 'no token';}
}else{echo 'input';}
        
        ?>
<form action="" method="post">
    <div class="field">
    <label for="username">Username: </label>
    <input type="text" id="username" name="username"  value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" >
    <div class="field">
    <label for="password">Choose a password: </label>
    <input type="password" id="password" name="password_reg" value="" autocomplete="off" >
    </div>
    <div class="field">
        <label for="password_again">Enter your password: </label>
        <input type="password" id="password_again" name="password_again" value="" autocomplete="off" >
    </div>
    <div class="field">
    <label for="e">email </label>
    <input type="text" id="email" name="email" value="" autocomplete="off" >
    </div>
    <div class="field">
    <label for="name">Enter your name: </label>
    <input type="text" id="name" name="name" value="<?php echo escape(Input::get('name')
); ?>" autocomplete="off" >
    </div>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="register">

</form>