const search = document.querySelector('input[placeholder="Search"]');
    const roomContainer = document.querySelector(".searchGrid");

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
            }
        );
        }
    });

    function loadRooms(rooms){
        rooms.forEach(room => {
            console.log(room);
            createRoom(room);
        })
    }

function createRoom(room){
const template = document.querySelector("#room-template");

console.log(room);
const clone = template.content.cloneNode(true);
    TitleDATE = clone.querySelector("h5");
    TitleDATE.innerHTML = room[0].title+" ("+room[0].createdat+")";
    room[1].forEach(roommate => {
        console.log(roommate);
        const NameSurname = clone.querySelector("h6");
        NameSurname.innerHTML = roommate.name+" "+roommate.surname;
        const image = clone.querySelector("img");
        image.src = `/public/img/uploads/${roommate.image}`;
    })
    roomContainer.appendChild(clone);
/*const
)
 */
}
