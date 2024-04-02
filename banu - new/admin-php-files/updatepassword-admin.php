<?php
include('../config/constant.php');

// Initialize variables
$old_password = $new_password = $confirm_password = '';

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
            <label for="old_password">Old Password</label>
            <input type="text" name="old_password" placeholder="Old Password" value="<?php echo $old_password; ?>">
            <label for="new_password">New_Password</label>
            <input type="text" name="new_password" placeholder="new_password" value="<?php echo $new_password; ?>">
            <label for="confirm_password">Confirm_Password</label>
            <input type="text" name="confirm_password" placeholder="confirm_password" value="<?php echo $confirm_password; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <input type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>

    <?php

    if(isset($_POST['submit'])){
      
      $id = $_POST['id'];
      $old_password = md5($_POST['old_password']);
      $new_password = md5($_POST['new_password']);
      $confirm_password = md5($_POST['confirm_password']);
     
      // Rest of your code remains unchanged...
    }
    ?>
</body>
</html>
