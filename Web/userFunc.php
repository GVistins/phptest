<?php 
function dataValidation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
};


    $dbHost = "localhost";
    $dbUser = "user";
    $dbPass = "Dinamo20035";
    $dbName = "userdata";
    $sql = "mysql:host=$dbHost;dbname=$dbName";
    $dsnOp = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


    try{
        $connection = new PDO($sql, $dbUser, $dbPass, $dsnOp);
        consoleLog("Connection established...");
    } catch (PDOException $error){
        consoleLog("Connection error..." . $error->getMessage());
    }

function registerUser($name, $sname, $phone, $user, $pass, $gender){
    global $connection;

    $safeUserName = dataValidation($user);
    $safeUserPass = dataValidation($pass);
 
    $insertData = $connection->prepare("INSERT INTO userdatatable(name, surname, phonenum, username, password, gender) VALUES (:name, :surname, :phone, :user, :pass, :gender)");

    $insertData->bindParam(":name", $name);
    $insertData->bindParam(":surname", $sname);
    $insertData->bindParam(":phone", $phone);
    $insertData->bindParam(":user", $safeUserName);
    $insertData->bindParam(":pass", $safeUserPass);
    $insertData->bindParam(":gender", $gender);

    if($insertData->execute()){
        consoleLog("Data inserted...");
    }else{
        consoleLog("Data failed to insert...");
    }
};

function loginUser($user, $pass){
    global $connection;


    $loginQ = "SELECT username, password FROM userdatatable";
    $userSearch = $connection->query($loginQ);
    $userSearch->setFetchMode(PDO::FETCH_ASSOC);

    $err = 0;
    while($data = $userSearch->fetch()){
        if($user == $data['username']){
            if($pass == $data['password']){
                echo "<script>alert('Welcome, you are now logged in!');</script>"; 
                header("http://localhost/PHPTesting/phptest/Web/userData.php");
                break;
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

?>

