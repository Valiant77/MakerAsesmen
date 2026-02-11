function requireLogin(req, res, next) {
    if (!res.session.userId) {
        return res.redirect("/login")
    };
    next();
}

module.exports = requireLogin;