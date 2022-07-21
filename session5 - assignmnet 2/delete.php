<?php
require_once 'includes/core.php';
require_once 'includes/data.php';

if(!is_login()){
    redirect('index.php');
}

$id = (int)$_GET['id'];
delete_user($id);
redirect('users.php');