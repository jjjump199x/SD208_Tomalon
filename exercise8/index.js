const express = require ('express');
const app = express();
const bodyParser = require('body-parser');
const session = require('express-session');
const PORT = process.env.PORT || 8081
const path = require('path');

app.use(session({
    secret : "This is a secret",
    resave: false,
    saveUninitialized: true
}));

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.set("view Enginge", "ejs");
app.use('/static', express.static(path.join(__dirname, 'public')))
app.get("/", (req,res)=>{
    res.render("register.ejs")
})


const validateRegisterInputs = (req, res, next)=> {
    // valdation here
    let errors = {};
    //check if there is empty
    let data = req.body;
    for(let key in data) {
        if(data[key] == "") {
            errors["message"] = "Please supply all fields!";
            res.render('register.ejs',{errors: errors});
            return;
        }
    }
    
    // check if the password and confirmed password match
    if (data.password != data.c_password){
        errors["message"] = "Password doesn't match!"
        res.render('register.ejs', {errors:errors})
        return;
    }
    // same goes with the email
    next();
}



app.listen(PORT, ()=>{
    console.log(`Connected on Port: ${PORT}`  );
})

app.post("/register", validateRegisterInputs ,(req,res)=>{
    sess = req.session;
    const user={};
 
    user["firstname"] = req.body.firstname
    user["lastname"] = req.body.lastname;
    user["email"] = req.body.email;
    user["password"] = req.body.password;
    user["c_password"] = req.body.c_password;
 
    console.log(req.body.c_password);
    if (req.body.password == req.body.c_password){
        sess.user = user;
        console.log(user)
        res.redirect("/login")
    }else{
        res.send("Password doesn'nt match")
        
    }
} );
app.get("/login", (req,res)=>{
    res.render("login.ejs");
})
app.get("/bio", (req,res)=>{
    res.render("bio.ejs", {user: req.session.user})
})
app.post("/login", (req,res)=>{

    const errorMessage = {};
    if(sess.email != req.body.email){
        errorMessage["email"]= "Email doesn't match"
    }

    if(sess.password != req.body.password){
        errorMessage["password"]= "Password doesn't match"
    }

    res.redirect("/bio")
    for (let key in errorMessage){
        if(errorMessage[key] != ""){
            // return res.send ({error: password})
        }
    }
})