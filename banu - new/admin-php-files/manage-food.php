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
}
body{

display: flex;
justify-content: center;
height: 100vh;
background-color: orange;
font-family: 'Poppins', sans-serif;

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

margin-top: 4rem;;
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
        <h1>food</h1>
       
        <!-- <a href="add-admin.php"> Add </a> -->
        <a href="<?php echo URL; ?>admin/add-food.php">Add</a>

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
    if (isset($_SESSION['unathorize'])){
      echo $_SESSION['unathorize'];
      unset($_SESSION['unathorize']);
  }
  if (isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
  }
  if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
    ?>

        <table border="1">
            <tr>
                <th>id</th>
                <th>title</th>
            
                <th>price</th>
                <th>img</th>
                <!-- <th>instock</th>
                <th>outstock</th> -->
                <th></th>
            </tr>
            <?php
              $sql = "SELECT * FROM food_table"; 

              $res = mysqli_query($conn, $sql);

              // if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title= $rows['title'];
                    $price= $rows['price'];
                    $image_name = $rows['image_name'];
                    $in_stock = $rows['in_stock'];
                    $out_stock = $rows['out_stock'];

                    ?>
                   
                    <tr>
                      <td><?php echo $sn++; ?></td>
                      <td><?php echo $title; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php
                      
                      if($image_name!=""){
                        ?>
                        <img src= "<?php echo URL; ?>images/food/<?php echo $image_name; ?>"  id="item">

                        <?php 
                      }
                      else{
                        echo "error";
                      }
                      ?>
                      </td>
                      
                      <td><a href="<?php echo URL; ?>admin/update-food.php?id=<?php echo $id; ?>">update </a>
                      <a href="<?php echo URL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" >delete</a>


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
