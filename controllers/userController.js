const userModel = require("../models/userModel");

//CRUD
exports.showCreateForm = (req, res) => { //C(reate)
    res.render("userForm", {user: null, isEdit: false});
};

exports.createUser = async(req, res) => {
    try {
        const userId = await userModel.createUser(req.body);
        res.redirect("/users");
    } catch(err) {
        console.error(error);
        res.status(500).send("Server error")
    }
};

exports.listUsers = async(req, res) => { //R(ead)
    try {
        const users = await userModel.getAllUsers();
        res.render("users", {users});
    } catch (error) {
        console.error(error);
        res.status(500).send("Server Error");
    }
};

exports.showEditForm = async (req, res) => { //U(pdate)
    try {
        const user = await userModel.getUserById(req.params.id);
        if (!user) {
            return res.status(404).send("User not found");
        }
        res.render("userForm", {user, isEdit: true});
    } catch (error) {
        console.error(error);
        res.status(500).send("Server error");
    }
};
exports.editUser = async (req, res) => {
    try {
        const updated = await userModel.updateUser(req.params.id, req.body);
        if (updated === 0) {
            return res.status(404).send("User not found");
        }
        res.redirect("/users");
    } catch (error) {
        console.error(error);
        res.status(500).send("Server error");
    }
};

exports.deleteUser = async(req, res) => { //D(elete)
    console.log("Deleting user with ID: ", req.params.id);
    try {
        const userId = req.params.id;
        const deleted = await userModel.deleteUserById(userId);

        if (deleted === 0) {
            return res.status(404).send("User not found");
        }
        res.redirect('/users');
    } catch (error) {
        console.error(error);
        res.status(500).send("Server error")
    }
};