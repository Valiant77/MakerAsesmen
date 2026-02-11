const userModel = require("../models/userModel");

exports.listUsers = async (req, res) => {
    try {
        const users = await userModel.getAllUsers();
        res.render("users", {users});
    } catch (error) {
        console.error(error);
        res.status(500).send("Server Error");
    }
}