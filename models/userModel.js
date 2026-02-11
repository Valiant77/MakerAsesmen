const db = require("../config/db");
const bcrypt = require("bcrypt")

//CRUD
exports.createUser = async(userData) => { //C(reate)
    const {name, username, email, no_telp, password, pin, role} = userData;
    const hashedPassword = await bcrypt.hash(password, 10);
    const [result] = await db.query(
        "INSERT INTO users (name, username, email, no_telp, password, pin, role) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [name, username, email, no_telp, hashedPassword, pin, "user"]
    );
    return result.insertId;
};
exports.getUserById = async(id) => {
    const [rows] = await db.query(
        "SELECT * FROM users WHERE id = ?", [id]
    );
    return rows[0];
};
exports.updateUser = async(id, userData) => {
    const {name, username, email, no_telp, password, pin} = userData;
    if (password) {
        const hashedPassword = await bcrypt.hash(password, 10);
        const [result] = await db.query(
            "UPDATE users SET name = ?, username = ?, email = ?, no_telp = ?, password = ?, pin = ? WHERE id = ?",
            [name, username, email, no_telp, hashedPassword, pin, id]
        );
        return result.affectedRows;
    } else {
        const [result] = await db.query(
            "UPDATE users SET name = ?, username = ?, email = ?, no_telp = ?, pin = ? WHERE id = ?",
            [name, username, email, no_telp, pin, id]
        );
        return result.affectedRows;
    }
};
exports.getAllUsers = async() => { //R(ead)
    const [rows] = await db.query("SELECT * FROM users");
    return rows;
};
exports.deleteUserById = async(id) => { //D(elete)
    const [result] = await db.query("DELETE FROM users WHERE id = ?", [id]);
    return result.affectedRows;
};