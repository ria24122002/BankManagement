<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet"type="text/css"  href="../css/stylee.css">
</head>
<body>
    <div class="center">
        <h1>LOGIN</h1>
        <form method="post">
        <div class="text_field">
            <input type="text" name="username" id="username" required>
            <label>Username</label>
</div>
<div class="text_field">
            <input type="password" name="password" id="password" required>
            <label>Password</label>
</div>
<div class="pass">forgot Password?</div>
<input type="submit" name="login" value="login">
</form>

        

</div>
</html>
<?php
include  '../connection.php';
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select* from login where username='$username' and password='$password'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1){
        header("location:index.php");
    }
    else{
        ?>
    <script>
        alert("Wrong username or password!!");
        </script>
        <?php

    
    }
}

