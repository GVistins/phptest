<!DOCTYPE html>
<html lang="en" class="gradient">
<head>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2 class="center">Welcome, Please enter your login data to be removed...</h2>
    <form method="POST" action="delete.php" class="center">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <div class="center">
            <input type="submit" name="dBtn" value="Delete">
        </div>
    </form>

    <a href="http://localhost/PHPTesting/phptest/Web/index.php" class="center">Register Page</a>
    <a href="http://localhost/PHPTesting/phptest/Web/login.php" class="center">Login Page</a>

    <?php 
        include "userFunc.php";

        if(isset($_POST["dBtn"])){
            deleteUser($_POST['user'], $_POST['pass']);
        }

    ?>

</body>
</html>