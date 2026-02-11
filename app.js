require('dotenv').config();

const express = require("express");
const session = require("express-session");
const app = express();
const userRoutes = require("./routes/userRoutes");
const requireLogin = require('./middleware/auth');

app.set('view engine', 'ejs');

app.use(session({
    secret: process.env.SESSION_SECRET,
    resave: false,
    saveUninitialized: false,
    cookie: {maxAge: 1000 * 60 * 60}
}));
app.use(express.urlencoded({extended: true}));

app.use('/users', userRoutes, requireLogin);

app.use('/', require("./routes/authRoutes"))
app.listen(3000, () => {
    console.log("Server berlari di http://localhost:3000");
});