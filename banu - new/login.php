<?php


include('./config/constant.php');

if (isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header('location: index.php'); 
            exit();
        } else {
            $_SESSION['login_error'] = '<div style ="background-color:red;color:white;position:absolute;top:200px;padding:1rem" class="error">Invalid email or password. Please try again.</div>';
            header('location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <!-- Add your styles and CSS links here -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

        * {
            margin: 0 0;
            padding: 0 0;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/AD011219-21_original.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;


        }

        .login {
            text-align: center;
            margin-bottom: 1rem;

        }

        .container {

            background-color: whitesmoke;
            border: 1px solid orange;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;

            width: 300px;

        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            height: 300px;
            justify-content: center;
            gap: 0.4rem;
            padding: 1rem;
        }

        input {
            padding: 0.5rem;
        }

        button {
            padding: 0.5rem;
            background-color: orange;
            color: whitesmoke;
            font-size: 1rem;
            border: none;
        }
    </style>
</head>

<body>

    <section class="login">
        <h2 style="color: wheat;">Customer Login</h2>

        <div class="container">

            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="registration.php">Register here</a></p>

            </form>

        </div>
    </section>

</body>

</html>