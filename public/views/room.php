<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/room.css">
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
        <ul class="nav">
            <li class="nav">
                <i class="fas fa-home"></i>
                <a href="#">Home page</a>
            </li>
            <li class="nav">
                <i class="fas fa-plus"></i>
                <a href="#">New room</a>
            </li>
            <li class="nav">
                <i class="fas fa-plus"></i>
                <a href="#">New bill</a>
            </li>
            <li class="nav">
                <i class="fas fa-user-friends"></i>
                <a href="#">Rooms</a>
            </li>
            <li class="nav">
                <i class="fas fa-money-bill"></i>
                <a href="#">Bills</a>
            </li>
            <li class="nav">
                <i class="fas fa-user-cog"></i>
                <a href="#">Settings</a>
            </li>
        </ul>
    </nav>
    <main>
        <section class="room">
            <div class="box">
            <div class="title">Room - Jacks Party</div>
            <div class="label-roomID">RoomID</div>
            <div class="roomID">456 456</div>
            <div class="qrCode">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=300x300" alt="" title="" />
            </div>
            <div class="buttons">
                <div class="button">
                    <i class="fas fa-share-alt"></i>
                    <div>Share</div>
                </div>
                <div class="button">
                    <i class="fas fa-door-open i-leave"></i>
                    <div>Leave</div>
                </div>
            </div>
            </div>
        </section>
        <section class="assignRoommates">
            <div class="title">Invite Roommates</div>
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
                <div>
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
                <div>
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
                <div>
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