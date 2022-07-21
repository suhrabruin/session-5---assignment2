<?php
require_once 'includes/core.php';

if(!is_login()){
    redirect('index.php');
}

echo '<pre>';
print_r($_GET);