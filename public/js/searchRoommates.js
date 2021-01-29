const search = document.querySelector('input[placeholder="Search"]');
    const roomContainer = document.querySelector(".searchGrid");
    const assignedUsersGrid = document.querySelector(".iconGrid");
    var usersAssigned = assignedUsersGrid.querySelectorAll("img");
    var usersToAssign = document.querySelectorAll(".person");

    //Variables

Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};


    function assignUser(){
        const user = this;
        const img = user.querySelector("img");
        const src = img.getAttribute("src");
        const id = user.getAttribute("id");
        const assignedtemplate = document.querySelector("#assigned");
        const clone = assignedtemplate.content.cloneNode(true);
        const image = clone.querySelector("img");
        image.setAttribute("id",id);
        image.setAttribute("src",src);
        if(!listIDsAssignedUsers.includes(id)){
            listIDsAssignedUsers.push(id);
            assignedUsersGrid.appendChild(clone);
            updateRemoveClickEventForAssignedUsers();
        }
    }


function removeUser(){
    console.log(listIDsAssignedUsers);
        const user = this;
        var id = user.getAttribute("id");
        user.remove();
        listIDsAssignedUsers.remove(id);
}

function loadRooms(rooms){
    rooms.forEach(room => {
        console.log(room);
        createRoom(room);
    })
}


function createRoom(room){
    const template = document.querySelector("#room-template");

    const clone = template.content.cloneNode(true);
    TitleDATE = clone.querySelector("h5");
    TitleDATE.innerHTML = room[0].title+" ("+room[0].createdat+")";
    if(room[1].length != 0) {
        room[1].forEach(roommate => {
            console.log(roommate);
            const ID = clone.querySelector('.person');
            ID.setAttribute("id", roommate.id);
            const NameSurname = clone.querySelector("h6");
            NameSurname.innerHTML = roommate.name + " " + roommate.surname;
            const image = clone.querySelector("img");
            image.src = `/public/img/uploads/${roommate.image}`;
        })
        roomContainer.appendChild(clone);
    }
}




function updateAddClickEventForRoommates(){
    usersToAssign = document.querySelectorAll(".person");
    usersToAssign.forEach(users => users.addEventListener("click",assignUser));
}

function updateRemoveClickEventForAssignedUsers(){
    usersAssigned = assignedUsersGrid.querySelectorAll("img");
    usersAssigned.forEach(users => users.addEventListener("click",removeUser));
}


//==========================
//Event Listeners
//==========================

updateAddClickEventForRoommates();

search.addEventListener("keyup", function (event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then( function (response) {
            return response.json();
        }).then(
            function (rooms) {
                roomContainer.innerHTML = "";
                loadRooms(rooms);
                updateAddClickEventForRoommates();
            }
        );
    }
});





