
<!--background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');-->

<!DOCTYPE html>
<html>
<head>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../CSS/styles.css">
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<link rel="icon" type="image/png" href="../img/favicon.png">
	
	<title>Iniciar Sesión</title>
</head>
<body>
<div class="container-fluid">	
	<nav class="navbar navbar-expand-lg navbar-light" id="nav_bar">
		<span class="navbar-brand" id="navbar-brand">
			<h1>EasyDomo</h1>
		</span>
		<button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://127.0.0.1:8080/EasyDomo/login/login.php">Iniciar Sesión</a>
				</li>				
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-12 col-6 col-4 col-lg">
			<div class="d-flex justify-content-center h-100">
				<div id="main_card" class="card">
					<div class="card-header">
						<h3>Iniciar Sesión</h3>
					</div>		
					<div id="message"></div>				
					<div class="card-body">
						<form name=login_form action="check_user.php" method="POST">
							<div class="input-group form-group">
								<div class="input-group-prepend">						
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input name="username" class="form-control" placeholder="Usuario">						
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Contraseña">
							</div>
							<div class="row align-items-center remember">
								<input id="checkbox" type="checkbox">Recordarme
							</div>
							<div class="form-group">
								<input type="submit" value="Iniciar Sesión" class="btn float-right btn-primary">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							No tiene una cuenta?<a href="../register/sign_up.php">Registrarse</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="#">Olvidó su contraseña?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>	
$('form').submit(function(event){
	event.preventDefault(); 					//prevent default action 
	var form_data = $(this).serializeArray(); 		//Creates new FormData object
	
	$.ajax({
		type: 'POST',
		url: 'check_user.php',
        data: form_data, 
		dataType: 'json'
	}).done(function(response){
		console.log(response.code); 		
		if(response.code == 200)
		{
			if(document.getElementById("checkbox").checked)
			{
				var d = new Date();
				d.setTime(d.getTime() + (150*24*60*60*1000));
				var expires = "expires="+ d.toUTCString();
				document.cookie = "user=" + response.user + ";" + expires + ";path=/";			
				//document.cookie = "user=" + response.user + "; expires=Mon, 15 Jul 2019 12:00:00 UTC; path=/";			
				
			}
			sessionStorage.setItem('status','loggedIn');
			sessionStorage.setItem('user', response.user);
			window.location.href = "http://www.easydomo.com.ar";
			//window.location.replace("http://www.google.com");	//not possible to use the "back" button to navigate back
		}
		
		else{
			
			document.getElementById("main_card").style.transition = "height 0.4s";
			document.getElementById("main_card").style.height = "400px";
			
			var alertBox = '<div class="alert alert-' + response.type + ' alert-dismissable text-center" role="alert">' + response.message + '<button type="button" onclick="resize()" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
			// inject the alert to .message div
			setTimeout(function() {$('#message').html(alertBox).fadeIn("slow");}, 100);
			// empty the form
			
			if(response.code != 304) $('form')[0].reset();
		}		
		
		setTimeout(function() {
			$('#message').fadeOut("slow");}, 2000);
		setTimeout(function() {
			document.getElementById("main_card").style.transition = "height 0.4s";
			(document.getElementById("main_card").style.height = "350px");}, 2500);
	});
});
function resize()
{
	document.getElementById("main_card").style.height = "350px";
}
</script>

</body>
</html>