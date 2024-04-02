<?php
include('../config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>add</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    * {

      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;

    }

    * {

      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }

    body{

      background-color: orange;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }


    form {

      display: flex;
      flex-direction: column;
      width: 400px;
      border: 1px solid black;
      padding: 1rem;
      margin-top: 4rem;
      margin-left: 4rem;
    }

    .title {

      font-size: 2rem;
      display: flex;
      justify-content: space-between;
      margin-bottom: 1rem;
    }

    h1 {
      margin-bottom: 2rem;
      color: red;
    }

    #btn {

      background-color: rgb(255, 73, 73);
      padding: 0.8rem;
      font-size: 1.4rem;
      color: whitesmoke;
      border: none;
      border-radius: 10px;

    }

    #in {
      padding: 1rem;
      font-size: 1rem;
    }
  </style>
</head>

<body>

  <div class="add-page">


    <form action="" method="post" enctype="multipart/form-data">


      <?php
      if (isset($_SESSION['add'])) {
        echo ($_SESSION['add']);
        unset($_SESSION['add']);
      }
      if (isset($_SESSION['upload'])) {
        echo ($_SESSION['upload']);
        unset($_SESSION['upload']);
      }
      ?>

      <h1>Add Catergory</h1>

      <div class="title">
        <label for="title">Title</label>
        <input id="in" type="text" name="title" placeholder="Title">
      </div>
      <div class="title">
        <label for="title">New image</label>
        <input id="in" type="file" name="image">
      </div>
      <div class="title">
        <label for="title">featured</label>
        <input type="radio" name="in_stock" value="yes">yes
        <input type="radio" name="in_stock" value="no">no
      </div>
      <div class="title">
        <label for="title">active</label>
        <input type="radio" name="out_stock" value="yes">yes
        <input type="radio" name="out_stock" value="no">no
      </div>
      <input id="btn" type="submit" name="submit" value="Add">



    </form>
  </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $title = $_POST['title'];

  if (isset($_POST['in_stock'])) {
    $in_stock = $_POST['in_stock'];
  } else {
    $in_stock = "no";
  }
  if (isset($_POST['out_stock'])) {
    $out_stock = $_POST['out_stock'];
  } else {
    $out_stock = "no";
  }

  // print_r($_FILES['image']);

  // die();

  if (isset($_FILES['image']['name'])) {
    $image_name = $_FILES['image']['name'];

    if ($image_name != "") {
      $extension = end(explode('.', $image_name));

      $image_name = "Category" . rand(000, 999) . '.' . $extension;

      $source_path = $_FILES['image']['tmp_name'];
      $destination_path = "../images/category/" . $image_name;
      $upload = move_uploaded_file($source_path, $destination_path);

      if ($upload == false) {
        $_SESSION['upload'] = "Failed";
        header('location:' . URL . 'admin/add-category.php');
        die();
      }
    }
  } else {
    $image_name = "";
  }

  $sql = "INSERT INTO category_table SET 
  title='$title',
  image_name='$image_name',
  in_stock='$in_stock',
  out_stock='$out_stock'";
  $res = mysqli_query($conn, $sql);
  if ($res == true) {
    $_SESSION['add'] = "Added successfully";
    header('location:' . URL . 'admin/manage-category.php');
  } else {
    $_SESSION['add'] = "Failed";
    header('location:' . URL . 'admin/add-category.php');
  }
}
?>