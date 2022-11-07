<?php 



function dataValidation($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function connectDB(){
    $dbHost = "localhost";
    $dbUser = "user";
    $dbPass = "Dinamo20035";
    $dbName = "userdatatable";
    $sql = "mysql:host=$dbHost;dbname=$dbName";
    $dsnOp = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


    try{
        $connection = new PDO($sql, $dbUser, $dbPass, $dsnOp);
        echo "Connection established...";
    } catch (PDOException $error){
        echo "Connection error..." . $error->getMessage();
    }

    $userName = $_POST['user'];
    $userPass = $_POST['pass'];
    $safeUserName = dataValidation($userName);
    $safeUserPass = dataValidation($userPass);

    $insertData = $connection->prepare("INSERT INTO userData(userName, userPass) VALUES (:userName, :userPass)");

    $insertData->bindParam(":userName", $safeUserName);
    $insertData->bindParam(":userPass", $safeUserPass);

    if($insertData->execute()){
        echo "Data inserted...";
    }else{
        echo "Data failed to insert...";
    }
}
?>