const express = require('express')
var cors = require('cors')
const app = express()
app.use(cors())

const bodyParser = require('body-parser')
const port = 3000

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "crud"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});

// create application/json parser
var jsonParser = bodyParser.json()

app.get('/', (req, res) => {
  res.send('Hello World!')
});

let students = [];
const user = {
    username: "user",
    password: "password123"    
}
let id = 1;

app.post('/login', jsonParser, (req, res) => {
    const { username, password } = req.body;
    if (username === user.username && password === user.password) {
        res.send('ok')
    } else {
        res.send(401)
    }
});

app.get('/users', jsonParser, (req, res) => {
    con.query('SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid', (error, result) => {
        res.send(result);
    })
});

app.get('/class', jsonParser, (req, res) => {
    con.query('SELECT * FROM studentclass', (error, result) => {
        res.send(result);
    })
});
app.get('/data', jsonParser, (req, res) => {
    con.query('SELECT * FROM student', (error, result) => {
        res.send(result);
    })
});

app.get('/data1/:id', jsonParser, (req, res) => {
    const { id } = req.params;
    console.log(id);
    con.query(`SELECT * FROM student WHERE sid=${id}`, (error, result) => {
        
        res.send(result);

    })
}); 
app.post('/students', jsonParser, (req, res) => {
    const { name, address, course, number } = req.body;
    if (name && address && course && number) {
        const query = `INSERT INTO student(sname,saddress,sclass,sphone) VALUES('${name}','${address}','${course}','${number}')`
        con.query(query, (error, result) => {
            console.log(error)
            res.send('Student has been added')
        })
    }   else {
        console.log(name, address, course, number)
        res.send('invalid credentials')
    }
});

app.post('/upStudents', jsonParser, (req, res) => {
    const { name, address, course, number, id1 } = req.body;
    if (name && address && course && number && id1) {
        const query = `UPDATE student SET sname ='${name}', saddress ='${address}', sclass ='${course}', sphone ='${number}' WHERE sid = '${id1}'`
        con.query(query, (error, result) => {
            console.log(error)
            res.send('Student has been updated')
        })
    } else {
        console.log(name, address, course, number)
        res.send('invalid credentials')
    }
});

app.post('/delStudents', jsonParser, (req, res) => {
    const {  id1 } = req.body;
    if ( id1) {
        const query = `DELETE FROM student WHERE sid = ${id1}`
        con.query(query, (error, result) => {
            console.log(error)
            res.send('Student has been updated')
        })
    } else {x   
        console.log(name, address, course, number)
        res.send('invalid credentials')
    }
});



app.delete('/data/:id', jsonParser, (req, res) => {
    const { id } = req.params;
    console.log(id);
    const query = `DELETE FROM student WHERE sid=${id}`
    con.query(query, (error, result) => {
        console.log(error)
        res.send('Student has been deleted')
    })
});

app.get('/students', (req, res) => {
    res.send(students)

});

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
});