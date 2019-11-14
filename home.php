<?php session_start(); ?>

<?php
if ($_SESSION['username'])
{?>

<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background: url("https://st3.depositphotos.com/3096625/14491/v/450/depositphotos_144918503-stock-illustration-logo-db-letters-monogram.jpg" width="200px" height="200px");
                background-size: 100%;
            }
        </style>
    </head>
    
    <main>
        <h1 style="color:white" align="center"> Welcome!</h1>
        <h2 style="color:white" align="center">You are logged in!</h2> 
        <br>
        <h3 style="color:white" align="left">Where would you like to go?</h3>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profiles</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="camera.php">Camera</a></li>
            <form action="includes/login.inc.php" method="POST">
           <button style="height:20px; width:75px" name="logout-submit">Logout</button>
            </form>
                </ul>
        </main>
</html>
<?php
}
else
{
    echo "You are not logged in";
}
?>