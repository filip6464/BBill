<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/homepage.css"> 
    <script src="https://kit.fontawesome.com/24ebea2933.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
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
            <section class="bills">
                <div class="title">Last Bills</div> 
                <div class="bills-list">
                    <div class="label-bills">
                        <div>Name</div>
                        <div class="mid">Amount</div>
                        <div>Bill Owner</div>
                    </div>
                    <ul>
                        <?php
                        //var_dump($usersbills);
                        foreach ($usersbills as $userbill): ?>
                        <li id="bill-<?=$userbill->getlocalID()?>">
                            <a href="#">
                                <h2><?=$userbill->getTitle()?></h2>
                                <h3><?=$userbill->getAmount()?>$</h3>
                                <div>
                                    <img src="public/img/uploads/<?=$userbill->getOwnerImage()?>">
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
            <section class="rooms">
                <div class="title">Last rooms</div>
                <div class="rooms-list">
                    <div class="label-rooms">
                        <div>ID</div>
                        <div class="mid">Roommates</div>
                    </div>
                    <ul>
                        <?php
                        foreach ($usersrooms as $userroom): ?>
                        <li id="room-<?=$userroom->getlocalID()?>">
                            <a href="#">
                                <h2><?=$userroom->getlocalID()?></h2>
                                <div>
                                    <?php
                                    $roommates = $userroom->getRoommates();
                                    foreach ($roommates as $roommate):?>
                                    <img src="public/img/uploads/<?=$roommate->getImage()?>">
                                    <?php endforeach; ?>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </main>
    </div>
    <?php include __DIR__.'/../sections/bottomNavBar.php';?>

</body>