<?php
require_once 'includes/core.php';
require_once 'includes/header.php';

if(!is_login()){
    redirect('index.php');
}

echo "<h2>Posts</h2>";


require_once 'includes/footer.php';
