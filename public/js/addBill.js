const itemName = document.querySelector('input[name="item-name"]');
const itemValue = document.querySelector('input[name="item-value"]');
const listTable = document.querySelector(".items").querySelector("ul");
const addButton = document.querySelector('.fa-plus-circle');
const checkButton = document.querySelector('.fa-check');

var listIDsAssignedUsers = [];

$list = [];

function fetchBill(){
//TODO change ID from session
    var user_id = 1;
    var title = document.querySelector('input[name="billtitle"]').value;
    var listUsers = JSON.stringify(listIDsAssignedUsers);
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
            fetch("/addbill", {
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

function addItem(){

    var input_name = itemName.value;
    var input_amount = itemValue.value;

    if(input_name !== "" && !isNaN(input_amount)){

    const list = document.querySelector("#itemList");
    const clone = list.content.cloneNode(true);
    const name = clone.querySelector(".name");
    const value = clone.querySelector(".value");
    name.innerHTML = input_name;
    value.innerHTML = input_amount;

        listTable.appendChild(clone);
    listTable.querySelectorAll("li").forEach(item => item.addEventListener("click",removeItem));
    }
    itemName.value = '';
    itemValue.value = '';
    }

function removeItem(){
const item = this;
item.remove();
}

checkButton.addEventListener("click", fetchBill);
addButton.addEventListener("click",addItem);