const userModel = require("../models/userModel");
const bcrypt = require("bcrypt");

exports.showLoginForm = (req, res) => {
    res.render("login")
}
exports.login = async (req, res) => {
    try {
        const {username, password} = req.body;
        const user = await userModel.getUserByUsername(username);

        if (!user) {
            return res.status(404).send("User not found");
        }
        const match = await bcrypt.compare(password, user.password);
        if (!match) {
            return res.status(401).send("Invalid credentials");
        }

        req.session.userId = userId;
        res.redirect("/users");
    } catch (error) {
        console.error(error);
        res.status(500).send("Server error");
    }
};
exports.logout = async (req, res) => {
    req.session.destroy((err) => {res.redirect("/login");});
};