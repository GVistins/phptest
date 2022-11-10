
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2 class="center">Welcome, Please register...</h2>
    <form method="POST" action="index.php" class="center">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="sname" placeholder="Surname">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Non-Binary">Non-Binary</option>
            <option></option>
        </select>
        <div class="center">
            <input type="submit" name="sBtn" value="Register">
            <!--<input type="submit" name="rBtn" value="Recieve Data">-->
        </div>
    </form>

    <a href="http://localhost/PHPTesting/phptest/Web/login.php" class="center">Login Page</a>


    <?php
        include "userFunc.php";
        if(isset($_POST["sBtn"])){
            registerUser($_POST["name"], $_POST["sname"], $_POST["phone"], $_POST["user"], $_POST["pass"], $_POST["gender"]);
        };
        



    ?>
</body>
</html>

