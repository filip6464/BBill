<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <title>Register Page</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo_svg.svg">
        </div>
        <div class="login_container">
            <div class="messages">
                <?php
                var_dump($user);
                if(isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form class="register" action="register" method="POST">
                <input name="email" type="text" placeholder="username@gmail.com">
                <input name="password" type="password" placeholder="Password">
                <input name="password2" type="password" placeholder="Repeat password">
                <input name="name" type="text" placeholder="Name">
                <input name="surname" type="text" placeholder="Suraname">
                <div class="buttons">
                    <button type="submit">Sign  up</button>
                    <a href="login">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>