<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/inputValidation.js" defer></script>
    <script type="text/javascript" src="./public/js/loginScript.js" defer></script>
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo_svg.svg">
        </div>
        <div class="login_container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="username@gmail.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">Sign  in</button>
            </form>
            <a href="register">Sign  up</a>
        </div>

    </div>

</body>