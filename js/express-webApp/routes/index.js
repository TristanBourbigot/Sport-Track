var express = require('express');
var session = require('express-session');
var cookieParser = require('cookie-parser');
var router = express.Router();

var sess

router.use(cookieParser());

router.use(session({
    secret: 'secret',
    saveUninitialized: true,
    cookie: { maxAge: 60000 },
    resave: false
}));

/* GET home page. */
router.get('/', (req, res) => {
  sess = req.session;
  if (sess.email) {
    return res.render('index', { title: sess.email, name: sess.name})
  }
  res.redirect('/connect');
});

module.exports = router;
