<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/new-bill.css">
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