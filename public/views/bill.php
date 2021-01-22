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
        <section class="newbill">
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
<div class="navbar">
    <a href="#">
        <i class="fas fa-user-friends"></i>
    </a>
    <a href="#">
        <i class="fas fa-history"></i>
    </a>
    <a href="#">
        <i class="fas fa-list"></i>
    </a>
</div>

</body>