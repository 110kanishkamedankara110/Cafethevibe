function updatePrice(x) {
    let id = x;
    let value = document.getElementById("pri" + id).value;

    let f = new FormData();
    f.append("id", id);
    f.append("value", value);


    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            alert(text);
            window.location.reload();
        }
    };
    r.open("POST", "update.php", true);
    r.send(f);

}

function addItem() {
    let category = document.getElementById("category").value
    let option = document.getElementById("option").value;
    let price = document.getElementById("price").value;


    let f = new FormData();
    f.append("category", category);
    f.append("option", option);
    f.append("price", price);



    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            if (text == "1") {
                alert("Select Category");
            } else if (text == "2") {
                alert("Select Option");
            } else if (text == "3") {
                alert("Enter Price");
            } else if (text == "4") {
                alert("Food Item Alredy Added");
            } else {
                document.getElementById("main-table").innerHTML = text;
                document.getElementById("option").value = "Option";
                document.getElementById("price").value = "";
            }

        }
    };
    r.open("POST", "addItem.php", true);
    r.send(f);

}

function addCategory() {
    let category = prompt("Enter Category");
    if (category == "") {
        alert("Enter New Category");

    } else {
        let f = new FormData();
        f.append("category", category);


        let r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                let text = r.responseText;
                document.getElementById("category").innerHTML = text;
            }
        };
        r.open("POST", "addCategory.php", true);
        r.send(f);
    }
}

function addOption() {
    let category = prompt("Enter Option");
    if (category == "") {
        alert("Enter New Option");

    } else {
        let f = new FormData();
        f.append("option", category);


        let r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                let text = r.responseText;
                document.getElementById("option").innerHTML = text;
            }
        };
        r.open("POST", "addOption.php", true);
        r.send(f);
    }
}

function updateSpecialPrice(x) {
    let id = x;
    let value = document.getElementById("spPri" + id).value;

    let f = new FormData();
    f.append("id", id);
    f.append("value", value);


    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            alert(text);
            window.location.reload();
        }
    };
    r.open("POST", "spUpdate.php", true);
    r.send(f);
}

function addspItem() {
    let category = document.getElementById("category_sp").value
    let special = document.getElementById("special").value;
    let price = document.getElementById("price_sp").value;


    let f = new FormData();
    f.append("category", category);
    f.append("special", special);
    f.append("price", price);



    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;

            if (text == "1") {
                alert("Select Category");
            } else if (text == "2") {
                alert("Select Special");
            } else if (text == "3") {
                alert("Enter Price");
            } else if (text == "4") {
                alert("Food Special Alredy Added");
            } else {
                document.getElementById("table-2").innerHTML = text;
                document.getElementById("special").value = "";
                document.getElementById("price_sp").value = "";
            }

        }
    };
    r.open("POST", "addspItem.php", true);
    r.send(f);

}

function deleteMassage(x) {
    let id = x;


    let f = new FormData();
    f.append("id", id);



    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            alert(text);
            window.location.reload();
        }
    };
    r.open("POST", "deleteMassage.php", true);
    r.send(f);
}

function addMasage() {
    let category = document.getElementById("category_ma").value
    let massage = document.getElementById("massage").value;



    let f = new FormData();
    f.append("category", category);
    f.append("massage", massage);




    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;

            if (text == "1") {
                alert("Select Category");
            } else if (text == "2") {
                alert("Enter Massage");
            } else if (text == "4") {
                alert("Category Massage Alredy Added");
            } else {
                document.getElementById("table-3").innerHTML = text;
                document.getElementById("massage").value = "";

            }

        }
    };
    r.open("POST", "addMassage.php", true);
    r.send(f);

}

function deleteItem(x) {
    let id = x;


    let f = new FormData();
    f.append("id", id);



    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            alert(text);
            window.location.reload();
        }
    };
    r.open("POST", "deleteItem.php", true);
    r.send(f);
}

function deleteSpecial(x) {
    let id = x;


    let f = new FormData();
    f.append("id", id);



    let r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            let text = r.responseText;
            alert(text);
            window.location.reload();
        }
    };
    r.open("POST", "deleteSpecial.php", true);
    r.send(f);
}