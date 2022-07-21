<?php
require_once 'includes/core.php';
require_once 'includes/data.php';

if(!is_login()){
    redirect('index.php');
}

$id = (int)$_GET['id'];
$path = $_GET['path'];
if($path =='storage/images/profile-demo.png'){
    set_message("error","Do not delete default image");
}else{
    die;
    if(file_exists($path)){
        if(unlink($path)){
            update_path($id,"");
        }   
    }
}
redirect('users.php');