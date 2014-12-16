var express = require("express"),
  bodyParser = require("body-parser"),
  app = express();


app.use(express.static(__dirname + "/public"));
app.use(bodyParser.urlencoded({extended: true}));
app.set("view engine", "ejs");

// our root route
app.get("/", function (req, res) {
	res.render('site/index');
});

app.get("/sign-up", function (req, res) {
	res.send("Hello world");
});

app.get("/log-in", function (req, res) {
	res.send("Hello world");
});

app.get("/delivery-quote", function (req, res) {
	res.send("Hello world");
});

app.get("/delivery-purchase", function (req, res) {
	res.send("Hello world");
});

app.listen(3000, function () {
	console.log(new Array(50).join('*'));
	console.log("STARTED ON localhost:3000");
});
