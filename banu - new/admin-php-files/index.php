<?php
include('../config/constant.php');
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

  *{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;


  }

  body{

    background-color: whitesmoke;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .dash{

    background-color: orange;
    text-align: center;
    padding: 1rem;
    height:100vh;
    width: 100%;
    
  }

  .dash a{

    text-decoration: none;
    font-size: 2rem;
    margin: 1rem;
    color: red;
    font-weight: 600;
    background-color: yellow;
    padding: 1rem;
    border-radius: 30px;
  }
  h1{

    color: brown;
    font-size: 4rem;
    background-color: gold;
    padding: 1rem;
    margin-bottom: 2rem;
  }
</style>
 <div class="dash">
<h1>Clove Restaurant Dashboard</h1>

<a href="index.php">1. home</a>
<a href="manage-admin.php">2. admin</a>
<a href="manage-food.php">3. food</a>
<a href="manage-category.php">4. category</a>
<a href="manage-order.php">5. orders</a>
<a href="logout.php">6. logout</a>

</div>
     <?php
     if(isset($_SESSION['login'])){
       echo $_SESSION['login'];
       unset($_SESSION['login']);
     }
     ?>