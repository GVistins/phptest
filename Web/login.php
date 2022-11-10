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
    <h2 class="center">Welcome, Please enter your login...</h2>
    <form method="POST" action="login.php" class="center">
        <input type="text" name="user" placeholder="Name">
        <input type="text" name="pass" placeholder="Surname">
        <div class="center">
            <input type="submit" name="lBtn" value="Login">
        </div>
    </form>

    <a href="http://localhost/PHPTesting/phptest/Web/index.php" class="center">Register Page</a>

    <?php 
        include "userFunc.php";

        if(isset($_POST["lBtn"])){
            loginUser($_POST['user'], $_POST['pass']);
        }

    ?>

</body>
</html>