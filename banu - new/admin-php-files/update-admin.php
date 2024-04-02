<?php
include('../config/constant.php');

$id = $_GET['id'];

$sql = "SELECT * FROM admin_table WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == false) {
    
    header("location:". URL .'admin/manage-admin.php');
    exit();
}

$count = mysqli_num_rows($res);

if ($count == 1) {
    $row = mysqli_fetch_assoc($res);

    $full_name = $row['full_name'];
    $username = $row['username'];
} else {
   
    header("location:". URL .'admin/manage-admin.php');
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 10rem;
        }

        input {
            padding: 0.7rem;
            margin-bottom: 1rem;
        }

        h1 {
            margin-bottom: 1rem;
        }

        .btn {
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
        <form action="" method="post">
            <h1>Administrator updating</h1>
            <label for="full_name">Fullname</label>
            <input type="text" name="full_name" placeholder="fullname" value="<?php echo $full_name; ?>">
            <label for="username">username</label>
            <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
            
            <input type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>

    <?php

    if(isset($_POST['submit'])){
      
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
     

      $sql = "UPDATE admin_table SET full_name='$full_name', username='$username' WHERE id='$id' ";

      $res = mysqli_query($conn,$sql);

      if($res==true){
        $_SESSION['update'] = 'Success';
        header("location:". URL .'admin/manage-admin.php');
        exit();
      }
      else{
        $_SESSION['update'] = 'Failed';
        header("location:". URL .'admin/manage-admin.php');
        exit();
      }
    }
    ?>
</body>
</html>
