<!DOCTYPE HTML>
<html>
<head>
    <title>Control de sus Dispositivos</title>
     
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../CSS/main_styles.css">
	

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="../img/favicon.png">
	 
</head>
<body onload="check_data()">
	<script>
		if(document.cookie.length != 0){
			var ValueArray = document.cookie.split("=");				
			sessionStorage.setItem('status','loggedIn');
			sessionStorage.setItem('user', ValueArray[1]);
		}
		if(sessionStorage.getItem('status') == null)
			window.location.replace("http://www.easydomo.com.ar/login/login.php");	//not possible to use the "back" button to navigate back
		else 
			var user = sessionStorage.getItem('user');		
	</script>
	
    <!-- container -->
<div class="container-fluid">	
	<nav class="navbar navbar-expand-lg navbar-light" id="nav_bar">
		<span class="navbar-brand" id="navbar-brand">
			
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
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>				
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<button id="log_out" type="button" class="btn float-right btn-primary btn-sm">
					<span class="fas fa-sign-out-alt"></span> Cerrar Sesión
				</button>
			</form>
			<!--<form class="form-inline my-2 my-lg-0">
				<button id="test" type="button" class="btn float-right btn-primary btn-sm" onmouseup = "porcentaje_change('1_range',1)">
					<span class="fas fa-sign-out-alt"></span> Test
				</button>
			</form>-->
		</div>
	</nav>

	<!-- Modal-Ventana emergente -->
	<div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modaledit">Editar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- Cuerpo del popup -->
				<div class="modal-body">
					<!-- Nombre -->  
					<input type="hidden" id="modal_module_id">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre:</label>
							<div class="col-sm-9">
								<input type="text" name="modal_module_name" class="form-control" id="modal_module_name" placeholder="">
							</div>
						</div>
					</div>
					<!-- Descripcion --> 
					<div class="form-group">
						<label class="col-sm-3 control-label">Descripción:</label>
						<div class="col-sm-9">
							<select class="browser-default custom-select" id="lista_desplegable">
								<!--<option selected>Seleccione</option>--> 
								<option value="1">Iluminacion</option>
								<option value="2">On/Off</option>
								<option value="3">Motor</option>
							</select>
						</div>
					</div>
					<!-- Hora encendido -->
					<div class="container">
						<div class="row">
							<div class="col-sm-5">
								<label class="control-label" >Horario encendido:</label>
							</div>
						</div>
						<div class="row">
							<div class="col-1" id="col_hora_encendido">
								<select class="btn btn-secondary btn-sm dropdown-toggle" id="lista_hora_encendido">
									<option value="24">--</option>
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
							</div>
							<div class="col-1" id="col_min_encendido">:</div>
							<div class="col-1">
								<select class="btn btn-secondary btn-sm dropdown-toggle" id="lista_min_encendido">
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</div>
						</div>
					</div>

					<!-- Hora apagado -->
					<div class="container">
						<div class="row">
							<div class="col-sm-5">
								<label class="control-label" >Horario apagado:</label>
							</div>
						</div>
						<div class="row">
							<div class="col-1">
								<select class="btn btn-secondary btn-sm dropdown-toggle" id="lista_hora_apagado">
									<option value="24">--</option>
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
							</div>
							<div class="col-1" id="col_min_apagado">:</div>
								
							<div class="col-1">
								<select class="btn btn-secondary btn-sm dropdown-toggle" id="lista_min_apagado">
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</div>
						</div>		
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick = save_click() data-dismiss="modal" >Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<h4 style="margin-top: 30px; margin-bottom: -20px; margin-left: 20px;">Sus Dispositivos:</h4>
	<div class="table-responsive-sm">
		<table id="modules_table" class='table table-hover table-bordered text-center'>
			<thead>
				<tr>
					<th width="30%">Nombre</th>
					<th width="10%">Estado</th>
					<th width="40%">Intensidad</th>
					<th width="20%" COLSPAN=2>Accion</th>
				</tr>
			</thead>
		</table>
	</div>
</div> <!-- end .container -->

<script>
var allow_change='0';
var modules_list;
var range_id = '';

