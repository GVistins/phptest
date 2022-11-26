
<!DOCTYPE html>
<html lang="en" class="gradient">
<head>
    <script src="../script.js"></script>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="topNav">
        <div>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/index.php">Home</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/register.php" class="active">Register Page</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/login.php">Login Page</a>
            <a href="http://localhost/PHPTesting/phptest/Web/Webpage/delete.php">Delete</a>  
        </div>
    </div>
    <h2 class="center">Welcome, Please register...</h2>
    <form method="POST" action="index.php" class="center">
        <div>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="sname" placeholder="Surname">
        </div>
        <input type="text" name="phone" placeholder="Phone Number">
        <div>
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
        </div>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Non-Binary">Non-Binary</option>
            <option></option>
        </select>
        <div class="center">
            <input type="submit" name="sBtn" value="Register">
        </div>
    </form>



    <?php
        include "userFunc.php";
        if(isset($_POST["sBtn"])){
            registerUser($_POST["name"], $_POST["sname"], $_POST["phone"], $_POST["user"], $_POST["pass"], $_POST["gender"]);
        };
        



    ?>
</body>
</html>

