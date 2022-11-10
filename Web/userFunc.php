<?php 
function dataValidation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}


    $dbHost = "localhost";
    $dbUser = "user";
    $dbPass = "Dinamo20035";
    $dbName = "userdata";
    $sql = "mysql:host=$dbHost;dbname=$dbName";
    $dsnOp = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


    try{
        $connection = new PDO($sql, $dbUser, $dbPass, $dsnOp);
        echo ("Connection established...");
    } catch (PDOException $error){
        echo ("Connection error..." . $error->getMessage());
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
        echo("Data inserted...");
    }else{
        echo("Data failed to insert...");
    }
}

function loginUser($user, $pass){
    global $connection;

    $loginQ = "SELECT username, password FROM userdatatable";
    $userSearch = $connection->query($loginQ);


    $uSearchArr = $userSearch->fetchAll();

    for($i=0;$i<sizeof($uSearchArr);$i++){
        echo $uSearchArr[$i];
    }

    
    if(in_array($user, $uSearchArr))
    {
        $userLoc = array_search($user, $uSearchArr);
        if($userLoc+1 == $pass){
            header("http://localhost/PHPTesting/phptest/Web/index.php");
        }
        
    }
    else{
        echo "<script>alert('Wrong password or username!');</script>";
    };


}
?>