function check_data(){
	$('#navbar-brand').empty();
	$('#navbar-brand').append('<h1>EasyDomo</h1><h3 id="show_user"><span class="far fa-user-circle"> '+ sessionStorage.getItem('user') +'</span></h3>');

 	var username = {'username': sessionStorage.getItem('user')};
	$.ajax({
		type: 'POST',
		url: 'modules/get_modules.php',
        data: username,
		dataType: 'json',
		success: function(response){
			modules_list = response;
			allow_change='1';
			var table_data = "";
			$.each(response, function (key, value){
				table_data += "<tbody>";
				table_data += "<tr>";
				table_data += "<td>"+ value.module_name +"</td>";		
				if(value.description == 'Motor')		
				{
					table_data += '<td>';
						table_data += '<button type="button" style="margin: 0.5ch;" class="btn btn-primary';
						if(value.fin_de_carrera == '0')
							table_data += ' disabled" ';
						else
							table_data += '" ';
						table_data += 'onmouseup = cerrar_click("'+ value.id +'_cerrar") ';
						table_data += 'id="'+ value.id +'_cerrar">Cerrar</button> ';

						table_data += '<button type="button" style="margin: 0.5ch;" class="btn btn-primary';	
						if (value.fin_de_carrera == '2')
							table_data += ' disabled" ';					
						else 
							table_data += '" ';
						table_data += 'onmouseup = abrir_click("'+ value.id +'_abrir") ';
						table_data += 'id="'+ value.id +'_abrir">Abrir</button> ';
					table_data += '</td>';
				}
				else{
					if(value.state==1) 
						table_data += '<td><label class="switch"><input onclick=state_click("'+ value.id +'_state") id="'+ value.id +'_state" type="checkbox" checked><span class="slider round"></span></label></td>';
					else 
						table_data += '<td><label class="switch"><input onclick=state_click("'+ value.id +'_state") id="'+ value.id +'_state" type="checkbox"><span class="slider round"></span></label></td>';
				}
				if(value.description == 'Iluminacion')
				{
					range_id =  value.id +'_range';
					table_data += '<td>';
						table_data += '<input data-toggle="tooltip" data-placement="top" title="'+ value.porcentaje +'%" type="range"';
						table_data += ' oninput = tooltip_change("'+ range_id +'")';
						table_data += ' ontouchend = porcentaje_change("'+ range_id +'")';
						table_data += ' onmouseup = porcentaje_change("'+ range_id +'")';
						table_data += ' id="'+ range_id +'" min="1" max="100" step="1" value="'+ value.porcentaje +'" class="slider_bar">';
					table_data += '</td>';
				}
				else
					table_data += '<td></td>';
					
				table_data += '<td><a href="#ventana1" id="'+ value.id +'_edit" class="btn btn-primary m-r-1em" data-toggle="modal" onClick = edit_click_id("' + value.id + '") >Editar</a></td>';
				table_data += '<td><a href="#" id="'+ value.id +'_edit" class="btn btn-danger m-r-1em">Borrar</a></td>';
				
				table_data += '</tr>';
				table_data += '</tbody>';
			});
			$("#modules_table tbody tr").remove();			
			$('#modules_table').append(table_data);
			toggle_enable();
		}
	});
}

function cerrar_click(id){	
	allow_change='0';
	$('#'+ id +'').blur();

	var pos = id.indexOf("_cerrar");
	var abrir_id = id.slice(0, pos);
	abrir_id += ("_abrir");
	var module_id = id.slice(0, pos);

	if ($('#'+ id +'').prop('class')!='btn btn-primary disabled')
	{
		$('#'+ id +'').toggleClass("btn-success");
		$('#'+ id +'').toggleClass("btn-primary");

		if($('#'+ abrir_id +'').prop('class') == 'btn btn-success')
		{
			$('#'+ abrir_id +'').toggleClass("btn-success");
			$('#'+ abrir_id +'').toggleClass("btn-primary");
		}

		var state;
		if($('#'+ id +'').prop('class') == 'btn btn-success')
			state=2;	//cerrar
		else
			state=0;
		var post_data = {'state' : state, 'username': sessionStorage.getItem('user'), 'id': module_id};
		$.ajax({
			type: 'POST',
			url: 'modules/change_state.php',
			data: post_data,
			dataType: 'json',
			success: function(response){
				allow_change='1';
			}
		});	
	}
}

