<?php 
function dataValidation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
};

$host = "mouse.db.elephantsql.com";
$dbname = "Login";
$user = "lzztbvlx";
$password = "exOk5zYF01QXsWFe35nt8dUBiCosnUIa";

$connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
or die('Connection error:' . pg_last_error());

function registerUser($name, $sname, $phone, $user, $pass, $gender){
    global $connection;
    $query = "INSERT INTO userdata(name, surname, phonenum, username, password, gender) VALUES ($name, $sname, $phone, $user, $pass, $gender)";
    $result = pg_query($connection, $query) or die("Query failed: " . pg_last_error());

    pg_free_result($result);
    pg_close($connection);
};

function loginUser($user, $pass){
    global $connection;


    $loginQ = "SELECT username, password FROM userdatatable";
    $userSearch = $connection->query($loginQ);
    $userSearch->setFetchMode(PDO::FETCH_ASSOC);
    
    while($data = $userSearch->fetch()){
        if($user == $data['username']){
            if($pass == $data['password']){ 
                header('Location: http://localhost/PHPTesting/phptest/Web/Webpage/index.php', true, 301);
                exit();
            }
        
        }
    }
};

function deleteUser($user, $pass){
    global $connection;

    $deleteQ = $connection->prepare("DELETE FROM userdatatable WHERE :username = username AND :password = password;");
    $deleteQ->bindParam(":username", $user);
    $deleteQ->bindParam(":password", $pass);

    if($deleteQ->execute()){
        consoleLog("Entry deleted...");
        echo "<script>alert('Data entry deleted...');</script>";
    }
    else{
        consoleLog("Entry not found...");
        echo "<script>alert('Data entry not found...');</script>";
    }
}


function consoleLog($text){
    echo "<script>console.log(' Console: " . $text . "' );</script>";
};

if(isset($_POST["sBtn"])){
    registerUser($_POST["name"], $_POST["sname"], $_POST["phone"], $_POST["user"], $_POST["pass"], $_POST["gender"]);
};


?>


        
        
        