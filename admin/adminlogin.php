<?php

if(isset($_REQUEST['login'])) {

    // get usernames from form
    $username = $_REQUEST['username'];

    $options = ['cost' => 9,];

    // Get username and hashed password from the database
    $login_sql="SELECT * FROM `users` WHERE `username` = '$username'";
    $login_query=mysqli_query($dbconnect,$login_sql);
    $login_rs=mysqli_fetch_assoc($login_query);

    // Hash password and compare with password in database
    if (password_verify($_REQUEST['password'],$login_rs['password'])) {
        
        // password matches
        $_SESSION['admin']=$login_rs['username'];
        echo 'Password is valid!';
    }   // end valid password if
    // Invalid password
    else {
        echo 'Invalid password.';
        unset($_SESSION);
        $login_error = "Incorrect username / password";
        header("Location: index.php?page=../admin/login&error=$login_error");

        
    }   // end invalid password else

} // end isset login if

?>