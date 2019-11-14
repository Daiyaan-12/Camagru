<?php
include 'dbh.inc.php';
$sql = "SELECT idUser FROM users1 WHERE verification_code = ? AND verified = 0";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_GET['code']);
$stmt->execute();
$num = $stmt->rowCount();
if ($num > 0)
{
	$sql = "UPDATE users1 SET verified = 1 WHERE verification_code = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(1, $_GET['code']);
	if ($stmt->execute())
	{
		header("Location: ../header.php?success=verified");
		exit();
	}
	else {
		header("Location: ../signup.php?error=updatefailed");
		exit();
	}
}
else{
	header("Location: ../signup.php?error=nouser");
	exit();
}
?>