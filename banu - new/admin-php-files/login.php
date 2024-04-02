<?php
include('../config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

    <style>
        .dash{

            background-color: red;
        }
        .dash {

background-color: red;
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');


* {

margin: 0;
padding: 0;
font-family: 'Poppins', sans-serif;
box-sizing: border-box;
}

body {

display: flex;
justify-content: center;
height: 100vh;
background-color: orange;

}

.container {

width: 100%;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
}


form {

display: flex;
flex-direction: column;
margin-top: 10rem;
width: 400px;


}

input {

padding: 0.7rem;
margin-bottom: 1rem;
width: 200px;
text-align: center;
}

h1 {

margin-bottom: 1rem;


color: yellow;
}

label {
color: whitesmoke;
}

.btn {

background-color: red;
color: white;
border: none;
padding: 1rem;
font-size: 1.3rem;
}

.form-btn {
text-align: center;
}
    </style>
</head>

<body>
    <div class="container">
        
    <?php
    if(isset($_SESSION['login'])){
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login'])){
      echo $_SESSION['no-login'];
      unset($_SESSION['no-login']);
    }

    ?>
  <form style="border: 1px solid red;text-align:center;padding:3rem" action="login.php" method="post">
        <h1 style="text-align: center;color :red">admin login</h1>
        <div class="form-group">
            <input  type="text" placeholder="Username:" name="username" class="form-control">
        </div>
        <div class="form-group">
            <input  type="password" placeholder="Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="submit" class="btn btn-success">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register</a></p></div>
    </div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = 'Success';
        $_SESSION['user'] = $username;
        header("location:" . URL . 'admin/');
    } else {
        $_SESSION['login'] = '<div style ="background-color:red;color:white;position:absolute;top:200px;font-size:1.;padding:1rem" class="error">Invalid email or password. Please try again.</div>';
        header("location:" . URL . 'admin/login.php');
    }
}
?>
