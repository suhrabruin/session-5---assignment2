<?php
require_once 'includes/core.php';
require_once 'includes/data.php';

if(!is_login()){
    redirect('index.php');    
}
if(isset($_POST['upload'])){
      
   $userid = $_POST['user_id'];
   $username = $_POST['username'];
   $file = $_FILES['profile_image'];
   $extension = substr($file['name'],strpos($file['name'],".")+1);
//    $path = "storage/images/".$userid."_".$username.".jpg";
   $path = "storage/images/".$userid."_".$username.".".$extension;
   

   
   if(upload_file($file,$path)){
       update_path($userid,$path);
   }

   redirect('profile.php');

}else{    
    echo "Invalid Action!";
    die;
}