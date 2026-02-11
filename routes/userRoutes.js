const express = require("express");
const router = express.Router();
const userController = require("../controllers/userController");

router.get("/create", userController.showCreateForm); //C
router.post("/create", userController.createUser); //C
router.get("/", userController.listUsers); //R
router.get("/edit/:id", userController.showEditForm); //U
router.post("/edit/:id", userController.editUser); //U
router.get("/delete/:id", userController.deleteUser); //D

module.exports = router;