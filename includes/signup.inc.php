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
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
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
            $sql = "SELECT idUser FROM users1 WHERE uidUsers=? AND emailUser=?";
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
            $sql = "SELECT idUser FROM users1 WHERE uidUsers=?";
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
            $sql = "SELECT idUser FROM users1 WHERE emailUser=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$email);
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result > 0)
            {
                header("location: ../signup.php?error=emailexists&uid=".$username);
                exit();
            }

            $verificationCode = md5(uniqid("2a1d4g5h9j2g6g9j3", true));
            $verificationLink = "http://localhost:8080/Camagru/includes/activate.php?code=" . $verificationCode;
            $msg = "body
            " . $verificationLink . "
            kind regards";
            $subject="email verification";
            $header ="From: no-reply@camagru.com";

            if (mail($email, $subject, $msg, $header))
            {
            // add user to database
            $sql = "INSERT INTO users1 (uidUsers, emailUser, pwdUsers, verification_code, verified) VALUES (?,?,?,?,0)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$email);
            $stmt->bindParam(3,$password);
            $stmt->bindParam(4,$verificationCode);
            $stmt->execute();

            header("location: ../header.php?success=signup");
            exit();
            }
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