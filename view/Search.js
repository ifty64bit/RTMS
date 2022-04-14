
function get(id) {
    return document.getElementById(id);
}

var tr;

function search(e)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText.trim());
            console.log(data);
            if (JSON.parse(this.responseText.trim()).length === 0 || e.value==" " || e.value=="")
            {
                let tableHead = "<td>First Name</td><td>Last Name</td><td>Phone</td><td>Address</td><td>Vehicle Number</td><td>Licence</td><td>Status</td><td>Action</td>"
                get("table").innerHTML = tableHead;
                
                get("emptymsg").innerHTML="<h3>No results found</h3>";
            }
            else {
                get("emptymsg").innerHTML = "";
                
                let tableHead = "<td>First Name</td><td>Last Name</td><td>Phone</td><td>Address</td><td>Vehicle Number</td><td>Licence</td><td>Status</td><td>Action</td>"
                get("table").innerHTML=tableHead;
                
                data.forEach(element => {
                    tr = document.createElement("tr");
                    tr.innerHTML = `<td>${element.firstName}</td>
                        <td>${element.lastName}</td>
                        <td>${element.phone}</td>
                        <td>${element.address}</td>
                        <td>${element.vehicleNumber}</td>
                        <td>${element.licence}</td>
                        <td>${element.status}</td>
                        <td><a class="btn" href="./ViewDriver.php?id=${element.id}" >View</a></td>`;
                    get("table").appendChild(tr);
                });
            }
        }
    };
    xhttp.open("GET", `http://localhost/RTMS/controller/Search.php?name=${e.value}`, true);
    xhttp.send();
}