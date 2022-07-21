<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php
  $auth_user = get_authenticate_user();
  ?>
    <div class="main-wrapper">
        <div class="header-menu">
            <ul>
                <li class="btn-home"><a href="dashboard.php">Home</a></li>
                <li class="btn-post"><a href="posts.php">Posts</a></li>
                <li class="btn-user"><a href="users.php">Users</a></li>                
                <li class="btn-profile"><a href="profile.php">Profile</a></li>
                <li class="btn-logout"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <p style="text-align:right;"><span >Dear <em><?php echo $auth_user['name'];?></em> please logout once done!</span></p>
        
        <div class="content-wrapper">
        <h1 style="text-align:center;">Session 5 - Assignment 2</h1>
