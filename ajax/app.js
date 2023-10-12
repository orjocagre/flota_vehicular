const form = document.getElementById("form");

form.addEventListener("submit", (event)=>{
    event.preventDefault();
    let name = document.getElementById("name").value;
    let password = document.getElementById('password').value;

    let data = new URLSearchParams();

    data.append('name',name);
    data.append('password', password);

    fetch("insert.php", {
        method:"POST",
        body: data
    })
    .then(response => response.json())
    .then(data => {
        if(data.status=="success"){
            alert(data.message);
            //limpiar los inpu
            //actualizar la tabla
        }
        else {
            alert(data.message);
        }
    })
    .catch(error=> {
        console.error(error);
    })


});