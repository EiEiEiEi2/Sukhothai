<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="reg.css">
    <title>reginster</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap');
    </style>
</head>
<body>
    <div class="logo">
        <img src="header-object.gif">
        <h3 class="name1">จังหวัดสุโขทัย</h3>
    </div>
    <div class="LoginF">
        <form action="registerprocess.php" method="POST">
            <h3>Username</h3>
            <br>
             <input type="text" class="username1" name="Username" placeholder="Username"><br><br>
            <h3>Password</h3><br>
            <input type="password" class="Password1" name="Password" placeholder="Password"><br><br>
            <br>
            <input type="password" class="Password2" name="Password2" placeholder="Confirm password"><br><br><br>
            <input type="submit" value="register" class="reg1btt"><br><br>
            <hr><br>
            <a href="Login.php" class="back">Back</a>
        </form>
    </div>
</body>
</html>