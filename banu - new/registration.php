<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

include('./config/constant.php');

// Check for registration success or error messages
if (isset($_SESSION['registration_success'])) {
    echo $_SESSION['registration_success'];
    unset($_SESSION['registration_success']);
}

if (isset($_SESSION['registration_error'])) {
    echo $_SESSION['registration_error'];
    unset($_SESSION['registration_error']);
}

// Process registration form
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['registration_success'] = '<div class="success">Registration successful! You can now login.</div>';
        header('location: login.php');
        exit();
    } else {
        $_SESSION['registration_error'] = '<div class="error">Registration failed. Please try again.</div>';
        header('location: registration.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
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
            flex-direction: column;
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

<section class="registration">
    <div style="padding:2rem" class="container">
        <h2 style="color: black;">Customer Registration</h2>

        <form style="padding:2rem" action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit" name="register">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</section>

</body>
</html>
