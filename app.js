var express = require("express"),
  bodyParser = require("body-parser"),
  db = require("./models"),
  passport = require("passport"),
  session = require("cookie-session"),
  bcrypt = require("bcrypt"),
  methodOverride = require("method-override");
  app = express();

// Creating an instance of Postmates that we can use to interact with their endpoints:
var Postmates = require('postmates');
var postmates = new Postmates('yourCustomerId', 'yourAPIkey');

app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended: true}));
app.use(methodOverride("_method"));
app.use(express.static(__dirname + "/public"));

// setting up session (records info about users who are signed in)
app.use(session( {
	secret: 'thisismysecretkey',
	name: 'chocolate chip',
	// this is in milliseconds
	maxage: 3600000
	})
);

// get passport started
app.use(passport.initialize());
app.use(passport.session());

/*  Prepare our serialize functions
	SERIALizING
	turns relevant user data into a string to be
	stored as a cookie
*/
passport.serializeUser(function(user, done){
	console.log("SERIALIZED JUST RAN!");

	done(null, user.id);
});

/*  DeSERIALizing
	Takes a string and turns into an object
	using the relevant data stored in the sessions
*/
passport.deserializeUser(function(id, done){
	console.log("DESERIALIZED JUST RAN!");
	db.user.find({
		where: {
		id: id
	}
})
		.then(function(user){
		 done(null, user);
		},
		function(err) {
			done(err, null);
		});
});

// WHEN SOMEONE WANTS THE SIGNUP PAGE
app.get("/sign-up", function (req, res) {
  res.render("site/sign-up");
});

// WHEN SOMEONE SUBMITS A SIGNUP PAGE
// WHAT WOULD BE THE CORRECT URL TO SEND THEM TO?
app.post("/users", function (req, res) {
  console.log("POST /users");
  var newUser = req.body.user;
  console.log("New User:", newUser);
 // We create the user and secure their password info
  db.user.createSecure(newUser.email, newUser.password,
    function () {
      // if it fails redirect to sign up
      res.redirect("/sign_up");
    },
    function (err, user) {
      // when successfully created log the user in
      // req.login is given by the passport
      req.login(user, function(){
      console.log("Id: ", user.id);
 // where should this redirct to?
      res.redirect('/users/' + user.id);
    });
  });
});

app.get("/users/:id", function (req, res) {
  var id = req.params.id;
  db.user.find(id)
    .then(function (user) {
      res.render("users/show", {user: user});
    })
    .error(function () {
      res.redirect("/sign_up");
    });
});

// When someone wants the login page
app.get("/log-in", function (req, res) {
	res.render("site/log-in");
});

// Authenticating a user
app.post('/log-in', passport.authenticate('local', {
	successRedirect: '/',
	failureRedirect: '/log-in'
}));

app.get("/", function (req, res) {
	console.log(req.user);
	// req.user is the user currently logged in

	if (req.user) {
		res.render("site/index", {user: req.user});
	} else {
	  res.render("site/index", {user: false});
	}
});

// have to fix this route or create a logout page
app.get("/logout", function (req, res) {
	// log out
	req.logout();
	res.redirect("/");
});

// Sites related routes
app.get("/", function (req, res) {
	res.render('site/index');
});

// app.get("/sign-up", function (req, res) {
// 	res.send("Hello world");
// });

//

/*when a customer request a delivery quote

POST /v1/customers/:customer_id/delivery_quotes

*/
app.post("/v1/customers/:customer_id/delivery_quotes", function (req, res) {
	res.send("Hello world");
});

/* if customer clicks confirm, then prompt delivery

POST /v1/customers/:customer_id/deliveries

*/
app.get("/delivery-quote", function (req, res) {
	res.send("Hello world");
});

/* once delivery is placed,
redirect to page that follows delivery
*/

app.get("/delivery-purchase", function (req, res) {
	res.send("Hello world");
});

app.listen(3000, function () {
	console.log(new Array(50).join('*'));
	console.log("STARTED ON localhost:3000");
});
