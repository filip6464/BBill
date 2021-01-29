<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/newbill.css">
    <link rel="stylesheet" type="text/css" href="public/css/assign-roommates.css">
    <script type="text/javascript" src="./public/js/addBill.js" defer></script>
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
            <div class="title">New bill</div>
            <div class="bill-title">
                <div class="label-billtitle">Title of bill</div>
                <form>
                    <input name="billtitle" type="text" placeholder="title">
                        <i class="fas fa-check"></i>
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
                                <i class="fas fa-plus-circle"></i>
                        </div>
                    </form>
                    <ul>
                    </ul>
                </div>
            </div>

        </section>
        <?php include __DIR__.'/../sections/assignRoommates.php';?>
    </main>
</div>
<?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>

<template id="room-template">
    <div class="room">
        <h5>TitleDATE</h5>
        <div class="roomsGrid">
                <div id="1" class="person">
                    <img src="public/img/uploads/face2.png">
                    <h6>NameSurname</h6>
                </div>
        </div>
    </div>
</template>

<template id="assigned">
    <img id="1" src="public/img/uploads/face2.png">
</template>

<template id="itemList">
    <li class="list-item">
        <div class="name">beer round 1</div>
        <div class="value">45$</div>
    </li>
</template>