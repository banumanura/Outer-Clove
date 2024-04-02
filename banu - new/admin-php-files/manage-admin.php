<?php
include('../config/constant.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add.css">
    <style> 
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a{
      background-color: yellow;
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
    }
*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{

display: flex;
justify-content: center;
height: 100vh;
background-color: orange;
}
.admin-page{

height: auto;
margin-top: 3rem;
text-align: center;

}

button{

padding: 1rem;
background-color: rgb(255, 88, 88);
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}
table{

  margin-top: 2rem;
}

table td{
padding: 3rem;
font-size: 2.4rem;
}
  </style>
</head>
<body>
    <div class="admin-page">
        <h1>Managing Administrators</h1>
        <br>
        <?php 
        if (isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        
        if (isset($_SESSION['delete'])){
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
        }
       if (isset($_SESSION['error'])){
       echo $_SESSION['error'];
       unset($_SESSION['error']);
        }
        if (isset($_SESSION['not match'])){
          echo $_SESSION['not match'];
          unset($_SESSION['not match']);
           }
           if (isset($_SESSION['changed'])){
            echo $_SESSION['changed'];
            unset($_SESSION['changed']);
             }
        ?>
        <br>
        <!-- <a href="add-admin.php"> Add </a> -->
        <a style="color: red; text-decoration:none; background-color:yellow; padding :1rem;" href="<?php echo URL; ?>admin/add-admin.php">Add</a>

        <table border="1">
            <tr>
                <th>number</th>
                <th>name</th>
                <th>username</th>
                <th>edit</th>
            </tr>
            <?php
              $sql = "SELECT * FROM admin_table"; 

              $res = mysqli_query($conn, $sql);

              if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];

                    ?>
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $full_name; ?></td>
                      <td><?php echo $username; ?></td>
                      <td><a href="<?php echo URL; ?>admin/update-admin.php?id=<?php echo $id; ?>" >update</a>
                      <a style="background-color: yellow;" href="<?php echo URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"> delete </a>
                      <a href="<?php echo URL; ?>admin/updatepassword-admin.php?id=<?php echo $id; ?>"> set password </a>
                      

                      </td>
                    </tr>
                    <?php
                  }
                }
              }
            ?>
        </table>
    </div>
</body>
</html>
