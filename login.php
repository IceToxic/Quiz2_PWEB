<?php
session_start();
require './database/db.php';

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = row($username,$password);
        if ($result == false ){
          echo "<script>alert('username / password salah');</script>";
        } else{
          $_SESSION['username'] = $result['username'];
          $_SESSION['id'] = $result['id'];
          $_SESSION["login"] = true;
          if( isset($_POST['remember']) ) {
            setcookie('id', $result['id'], time()+60);
            setcookie('username', $result['username'], time()+60);
          }
        header('Location: index.php');
      }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../Login/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/Login/assets/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Login</h1>
    <label class="visually-hidden">Username</label>
    <input type="username" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
  </form>
</main>


    
  </body>
</html>
