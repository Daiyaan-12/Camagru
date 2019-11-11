<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="description" content="this is an example">
        <meta name=viewpoint content="width=device-width, initial-scale=1">
        <title>Camagru</title>
        <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <h1 font-weight:"900"; align="center" style="color:white"><font size="150">φίλτρο</font></h1>
        <header>
            <nav>
                <a href="#">
                    </a>

                </nav>
                <div class="form">
                    <img  src="https://st3.depositphotos.com/3096625/14491/v/450/depositphotos_144918503-stock-illustration-logo-db-letters-monogram.jpg" width="200px" height="200px">
                </div>
            </header>
            <div class="form">
                <form action="includes/login.inc.php" method="post">
                <input style="height:40px; width:150px" type="text" name="mailuid" placeholder="email">
                <br>
                <input style="height:40px; width:150px" type="password" name="pwd" placeholder="Password">
                <br>
                <button style="height:40px; width:150px" type="submit" name="login-submit">Login</button>
            </form>
            <br>
            <a href="signup.php"><button style="height:40px; width:150px">Signup</button></a>
                        <form action="includes/logout.inc.php" method="post">
                        <button style="height:40px; width:150px" type="submit" name="logout-submit">Logout</button>
                        </form>
                        </div>
            </body>
    </html>