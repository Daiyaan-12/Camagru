<?php
try{
    if
    {
        $sql = "SELECT idUser FROM users1 WHERE uidUsers=? AND emailUser=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$email);
        $stmt->execute();
        
        $result = $stmt->rowCount();
    }
    if($result > 0)
    {
        header("location: ../signup.php?error=uidemailexists=");
        exit();
    }
}
?>