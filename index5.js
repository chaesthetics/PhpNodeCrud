const baseUrl = 'http://localhost:3000';

function createStudent() {
    // read ajax for vanilla js
    const name = document.getElementById("sname").value;
    const address = document.getElementById("saddress").value;
    const course = document.getElementById("sclass").value;
    const number = document.getElementById("sphone").value;

    const url = baseUrl + '/students';

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        name,
        address,
        course,
        number
    }));

    xhr.onload = () => {
        if (xhr.status === 200) {
            alert('Information is inserted')
        } else {
            alert('invalid credentials');
        }
    }
    header("location:index.php");
}

function updateStudent(){
    // read ajax for vanilla js
    const name = document.getElementById("sname").value;
    const address = document.getElementById("saddress").value;
    const course = document.getElementById("sclass").value;
    const number = document.getElementById("sphone").value;
    const id1 = document.getElementById("sid").value;
    const url = baseUrl + '/upStudents';

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        name,
        address,
        course,
        number,
        id1
    }));    

    xhr.onload = () => {
        if (xhr.status === 200) {
            alert('Updated succesfuly!')
        } else {
            alert('invalid credentials');
        }
    }
    header("location:index.php");
}

function deleteStudent(){
    // read ajax for vanilla js
    const id1 = document.getElementById("sid").value;
    const url = baseUrl + '/delStudents';

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        id1
    }));

    xhr.onload = () => {
        if (xhr.status === 200) {
            alert('Student has been deleted!!')
        } else {
            alert('Id not found!!');
        }
    }
    header("location:index.php");
}