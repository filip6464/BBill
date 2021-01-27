<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/newbill.css">
    <link rel="stylesheet" type="text/css" href="public/css/assign-roommates.css">
    <script type="text/javascript" src="./public/js/searchRoommates.js" defer></script>

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
        <section class="newbill">
            <div class="title">New bill</div>
            <div class="bill-title">
                <div class="label-billtitle">Title of bill</div>
                <form>
                    <input name="billtitle" type="text" placeholder="title">
                    <button type="submit">
                        <i class="fas fa-check"></i>
                    </button>
                </form>
            </div>
            <div class="bill-items">
                <div class="label-list-items">List of items</div>
                <div class="items">
                    <form>
                        <div class="label-item">
                            <div>Name</div>
                            <div>Value</div>
                        </div>
                        <div class="item-input">
                            <input name="item-name" type="text" placeholder="item name">
                            <input name="item-value" type="text" placeholder="value">
                            <button type="submit">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </form>
                    <ul>
                        <li>
                            <a href="#">
                                <div>beer round 1</div>
                                <div>45$</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </section>
        <section class="assignRoommates">
            <div class="title">Assign Roommates</div>
            <div class="iconGrid">
                <img src="public/img/uploads/face2.png">
            </div>
            <div class="searchBar">
                <input name="search" type="text" placeholder="Search">
            </div>
            <div class="searchGrid">
                <?php foreach ($lastusersrooms as $lastusersroom): ?>
                <div class="room">
                    <h5><?=$lastusersroom->getTitle()?>  (<?=$lastusersroom->getCreatedAt()?>)</h5>
                    <div class="roomsGrid">
                        <?php
                        $roommates = $lastusersroom->getRoommates();
                        foreach ($roommates as $roommate): ?>
                        <div class="person">
                                <img src="public/img/uploads/<?=$roommate->getImage()?> ">
                                <h6><?=$roommate->getName()?> <?=$roommate->getSurname()?></h6>
                        </div>
                        <?endforeach; ?>
                    </div>
                </div>
                <?endforeach; ?>
        </section>
    </main>
</div>
<?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>


<template id="room-template">
    <div class="room">
        <h5>TitleDATE</h5>
        <div class="roomsGrid">
                <div class="person">
                    <img src="public/img/uploads/face2.png">
                    <h6>NameSurname</h6>
                </div>
        </div>
    </div>
</template>