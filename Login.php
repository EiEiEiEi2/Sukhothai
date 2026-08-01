<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="loginsy.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap');
        </style>
    </head>
    <body>
        <div class="Msc">
            <div class="Lsc">
                <div class="logo">
                    <img src="header-object.gif">
                    <h3 class="name1">จังหวัดสุโขทัย</h3>
                </div>
                <div class="LoginF">
                    <form action="Loginprocess.php" method="POST">
                    <h3>Username</h3>
                    <br>
                    <input type="text" class="username1" name="Username" placeholder="Username"><br><br>
                    <h3>Password</h3><br>
                    <input type="password" class="Password1" name="Password" placeholder="Password"><br><br><br>
                    <input type="submit" value="Login" class="Logbtt"><br><br>
                    <hr><br>
                    <a href="register.php" class="reg">Register</a>
                    </form>
                </div>
            </div>
            <div class="Rsc">
            </div>
        </div>
    </body>
</html>