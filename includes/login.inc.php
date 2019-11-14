<?php
include 'dbh.inc.php';
if (isset($_POST['login-submit']))
{
try{
    $username = $_POST['mailuid'];

        $sql = "SELECT * FROM users1 WHERE uidUsers=? OR emailUser=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$username);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $result = $stmt->rowCount();
    if($result > 0)
    {
        session_start();
        $_SESSION['username'] = $res['uidUsers'];
        $_SESSION['email'] = $res['emailUsers'];
        header("location: ../home.php?success=Welcome");
        exit();
    }
} catch (PDOException $e)
{
    echo $e->getMessage();
    header("location: ../signup.php?error=sqlerror");
    exit();    
}
}
else if(isset($_POST['logout-submit'])){
    session_start();
	session_unset();
	session_destroy();
	header("Location: ../header.php");
	exit();
}
?>