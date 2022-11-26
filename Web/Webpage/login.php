<!DOCTYPE html>
<html lang="en" class="gradient">
<head>
    <script src="../script.js"></script>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="topNav">
        <div>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/index.php">Home</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/register.php">Register Page</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/login.php" class = "active">Login Page</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/delete.php">Delete</a>
        </div>
    </div>
    <h2 class="center">Welcome, Please enter your login...</h2>
    <form method="POST" action="login.php" class="center">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <div class="center">
            <input type="submit" name="lBtn" value="Login">
        </div>
    </form>

    <?php 
        include "userFunc.php";

        if(isset($_POST["lBtn"])){
            loginUser($_POST['user'], $_POST['pass']);
        }

    ?>

</body>
</html>