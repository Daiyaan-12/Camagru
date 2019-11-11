<?php
session_start();
include("dbh.inc.php");
?>
<?php
if(isset($_POST['signup-submit'])){ 
$username = trim($_POST['uid']);
$email = trim($_POST['mail']);
$password = $_POST['pwd'];
$passwordrepeat = $_POST['pwd-repeat'];

if(empty($username) || empty($email) || empty($password) || empty($passwordrepeat)){
    header("location: ../signup.php?error=emptyfields&uid=".$username. "&mail=" .$email);
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)) {
    header("location: ../signup.php==emptyfields&uid");
    exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("location: ../signup.php=invalidmail&uid=".$username);
    exit();
}
else if(!preg_match("/^[a-zA-z0-9]*$/", $username)){
    header("location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
}
    else if ($password !== $passwordrepeat) {
        header("location: ../signup.php?=passwordcheckuid=".$username. "&mail=".$email);
        exit();
    }
    else{
        try {

            // checks if username and email exists        
            $sql = "SELECT idUser FROM users WHERE uidUsers=? AND emailUser=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$email);
            $stmt->execute();
            
            $result = $stmt->rowCount();
            if($result > 0)
            {
                header("location: ../signup.php?error=uidemailexists=");
                exit();
            }

            // checks if username exists
            $sql = "SELECT idUser FROM users WHERE uidUsers=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->execute();
            
            $result = $stmt->rowCount();
            if($result > 0)
            {
                header("location: ../signup.php?error=uidexists&uid=".$email);
                exit();
            }

            // checks if email exits
            $sql = "SELECT idUser FROM users WHERE emailUser=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$email);
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result > 0)
            {
                header("location: ../signup.php?error=emailexists&uid=".$username);
                exit();
            }

            // add user to database
            $sql = "INSERT INTO users (uidUsers, emailUser, pwdUser) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$email);
            $stmt->bindParam(3,$password);
            $stmt->execute();

            header("location: ../signup.php?success=signup");
            exit();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            die ("There was an error!");
        }
    }
}
else{
    $conn = null;
    header("location: ../signup.php?");
    exit();
}
?>