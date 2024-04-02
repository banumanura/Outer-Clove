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

*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;

}
a{
      background-color: yellow;
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
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

table td{
padding: 3rem;
}
table{
  margin-top: 3rem;
}

#item{
  width: 100px;
  height: 100px;
}
  </style>
</head>
<body>
    <div class="admin-page">
        <h1>Category</h1>
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
      if (isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
    if (isset($_SESSION['not-found'])){
      echo $_SESSION['not-found'];
      unset($_SESSION['not-found']);
  }
  if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['upload'])){
  echo $_SESSION['upload'];
  unset($_SESSION['upload']);
}
if (isset($_SESSION['failed'])){
  echo $_SESSION['failed'];
  unset($_SESSION['failed']);
}
        
        ?>
        <br>
        <!-- <a href="add-admin.php"> Add </a> -->
      
       
        <a href="<?php echo URL; ?>admin/add-category.php">Add</a>

        <table border="1">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>img</th>
                <!-- <th>instock</th>
                <th>outstock</th> -->
                <th></th>
            </tr>
            <?php
              $sql = "SELECT * FROM category_table"; 

              $res = mysqli_query($conn, $sql);

              // if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title= $rows['title'];
                    $image_name = $rows['image_name'];
                    $in_stock = $rows['in_stock'];
                    $out_stock = $rows['out_stock'];

                    ?>
                   
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $title; ?></td>
                      <td><?php
                      
                      if($image_name!=""){
                        ?>
                        <img src= "<?php echo URL; ?>images/category/<?php echo $image_name; ?>"  id="item">

                        <?php 
                      }
                      else{
                        echo "error";
                      }
                      ?></td>
                      <!-- <td><?php echo $in_stock; ?></td>
                      <td><?php echo $out_stock; ?></td> -->
                      <td><a href="<?php echo URL; ?>admin/update-category.php?id=<?php echo $id; ?>">update </a>
                      <a href="<?php echo URL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" >delete</a>
                     
                      

                      </td>
                    </tr>
                   <?php
                    
                  }
                }
                else{

                  echo "error";

                }
              ?>
            
        </table>
    </div>
</body>
</html>
