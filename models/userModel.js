const db = require("../config/db");

exports.getAllUsers = async() => {
    const [rows] = await db.query("SELECT * FROM users");
    return rows;
};
exports.deleteUserById = async(id) => {
    const [result] = await db.query("DELETE FROM users WHERE id = ?", [id]);
    return result.affectedRows;
}