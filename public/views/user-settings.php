<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/usersettings.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/inputValidation.js" defer></script>
    <script type="text/javascript" src="./public/js/usersettings.js" defer></script>
    <script src="https://kit.fontawesome.com/24ebea2933.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>
<body>
    <header>
        <?php include __DIR__.'/../sections/header.php';?>
    </header>
    <div class="base-container">
        <nav>
            <?php include __DIR__.'/../sections/leftNavBar.php';?>
        </nav>
        <main>
            <section class="usersettings">
                <div class="title">User Settings</div>
                <form action="userSettings" method="post" ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <input name="password" type="password" placeholder="password">
                    <input name="password2" type="password" placeholder="repeat password">
                    <input name="file" type="file">
                    <button type="submit">Upload</button>
                </form>
            </section>
        </main>
    </div>
    <?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>