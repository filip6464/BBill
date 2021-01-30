<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/bill.css">
    <link rel="stylesheet" type="text/css" href="public/css/assigned-roommates.css">

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
        <section class="newbill">
            <?php
            if(isset($messages)){
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <div class="title">Bill - Jacks present</div>
            <div class="bill-title">
                <div class="label-goal">Goal
                <div>20$ / 80$  (25%) </div>
                </div>
            </div>
            <div class="bill-items">
                <div class="label-list-items">List of items</div>
                <div class="items">
                    <ul>
                        <li>
                            <a href="#">
                                <div>beer round 1</div>
                                <div>45$</div>
                            </a>
                        </li>
                    </ul>
                    <form>
                        <div class="label-item">
                            <div>Throw in</div>
                        </div>
                        <div class="item-input">
                            <input name="item-value" type="text" placeholder="value">
                            <button type="submit">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <section class="assignRoommates">
            <div class="title">Assigned Roommates</div>
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
        </section>
    </main>
</div>
<?php include __DIR__.'/../sections/bottomNavBar.php';?>


</body>