<?php
require_once 'includes/core.php';
require_once 'includes/data.php';

if(isset($_POST['submit'])){
    $username = isset($_POST['username'])?$_POST['username']:null;
    $password = isset($_POST['password'])?$_POST['password']:null;    
   
    //fetch data from database
    $user = find_user($username,$password);
    if($user){            
        set_login($user);    
        header('Location:dashboard.php');
    }else{
        set_message('error','Invalid Username or Password');
        header('Location:index.php');
    }

}else{
    header('Location:index.php');
}