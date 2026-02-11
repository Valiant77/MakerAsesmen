const express = require("express");
const app = express();
const userRoutes = require("./routes/userRoutes");

app.set('view engine', 'ejs');
app.use(express.urlencoded({extended: true}));

app.use('/users', userRoutes);

app.get('/', (req, res) => {
    res.send("HelloWorld(print)");
});
app.listen(3000, () => {
    console.log("Server berlari di http://localhost:3000");
});