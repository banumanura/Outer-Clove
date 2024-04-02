<?php
include('includes/header.php');
?>
<style> 
.food-menu-box {
    width: 300px;
    margin: 1%;
    background-color: whitesmoke;
    padding: 2%;
    float: left;
    border: 2px solid orange;
    border-radius: 15px;
}

.food-menu-img {
    width: 20%;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

.navbar-new {
    background-color: rgb(255, 244, 225);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;

}

/* CSS for All */
* {
    margin: 0 0;
    padding: 0 0;
    font-family: 'Poppins', sans-serif;
    text-decoration:none;
    list-style: none;
}

body {
    overflow-x: hidden;
    width: 100%;
    background-color: whitesmoke;

}

.icons {

    background-color: whitesmoke;
    padding: 1.2rem;
}

.icons li a {

    background-color: transparent;
    border: none;
}

h1 {

    color: orange;
    padding: 1rem;
    border: 3PX SOLID orange;
    width: 200px;
    text-align: center;
    border-radius: 30px;
}

ul li a {

    color: orange;
    font-size: 1.6rem;
    padding: 1rem;
    border-radius: 20px;
}

.container-res{

    margin-top: 3rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: orange;
}

.container-2 {


    width: 100%;
    display: flex;
    border: 1px solid red;
    align-items: center;
    background-color: rgb(255, 244, 225);

}

.container {
    width: 100%;
    margin: 0 auto;
    padding: 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;

}

.img-responsive {
    width: 100%;
}

.img-curve {
    border-radius: 15px;
}


.text-center {
    text-align: center;
}

.text-left {
    text-align: left;
}

.text-white {
    color: white;
}

.clearfix {
    clear: both;
    float: none;
}

a {
    color: #ff6b81;
    text-decoration: none;
}

a:hover {
    color: #ff4757;
}

.btn {
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
}

.btn-primary {
    background-color: yellow;
    color: red;
    cursor: pointer;
    padding: 0.7rem;
    border-radius: 40px;
}

.btn-primary:hover {
    color: white;
    background-color: #ff4757;
}

h2 {
    color: #2f3542;
    font-size: 2rem;
    margin-bottom: 2%;
}

h3 {
    font-size: 1.5rem;
}

.float-container {
    position: relative;
}

.float-text {
    position: absolute;
    bottom: 50px;
    left: 40%;
}

fieldset {
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}


/* CSSS for navbar section */

.logo-1 {

    margin-left: 3rem;
}

.links {

    display: flex;
    padding-right: 6rem;
}


/* CSS for Food SEarch Section */

.food-search {
    background-image: url(../images/Lovepik_com-401727686-summer-refreshing-drink.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"] {
    width: 700px;
    padding: 0.7rem;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}


/* CSS for Categories */
.categories {
    padding: 4% 0;
}

.container-1 {

    display: flex;
    align-items: center;
    justify-content: center;
}

.box-3 {
    width: 200px;
    height: 200px;
    border: 1px solid orange;
    border-radius: 40px;
}

.box-3 img {

    border-radius: 40px;
    height: 200px;
}


/* CSS for Food Menu */
.food-menu {
    background-color: #ececec;
    padding: 4% 0;
}

.food-menu-box {
    width: 300px;
    margin: 1%;
    background-color: whitesmoke;
    padding: 2%;
    float: left;
    border: 2px solid orange;
    border-radius: 15px;
}

.food-menu-img {
    width: 20%;
}

.food-menu-desc {
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price {
    font-size: 1.2rem;
    margin: 2% 0;
}

.food-detail {
    font-size: 1rem;
    color: #747d8c;
}


/* CSS for Social */
.social ul {
    list-style-type: none;
}

.social ul li {
    display: inline;
    padding: 1%;
}

/* for Order Section */
.order {
    width: 50%;
    margin: 0 auto;
    background-color: gold;
    padding: 1rem;
    border-radius: 20px;
}

.input-responsive {
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}

.order-label {
    margin-bottom: 1%;
    font-weight: bold;
}

.container-3 {

    display: flex;
    justify-content: center;
    align-items: center;
}



/* CSS for Mobile Size or Smaller Screen */

@media only screen and (max-width:768px) {
    .logo {
        width: 80%;
        float: none;
        margin: 1% auto;
    }

    .menu ul {
        text-align: center;
    }

    .food-search input[type="search"] {
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
    }

    .btn {
        width: 91%;
        padding: 2%;
    }

    .food-search {
        padding: 10% 0;
    }

    .categories {
        padding: 20% 0;
    }

    h2 {
        margin-bottom: 10%;
    }

    .box-3 {
        width: 100%;
        margin: 4% auto;
    }

    .food-menu {
        padding: 20% 0;
    }

    .food-menu-box {
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
    }

    .social {
        padding: 5% 0;
    }

    .order {
        width: 100%;
    }
}
</style>
<section class="categories">
<h2  class="text-center" style="color: orange   ">- Popular catergories -</h2>

    <div class="container">

        <?php
        // Display from DB
        $sql = "SELECT * FROM category_table";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];

                ?>
                <a href="<?php echo URL; ?>food.php?id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                            ?>
                            <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>"
                                 alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "<div class='msg'> Failed </div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<section style="margin-bottom: 2rem;" class="reservation-link text-center">
    <div class="container-res">
        <h2>Want to make reservation</h2>
        <a href="<?php echo URL; ?>reservation.php" class="btn btn-primary">Reserved now</a>
    </div>
</section>

<style>


    .food-search{
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/AD011219-21_original.jpg);

        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;

    }
</style>
<section class="food-search ">
    <div class="container">
        <form action="<?php echo URL; ?>search.php" method="POST">
            <input id="search" type="search" name="search" placeholder="Search for Food.." required>
            <input id="search-btn" type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<?php 
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);

    if (isset($_SESSION['reservation'])) {
        echo $_SESSION['reservation'];
        unset($_SESSION['reservation']);
    }
}
?>




<section class="food-menu">
<h2 class="text-center">Food Menu</h2>

        <div class="container-1">

            <?php
        // Display from DB
        $sql2 = "SELECT * FROM food_table";
        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2>0){
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                   <div style="width: 400px;" class="food-menu-box">
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
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail"><?php echo $description; ?></p>
                    <br>

                    <a href="<?php echo URL; ?>order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                </div>
            </div>
                <?php
                
        }
    }
        else{
            echo "<div class='msg'> not available </div>";
        }
?>
        


            <!-- <div class="clearfix"></div> -->

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>


<!-- Add this section to your index.php file -->


<?php
include('includes/footer.php');
?>