function abrir_click(id){
	allow_change='0';
	$('#'+ id +'').blur();

	var pos = id.indexOf("_abrir");
	var cerrar_id = id.slice(0, pos);
	cerrar_id += ("_cerrar");
	var module_id = id.slice(0, pos);

	if ($('#'+ id +'').prop('class')!='btn btn-primary disabled')
	{
		$('#'+ id +'').toggleClass("btn-success");
		$('#'+ id +'').toggleClass("btn-primary");

		if($('#'+ cerrar_id +'').prop('class') == 'btn btn-success')
		{
			$('#'+ cerrar_id +'').toggleClass("btn-success");
			$('#'+ cerrar_id +'').toggleClass("btn-primary");
		}

		var state;
		if($('#'+ id +'').prop('class') == 'btn btn-success')
			state=1;	//abrir
		else
			state=0;
		var post_data = {'state' : state, 'username': sessionStorage.getItem('user'), 'id': module_id};
		$.ajax({
			type: 'POST',
			url: 'modules/change_state.php',
			data: post_data,
			dataType: 'json',
			success: function(response){
				allow_change='1';
			}
		});		
	}
}

function state_click(id){
	allow_change='0';
	var pos = id.indexOf("_state");
	var module_id = id.slice(0, pos);

	var state;
	if (document.getElementById(id).checked==true)
		state='1';
	else 
		state='0';
	var post_data = {'state' : state, 'username': sessionStorage.getItem('user'), 'id': module_id};
	$.ajax({
		type: 'POST',
		url: 'modules/change_state.php',
        data: post_data,
		dataType: 'json',
		success: function(response){
			allow_change='1';
		}
	});
}

setInterval(function() {		//consulta estado cada 1000 mseg
	var post_data;	
	if(allow_change=='1')
	{
		//allow_change='0';
		post_data = {'username': sessionStorage.getItem('user')};	
		$.ajax({
			type: 'POST',
			url: 'modules/get_all_states.php',
			data: post_data,
			dataType: 'json',
			success: function(response){
				modules_list.forEach(function (module)
				{
					for (var i in response)
					{
						if(response[i].id == module.id)
						{
							if(response[i].state != module.state)
							{								
								module.state = response[i].state;
								if(module.description == 'Motor')
								{
									if(module.state == '0')
									{
										if(module.fin_de_carrera == '0')	
										{									
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary disabled");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary");	
										}
										else if (module.fin_de_carrera == '1')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary");
										}
										else if (module.fin_de_carrera == '2')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary disabled");
										}
									}
									else if(module.state == '1')
									{
										if(module.fin_de_carrera == '0')	
										{									
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary disabled");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-success");	
										}
										else if (module.fin_de_carrera == '1')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-success");
										}
										else if (module.fin_de_carrera == '2')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary disabled");
										}
									}
									else if(module.state == '2')
									{
										if(module.fin_de_carrera == '0')	
										{									
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-primary disabled");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary");	
										}
										else if (module.fin_de_carrera == '1')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-success");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary");
										}
										else if (module.fin_de_carrera == '2')
										{
											$('#'+ module.id +'_cerrar').removeClass();
											$('#'+ module.id +'_cerrar').addClass("btn btn-success");
											$('#'+ module.id +'_abrir').removeClass();
											$('#'+ module.id +'_abrir').addClass("btn btn-primary disabled");
										}
									}
								}
								else{
									if(module.state == '1')	document.getElementById(''+ module.id +'_state').checked = true;
									else					document.getElementById(''+ module.id +'_state').checked = false;									
								}
							}
							if(response[i].porcentaje != module.porcentaje)
							{
								module.porcentaje = response[i].porcentaje;
								document.getElementById(''+ module.id +'_range').value = module.porcentaje;
								$(document.getElementById(''+ module.id +'_range')).attr('data-original-title', module.porcentaje+'%')
							}
							if(response[i].fin_de_carrera != module.fin_de_carrera)
							{
								module.fin_de_carrera = response[i].fin_de_carrera;
								if(module.fin_de_carrera == '0')	
								{									
									$('#'+ module.id +'_cerrar').removeClass();
									$('#'+ module.id +'_cerrar').addClass("btn btn-primary disabled");
									//$('#'+ module.id +'_abrir').removeClass();
									//$('#'+ module.id +'_abrir').addClass("btn btn-primary");
								}
								else if (module.fin_de_carrera == '1')
								{
									if($('#'+ module.id +'_cerrar').prop('class') != 'btn btn-success')
									{
										$('#'+ module.id +'_cerrar').removeClass();
										$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
									}
									if($('#'+ module.id +'_abrir').prop('class') != 'btn btn-success')
									{
										$('#'+ module.id +'_abrir').removeClass();
										$('#'+ module.id +'_abrir').addClass("btn btn-primary");
									}
								}
								else if (module.fin_de_carrera == '2')
								{
									//$('#'+ module.id +'_cerrar').removeClass();
									//$('#'+ module.id +'_cerrar').addClass("btn btn-primary");
									$('#'+ module.id +'_abrir').removeClass();
									$('#'+ module.id +'_abrir').addClass("btn btn-primary disabled");
								}
							}
						}
					}
				});	
			}
		});
	}
}, 1500);

