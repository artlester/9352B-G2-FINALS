
var mysql = require('mysql');
var express = require('express');
var path = require('path');
var parser = require('body-parser');
var session = require('express-session');

var ex = express();
ex.use(parser.json());
ex.use(parser.urlencoded({ extended: false }));
ex.use(session({secret : 'Tkasjge546JDG',
			   resave: true,
			   saveUninitialized: false,
			   cookie: { maxAge: 1800000 }}));
ex.set('view engine', 'ejs');

ex.listen(3000, ()=>{
    console.log("Server has started!!");
});

var conn = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "audirentur"
});

conn.connect(function(err){
    if(err){
        throw err;
    }
    console.log('Successfully connected to the database.');
});
var ses;
ex.post('/login',function(request,response){
	ses = request.session;
    var uname = request.body.username;
	var password = request.body.password;
    let query = "select vendor_id, ven_username,ven_password, ven_last_name, ven_first_name, acc_status from vendors where ven_username= ? ";
    conn.query(query,[uname],function(err,result,fields){
		var error_message = null;
        if(err) {
            throw err;
        }
		if(result[0] == undefined){
			error_message = "You have entered an invalid username. You have not regostered yet!";
			response.render("login",{concern: error_message});
		}else if(result[0].acc_status === 'pending'){
			response.render("login",{concern: "Your account has not been verified yet by the administrator!"});
		}else if(result[0].acc_status === 'denied'){
			response.render("login",{concern: "Your account has been denied!"});
		}else if(result[0].acc_status === 'disabled'){
			response.render("login",{concern: "Your account has been disabled!"});
		}else if(result[0].acc_status === 'accepted' && result[0].ven_password != password){
			response.render("login", {concern: "Your password is incorrect!"});
		}else if(result[0].acc_status === 'accepted' && result[0].ven_password === password){
			ses.username = result[0].ven_username;
			console.log(ses.username + " logged in!");
			ses.userId = result[0].vendor_id;
			ses.lastname = result[0].ven_last_name;
			ses.firstname = result[0].ven_first_name;
			response.redirect('/pages/view_requests'); // PAEDIT AKO YUNG PATH PAPUNTANG VIEW PRODUCSTS NA PAGE
		}
    });
});

ex.get("/products", function(request, response){
	if(request.session.userId){
		ses = request.session;
	}else{
		response.redirect('/');
	}
});

ex.get("/pages/view_requests",function(request,response){
	if(request.session.userId){
		ses = request.session;
		console.log(ses);
		let query = "select * from rentals inner join customers using (customer_id) inner join sounds using (sound_id) where rentals.vendor_id = ?";
		conn.query(query,[ses.userId], function(err,result){
			if(err) throw err;
			response.render('pages/view_requests',{tuples: result,
											info: ses});
		});
	}else{
		response.redirect('/');
	}
});

ex.get("/accept_request/:id", function(request, response){
	if(request.session.userId){
		let update = "Update rentals set status='accepted' where rental_id=?";
		conn.query(update,[request.param.id],function(err,result){
			if(err) throw err;
		});
	}else{
		response.redirect('/');
	}
});

ex.get("/deny_request/:id", function(request, response){
	if(request.session.userId){
		let update = "Update rentals set status='denied' where rental_id=?";
		conn.query(update,[request.param.id],function(err,result){
			if(err) throw err;
		});
	}else{
		response.redirect('/');
	}
});

ex.get("/",function(request, response){
    response.render("login", {concern: ''});
});

ex.get("/logout", function(request, response){
	ses = request.session;
	ses.destroy(function(err){
		if (err) throw err;
		response.redirect("/");
	});
	
});
