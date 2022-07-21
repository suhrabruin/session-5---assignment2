<?php
require_once 'includes/core.php';
require_once 'includes/data.php';
require_once 'includes/header.php';

if(!is_login()){
    redirect('index.php');    
}

if(isset($_POST['register'])){    
    // $userid = 123;//get user id from database the last entry
    

    $userid =generate_id();
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $errors = null;
    if(empty($name)){
        $errors['name'] = 'Name field is required!';
    }
    if(empty($age)){
        $errors['age'] = 'Age field is required!';
    }
    if(empty($email)){
        $errors['email'] = 'Email field is required!';
    }
    if(empty($username)){
        $errors['username'] = 'Username field is required!';
    }
    if(empty($password)){
        $errors['password'] = 'Password field is required!';
    }
    if(empty($c_password)){
        $errors['c_password'] = 'Confirm Password field is required!';
    }
    if($password !==$c_password){
        $errors['c_password'] = 'Password and Confirm Password fields do not match!';
    }
    set_message('error',$errors);
    if(empty($errors)){

        $path = 'storage/images/profile-demo.png';
        if(isset($_FILES['profile_image']['tmp_name']) && !empty($_FILES['profile_image']['tmp_name'])){
            $file = $_FILES['profile_image'];
            $path = "storage/images/".$userid."_".$username.".jpg";           
            upload_file($file,$path);
        }
        
        
        $user = [
            'id'=>$userid,
            'name'=>$name,
            'age'=>$age,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password,
            'image_path'=>$path
        ];

        add_user($user);        

        redirect('users.php');
    }
}

    echo "<h2>Register</h2>";

?>
<div id="register-div">
        <h3>User Registration Form</h3>
        <?php 
        $error[] = get_message('error');
        $error = $error[0];                
        ?>
        <form action="register.php" method="post" id="register_form" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input class="user-input" type="text" name="name" id="name" placeholder="Name" 
            value="<?php echo isset($_POST['name'])?$_POST['name']:"";?>"/>
            <span class="error"><?php echo isset($error['name'])?$error['name']:"";?></span><br/>

            <label for="age">Age:</label>
            <input class="user-input" type="text" name="age" id="age" placeholder="Age"
            value="<?php echo isset($_POST['age'])?$_POST['age']:"";?>"/>
            <span class="error"><?php echo isset($error['age'])?$error['age']:"";?></span><br/>

            <label for="email">Email:</label>
            <input class="user-input" type="email" name="email" id="email" placeholder="Email"
            value="<?php echo isset($_POST['email'])?$_POST['email']:"";?>"/>
            <span class="error"><?php echo isset($error['email'])?$error['email']:"";?></span><br/>
            
            <label for="username">Username:</label>            
            <input class="user-input" type="username" name="username" placeholder="Username"
            value="<?php echo isset($_POST['username'])?$_POST['username']:"";?>"/>
            <span class="error"><?php echo isset($error['username'])?$error['username']:"";?></span><br/>
            
            <label for="password">Password:</label>            
            <input class="user-input" type="password" name="password" placeholder="Password"
            value="<?php echo isset($_POST['password'])?$_POST['password']:"";?>"/>
            <span class="error"><?php echo isset($error['password'])?$error['password']:"";?></span><br/>
            
            <label for="c_password">Confirm Password:</label>
            <input class="user-input" type="password" name="c_password" id="c_password" placeholder="Confirm your password"
            value="<?php echo isset($_POST['c_password'])?$_POST['c_password']:"";?>"/>
            <span class="error"><?php echo isset($error['c_password'])?$error['c_password']:"";?></span><br/>
            
            <label for="profile_image">Upload Your Photo</label>
            <input class="user-input" type="file" name="profile_image" id="profile_image" /><br/>


            <input type="submit" name="register" id="btn-register" value="Register"/>            
        </form>                
        <p class="error"><?php print_r(get_message('error'));?></p>
    </div>



<?php
//}//end else
require_once 'includes/footer.php';
