<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/newroom.css">
    <link rel="stylesheet" type="text/css" href="public/css/assign-roommates.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <script type="text/javascript" src="./public/js/assignUsers.js" defer></script>
    <script type="text/javascript" src="./public/js/addRoom.js" defer></script>
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
        <section class="newroom">
            <div class="title">New Room</div>
            <div class="room-title">
                <div class="label-roomtitle">Title of room</div>
                <form>
                    <input name="roomtitle" type="text" placeholder="Room name">
                    <button type="submit">
                        <i class="fas fa-check"></i>
                    </button>
                </form>
            </div>
        </section>
        <?php include __DIR__.'/../sections/assignRoommates.php';?>
    </main>
</div>
<?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>