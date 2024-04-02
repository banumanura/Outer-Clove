<?php
include('../config/constant.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width= , initial-scale=1.0" />
    <title>add food</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }

        body {

            background-color: orange;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 500px;
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
            <h1>Add Food</h1>

            <?php
            if (isset($_SESSION['upload'])) {
                echo ($_SESSION['upload']);
                unset($_SESSION['upload']);
            }
            if (isset($_SESSION['add'])) {
                echo ($_SESSION['add']);
                unset($_SESSION['add']);
            }
            ?>

            <div class="title">
                <label for="title">Title</label>
                <input id="in" type="text" placeholder="title" name="title" />
            </div>
            <div class="title">
                <label for="">description</label>
                <textarea name="description" id="" cols="25" rows="10"></textarea>
            </div>
            <div class="title">
                <label for="title">Price</label>
                <input id="in" type="text" placeholder="price" name="price" />
            </div>
            <div class="title">
                <label for="title">Select image</label>
                <input id="" type="file" name="image" />
            </div>

            <div class="title">
                <label for="">category</label>
                <select name="category" id="">
                    <?php
                    $sql = "SELECT * FROM category_table WHERE in_stock='yes'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                    ?>
                            <option value="<?php echo $id; ?>"> <?php echo $title; ?> </option>
                        <?php
                        }
                    } else {
                        ?>
                        <option value="0"> not found </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="title">
                <label for="title">featured</label>
                <input name="in_stock" value="yes" type="radio" />yes <input value="no" name="in_stock" type="radio" />no
            </div>
            <div class="title">
                <label for="title">active</label>
                <input value="yes" name="out_stock" type="radio" />yes <input value="no" name="out_stock" type="radio" />no
            </div>
            <input id="btn" type="submit" name="submit" value="Add" />
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description']; // Change 'des' to 'description'
            $price = $_POST['price'];
            $category = $_POST['category'];

            if (isset($_POST['in_stock'])) {
                $in_stock = $_POST['in_stock'];
            } else {
                $in_stock = "no";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $extension = end(explode('.', $image_name));
                    $image_name = "f" . rand(000, 999) . '.' . $extension;
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/food/" . $image_name;
                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "Failed";
                        header('location:' . URL . 'admin/add-food.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }

            $sql2 = "INSERT INTO food_table SET 
                        title='$title',
                        description ='$description',
                        price=$price,
                        image_name='$image_name',
                        category=$category,
                        in_stock='$in_stock',
                        out_stock='$out_stock'"; // Assuming $out_stock is defined somewhere

            $res2 = mysqli_query($conn, $sql2);
            if ($res2 == true) {
                $_SESSION['add'] = "Added successfully";
                header('location:' . URL . 'admin/manage-food.php');
            } else {
                $_SESSION['add'] = "Failed";
                header('location:' . URL . 'admin/add-food.php');
            }
        }
        ?>

    </div>
</body>

</html>