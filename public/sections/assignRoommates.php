<?php

echo "
<script type=\"text/javascript\" src=\"./public/js/searchRoommates.js\" defer></script>
<section class=\"assignRoommates\">
            <div class=\"title\">Assign Roommates</div>
            <div class=\"iconGrid\">
            </div>
            <div class=\"searchBar\">
                <input name=\"search\" type=\"text\" placeholder=\"Search\">
            </div>
            <div class=\"searchGrid\">";
            showRooms($lastusersrooms);
 echo "      </section>";


function showRooms($lastusersrooms)
{
    foreach ($lastusersrooms as $lastusersroom) {
$roommates = $lastusersroom->getRoommates();
$title = $lastusersroom->getTitle();
$date = $lastusersroom->getCreatedAt();
        echo"
<div class=\"room\">
    <h5>".$title."  (".$date.")</h5>
    <div class=\"roomsGrid\">
    ";
        showRoommates($roommates);
 echo "           
     </div>
 </div>
        ";
    }
}

function showRoommates($roommates){
    foreach ($roommates as $roommate){
        $id = $roommate->getLocalID();
        $image = $roommate->getImage();
        $name = $roommate->getName();
        $surname = $roommate->getSurname();

        echo "
        <div id=".$id." class=\"person\">
                <img src=\"public/img/uploads/".$image." \">
                <h6>".$name." ".$surname."</h6>
            </div>
        ";
    }
}







?>