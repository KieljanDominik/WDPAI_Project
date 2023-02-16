<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunch - Sign In</title>

    <link rel="stylesheet" type = "text/css" href="/public/css/authorization.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400;800&family=Koulen&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2282473dfd.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/public/img/logo.png">
        </div>
        <div class="form-wrapper">
            <form action="login" method="POST">
                <span class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message){
                        echo $message;
                    }
                }
                ?>
                </span>
                <input name="login" type="text" placeholder="Login">
                <input name="password" type="password" placeholder="Password">
                <div class="button-container">
                    <button class="back link" type="button" onclick="location.href='/index'"><i class="fa-solid fa-backward"></i></button>
                    <button class="action link" type="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>