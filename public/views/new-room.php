<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/newroom.css">
    <link rel="stylesheet" type="text/css" href="public/css/assign-roommates.css">

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
        <section class="assignRoommates">
            <div class="title">Assign Roommates</div>
            <div class="iconGrid">
                <img src="public/img/uploads/face1.png">
                <img src="public/img/uploads/face1.png">
                <img src="public/img/uploads/face1.png">
                <img src="public/img/uploads/face1.png">
                <img src="public/img/uploads/face1.png">
                <img src="public/img/uploads/face1.png">
            </div>
            <div class="searchBar">
                <input name="search" type="text" placeholder="Search">
            </div>
            <div class="searchGrid">
                <div class="room">
                    <h5>Jack Party (28/12/2020)</h5>
                    <div class="roomsGrid">
                        <div class="person">
                                <img src="public/img/uploads/face1.png">
                                <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <h5>Jack Party (28/12/2020)</h5>
                    <div class="roomsGrid">
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                    </div>
                </div>
                <div class="room">
                    <h5>Jack Party (28/12/2020)</h5>
                    <div class="roomsGrid">
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                        <div class="person">
                            <img src="public/img/uploads/face1.png">
                            <h6>Joanna Doe</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>