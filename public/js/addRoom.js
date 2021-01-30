const checkButton = document.querySelector('.fa-check');

var arrayIDsAssignedUsers = listIDsAssignedUsers;


function fetchRoom(){
//TODO change ID from session
    var user_id = document.cookie.user;
    var title = document.querySelector('input[name="billtitle"]').value;
    var listUsers = JSON.stringify(arrayIDsAssignedUsers);
    var items= [];
            listTable.querySelectorAll("li").forEach(listitem => {
                var a =listitem.querySelector(".name");
                var b =listitem.querySelector(".value");
                var item = {
                    item_name: a.innerHTML,
                    amount: b.innerHTML
                };
                item= JSON.stringify(item);
                items.push(item);
            })

    var data = {
        title: title,
        user_id: user_id,
        itemsList: items,
        assignedList: listUsers
    };
            fetch("/addroom", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then( function (response){
                var newURL = window.location.protocol + "//" + window.location.host + "/homepage";
                    location.href = newURL;
                }
            );
                }

checkButton.addEventListener("click", fetchRoom);
addButton.addEventListener("click",addItem);