function porcentaje_change(id, show_tooltip){	
	allow_change='0';
	var pos = id.indexOf("_range");
	var module_id = id.slice(0, pos);

	$(document.getElementById(id)).tooltip('hide')
	if(show_tooltip == true)		$(document.getElementById(id)).tooltip('show');
	
	var porcentaje = document.getElementById(id).value;
	var post_data = {'porcentaje' : porcentaje, 'username': sessionStorage.getItem('user'), 'id': module_id};	
	$.ajax({
		type: 'POST',
		url: 'modules/change_porcentaje.php',
        data: post_data,
		dataType: 'json',
		success: function(response){
			allow_change='1';
		}
	});
}

function tooltip_change(id){
	var porcentaje = document.getElementById(id).value;
	//$(document.getElementById(id)).tooltip('hide')
    $(document.getElementById(id)).attr('data-original-title', porcentaje+'%')
    $(document.getElementById(id)).tooltip('show');			
}

document.getElementById("log_out").onclick = function() {log_out()};		//log_out

function log_out() {
	document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";	
	sessionStorage.setItem('status','');
	sessionStorage.setItem('user', ''); 
	window.location.replace("http://www.easydomo.com.ar/login/login.php");	
}

function edit_click_id (id){
 	var module_id = {'id':id};
	$.ajax({
		type: 'POST',
		url: 'modules/get_module.php',
        data: module_id,
		dataType: 'json',
		success: function(response){
			$('#modal_module_id').val(response.id);
			$('#modal_module_name').val(response.module_name);

			if(response.description=='Iluminacion')	
				$('#lista_desplegable').prop('selectedIndex', 0);
			else if(response.description=='On/Off')	
				$('#lista_desplegable').prop('selectedIndex', 1);
			else if(response.description=='Motor')	
				$('#lista_desplegable').prop('selectedIndex', 2);
										
			$('#lista_hora_encendido').val(response.hr_encendido);
			$('#modal_hr_apagado').val(response.hr_apagado);
			$('#modal_min_encendido').val(response.min_encendido);
			$('#modal_min_apagado').val(response.min_apagado);
		}
	});
}

function save_click (){
	var e = document.getElementById("lista_desplegable");
	var new_description1 = e.options[e.selectedIndex].text;

	var e = document.getElementById("lista_hora_encendido");
	var new_description2 = e.options[e.selectedIndex].value;	

	var e = document.getElementById("lista_min_encendido");
	var new_description3 = e.options[e.selectedIndex].value;

	var e = document.getElementById("lista_hora_apagado");
	var new_description4 = e.options[e.selectedIndex].value;

	var e = document.getElementById("lista_min_apagado");
	var new_description5 = e.options[e.selectedIndex].value;

	var save_data = {'id':$('#modal_module_id').val(), 'username':sessionStorage.getItem('user'), 'module_name':$('#modal_module_name').val(), 'module_type':new_description1, 'hr_encendido':new_description2, 'min_encendido':new_description3, 'hr_apagado':new_description4, 'min_apagado':new_description5}; 
	var module_id = {'id':$('#modal_module_id').val()};
	$.ajax({
		type: 'POST',
		url: 'modules/update_module_fromindex.php',
        data: save_data,
		dataType: 'json',
		success: function(response){
			check_data();
		}
	});	
	$.ajax({
		type: 'POST',
		url: 'modules/set_module_flags.php',
        data: module_id,
		dataType: 'json',
		success: function(response){
		}
	});
}

</script>

<script>
$(document).ready(toggle_enable());

function toggle_enable(){
	$('[data-toggle="tooltip"]').tooltip();   
	$('range').tooltip();
 }
</script>


</body>
</html>