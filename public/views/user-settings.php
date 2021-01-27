<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/usersettings.css">
    <script src="https://kit.fontawesome.com/24ebea2933.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>
<body>
    <header>
        <a href="#">
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <img src="public/img/logo_small.svg">
    </header>
    <div class="base-container">
        <nav>
            <?php include 'leftNavBar.php';?>
        </nav>
        <main>
            <section class="usersettings">
                <div class="title">User Settings</div>
                <form action="usersettings" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="name" type="text" placeholder="name">
                    <input name="surname" type="text" placeholder="surname">
                    <textarea name="description" rows="5" placeholder="description"></textarea>
                    <input name="file" type="file">
                    <button type="submit">Upload</button>
                </form>
            </section>
        </main>
    </div>
    <?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>