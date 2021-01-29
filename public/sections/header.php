<?php

echo "
<div>
<a href=\"logout\">
    <i class=\"fas fa-sign-out-alt\"></i>
        </a>
        <div class='activeuser'>
            <img class='avatar' src=\"public/img/uploads/".$_COOKIE['avatar']."\">
            <div>".$_COOKIE['name']." ".$_COOKIE['surname']."</div>
        </div>
</div>
        <img src=\"public/img/logo_small.svg\">
        ";
?>


