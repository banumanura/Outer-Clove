<?php
include('../config/constant.php');

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin_table SET
       full_name = '$full_name',
       username = '$username',
       password = '$password'
       ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == TRUE) {
        $_SESSION['add'] = "Success";
    } else {
        $_SESSION['add'] = "Failed";
    }
    header("location:" . URL . 'admin/manage-admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
    <style>
        *{

margin: 0;
padding: 0;
box-sizing: border-box;
}
body{

display: flex;
justify-content: center;
height: 100vh;
}


form{

display: flex;
flex-direction: column;
margin-top: 10rem;


}

input{

padding: 0.7rem;
margin-bottom: 1rem;
}
h1{

margin-bottom: 1rem;
}

.btn{

background-color: rgb(82, 82, 255);
color: whitesmoke;
border: none;
padding: 1rem;
font-size: 1.3rem;
}


    </style>
</head>
<body>
    <div class="add-admins">
      <?php
      if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      ?>
        <form action="" method="post">
            <h1>Addministrator adding</h1>
            <label for="full_name">Fullname</label>
            <input type="text" name="full_name" placeholder="fullname">
            <label for="username">username</label>
            <input type="text" name="username" placeholder="username"> <!-- Corrected type attribute -->
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="submit" value="Add" class="btn">
        </form>
    </div>
</body>
</html>
