<?php
include('includes/header.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $search = ""; 

    $sql = "SELECT * FROM FOOD_TABLE WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count > 0) { 
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        header('location:'.URL);
        exit();
    }
} else {
    header('location:'.URL);
    exit();
}
?>


    <section class="food-search">
        <div class="container">
            
            <!-- <h2 class="text-center text-white">Fill this form to confirm your order.</h2> -->

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php 

                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                        ?>
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>"
                                alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
            
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <!-- <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required> -->

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

if (isset($_POST['submit'])) {

    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $date = date("Y-m-d h:i:sa");
    $customer = $_POST['full-name'];
    $phone_no = $_POST['contact'];
    $address = $_POST['address'];

    $sql2 = "INSERT INTO order_table SET 
    food = '$food',
    price = '$price',
    qty = '$qty',
    total = '$total',
    date = '$date',
    customer = '$customer',
    phone_no = '$phone_no',
    address = '$address'
    ";

$res2 = mysqli_query($conn, $sql2);
if ($res2 == true) {
// $_SESSION['order'] = '<div class="success text-center></div>';
echo '<div style="position:absolute;top:200px;background-color:green;color:white;padding:1.4rem" class="success">Added successfully</div>';
// header('location:' . URL);
} else {
$_SESSION['order'] = '<div class="success text-center>Added Failed</div>';
header('location:' . URL);
}
}

    // if (isset($_POST['in_stock'])) {
    //     $in_stock = $_POST['in_stock'];
    // } else {
    //     $in_stock = "no";
    // }

    // if (isset($_FILES['image']['name'])) {
    //     $image_name = $_FILES['image']['name'];

    //     if ($image_name != "") {
    //         $extension = end(explode('.', $image_name));
    //         $image_name = "f" . rand(000, 999) . '.' . $extension;
    //         $source_path = $_FILES['image']['tmp_name'];
    //         $destination_path = "../images/food/" . $image_name;
    //         $upload = move_uploaded_file($source_path, $destination_path);

    //         if ($upload == false) {
    //             $_SESSION['upload'] = "Failed";
    //             header('location:' . URL . 'admin/add-food.php');
    //             die();
    //         }
    //     } }
    // } else {
    //     $image_name = "";
    // }

            ?>

        </div>
    </section>

    <?php
include('includes/footer.php');
?>