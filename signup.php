<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body
            {
                background-image: url("https://www.creativefabrica.com/wp-content/uploads/2019/02/Monogram-DB-Logo-by-Greenlines-Studios.jpg");;
            }
        </style>
    </head>

    <main>
        <div>
            <section>
                <h1 font-weight:"900"; align="center" style="color:white"><font size="50">Create Account</font></h1>
                <h2 font-weight:"100"; align="center" style="color:white"><font size="10">Quick and easy registration!</font></h2>
                <?php
                if (isset($_GET['error']))
                {
                    if ($_GET['error'] == "uidemailexists")
                    echo "Username and Email already exists.";
                    else if ($_GET['error'] == "uidexists")
                    echo "Username already exists.";
                    else if ($_GET['error'] == "emailexists")
                    echo "Email already exists.";
                }
                else if (isset($_GET['success']))
                {
                    if ($_GET['success'] == "signup")
                    echo "You are now Registered.";
                }
                ?>
                <div class="form">
                    <form action="includes/signup.inc.php" method="post">
                        <input style="height:40px; width:150px" type="text" name="uid" placeholder="Username">
                            <br>
                        <input style="height:40px; width:150px" type="text" name="mail" placeholder="E-mail">
                            <br>
                        <input style="height:40px; width:150px" type="password" name="pwd" placeholder="Password">
                            <br>
                        <input style="height:40px; width:150px" type="password" name="pwd-repeat" placeholder="Confirm password">
                            <br>
                        <a href="index.php"><button border-radius:"10px" style="height:40px; width:150px" type="submit" name="signup-submit">Signup</button></a>
                    </form>
                </div>
                <a href="header.php"><button style="height:20px; width:75px">Home</button></a>
            </section>
            </div>
        <!--<p style="color:white">You are logged out!</P>
        <p style="color:white">You are logged in!</p>-->
    </main>

<?php
    /*require "foot.php"*/
    ?>
    </html>