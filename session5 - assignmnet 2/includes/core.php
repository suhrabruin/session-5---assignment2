<?php

session_start();

function is_login(){

    return  isset($_SESSION['login']) ? $_SESSION['login'] : false;
}

function set_login($user){
    
    $_SESSION['auth_user'] = $user;
    $_SESSION['login'] = true;
}


function logout(){
    $_SESSION['login'] = false;
    session_destroy();
    header('Location:index.php');
}


function get_authenticate_user(){
    return $_SESSION['auth_user'];
}

function set_message($name,$message){
    $_SESSION[$name] = $message;
}


function get_message($name){
    $msg =  isset($_SESSION[$name])? $_SESSION[$name]:'';
    $_SESSION[$name] = null;
    return $msg;
}


function redirect($redirect_to){      
    header('Location: '.$redirect_to);
}


function upload_file($file,$path){
    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_temp_name = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];
 
     if($file_type!='image/jpeg' && $file_type!='image/jpg' && $file_type!='image/png'){        
         set_message("error","ONLY JPEG/PNG Images are allowed");
     }else{       
         return move_uploaded_file($file_temp_name,$path);
     }
}



function set_users($users){
    $_SESSION['users'] = $users;
}
function get_users(){
    return isset($_SESSION['users']) ? $_SESSION['users'] : null;
}